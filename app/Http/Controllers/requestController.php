<?php

namespace App\Http\Controllers;

use App\Models\video_access_logs;
use App\Models\videos_request;
use Illuminate\Http\Request;

class requestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function requestUser($video_id)
    {
        $exists = videos_request::where('user_id', auth()->id())
            ->where('video_id', $video_id)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return back()->with('error', 'Request sudah dikirim');
        }

        videos_request::create([
            'user_id' => auth()->id(),
            'video_id' => $video_id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Request berhasil dikirim');
    }

    public function requestAdmin()
    {
        $requests = videos_request::with('user', 'video')->get();
        // dd($requests);
        return view('admin.request-admin', [
            'requests' => $requests
        ]);
    }

    public function approvedRequest(Request $request, $id)
    {
        $request->validate([
            'start_access' => 'required|date',
            'end_access' => 'required|date|after:start_access'
        ]);

        $videoRequest = videos_request::findOrFail($id);

        $videoRequest->update([
            'status' => 'approved',
            'start_access' => $request->start_access,
            'end_access' => $request->end_access
        ]);

        return redirect()->back()->with('success', 'Request berhasil disetujui');
    }

    public function rejectRequest($id)
    {
        $videoRequest = videos_request::findOrFail($id);

        $videoRequest->update([
            'status' => 'rejected',
            'start_access' => null,
            'end_access' => null
        ]);

        return redirect()->back()->with('success', 'Request berhasil ditolak');
    }

    public function myVideos()
    {
        // dd(now());
        // dd(videos_request::first());
        // update video expired milik user
        videos_request::where('user_id', auth()->id())
            ->where('status', 'approved')
            ->where('end_access', '<', now())
            ->update([
                'status' => 'expired'
            ]);

        $myVideos = videos_request::with('video')
            ->where('user_id', auth()->id())
            ->get();


        return view('user.my-video', [
            'myVideos' => $myVideos
        ]);
    }

    public function access_logs ()
    {
            
    }

    public function playVideo ($id)
    {
        $video = videos_request::with('video')
            ->where('user_id', auth()->id())
            ->where('video_id', $id)
            ->where('status', 'approved')
            ->firstOrFail();

        // dd($video);

        video_access_logs::create([
            'user_id' => auth()->id(),
            'video_id' => $id,
            'accessed_at' => now()
        ]);

        return view('user.play-video', [
            'video' => $video
        ]);
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
