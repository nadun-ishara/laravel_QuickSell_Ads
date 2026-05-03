<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;

class PublicAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Advertisement::with(['category','location','images'])
            ->where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        return view('welcome', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = Advertisement::with(['category', 'location', 'images'])->findOrFail($id);
        return view('advertisements.show', compact('ad'));
    }

    //Search results
    public function search(Request $request)
    {
        $categories=Category::all();
        $locations=Location::all();

        $query = Advertisement::with(['category', 'location', 'images'])
            ->where('status', 'active');

        //keyword
        if($request->filled('query')){
            $searchTerm =$request->query('query');
            $query->where(function($q) use ($searchTerm){
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }
        // filter by category
        if($request->filled('category')){
            $query->where('category_id', $request->category);
        }

        // filter by location
        if($request->filled('location')){
            $query->where('location_id', $request->location);
        }
        // filter by price
        if($request->filled('min_price')){
            $query->where('price', '>=', $request->min_price);
        }

        if($request->filled('max_price')){
            $query->where('price', '<=', $request->max_price);
        }

        //sort
        if($request->sort == 'price_low'){
            $query->orderBy('price', 'asc');
        }
        elseif($request->sort == 'price_high'){
            $query->orderBy('price', 'desc');
        }
        elseif($request->sort == 'oldest'){
            $query->oldest();
        }
        else{
            $query->latest();
        }

        $ads =$query->paginate(12);
        return view('search-results', compact('ads', 'categories', 'locations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
