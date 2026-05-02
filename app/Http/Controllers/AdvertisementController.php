<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdvertisementRequest;
use App\Models\Advertisement;
use App\Models\AdImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->user()->role_id == 1) {
        return redirect()->route('admin.moderation.index');
    }
        $ads = Advertisement::with('images')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('dashboard', compact('ads'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('advertisements.create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertisementRequest $request)
    {

        $validated = $request->validated();

        // automatically set data
        $validated['slug'] = Str::slug($validated['title']).'-'.time();
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';
        $validated['is_negotiable'] = $request->has('is_negotiable');

        // enter to the db
        $ad = Advertisement::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('ads', 'public');

                $ad->images()->create([
                    'file_path' => $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Your Advertisement has been Successfully Submitted. It will be published after Admin Approval.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = Advertisement::with(['images', 'category', 'location'])->findOrFail($id);

        return view('advertisements.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ad =Advertisement::findOrFail($id);
        if ($ad->user_id !== auth()->id()) {abort(403);}

        return view('advertisements.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ad = Advertisement::findOrFail($id);

    if ($ad->user_id !== auth()->id()) {
        abort(403);
    }

    $validated = $request->validate([
        'title' => 'required|string|min:5|max:255',
        'price' => 'required|numeric|min:1',
        'description' => 'required|string|min:10',
        'new_images.*' => 'image|mimes:jpeg,png,jpg|max:16384'
    ]);

    $ad->update($validated);

    $ad->update(['status' => 'pending']);

    // if($request->hasFile('new_images')){
    //     foreach($request->file('new_images') as $file){
    //         $path =$file->store('ads', 'public');
    //         $ad->images()->create([
    //             'file_path' => $path
    //         ]);
    //     }
    // }

    // if ($request->has('delete_images')) {
    //     foreach ($request->delete_images as $imageId) {
    //         $image = AdImage::find($imageId);
    //         if ($image) {
    //             Storage::disk('public')->delete($image->file_path);
    //             $image->delete();
    //         }
    //     }
    // }

    return redirect()->route('dashboard')->with('success', 'Advertisement updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ad =Advertisement::findOrFail($id);
        if ($ad->user_id !== auth()->id()) {abort(403);}

        $ad->delete();
        return back()->with('success', 'Advertisement deleted successfully');
    }
}
