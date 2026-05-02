<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Jobs\SendAdStatusEmail;
use Illuminate\Support\Facades\Mail;

class ModerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingAds = Advertisement::where('status', 'pending')->get();

        return view('admin.moderation.index', compact('pendingAds'));

    }

    public function approve($id)
    {
        $ad = Advertisement::findOrFail($id);
        $ad->update(['status' => 'active']);

        $messageBody = "Congratulations {$ad->user->name}! Your ad '{$ad->title}' is now Live.";

        SendAdStatusEmail::dispatch($ad, 'Approved', $messageBody);

        return back()->with('success', 'The advertisement was approved and user notified!.');
    }

    public function reject($id)
    {
        $ad = Advertisement::findOrFail($id);
        $ad->update(['status' => 'rejected']);

        $messageBody = "Hi {$ad->user->name}, unfortunately your ad '{$ad->title}' was not approved.";

        SendAdStatusEmail::dispatch($ad, 'Rejected', $messageBody);

        return back()->with('error', 'The advertisement was rejected successfully!');
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
        //
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
