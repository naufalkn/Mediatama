<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\video_access_logs;
use App\Models\Videos;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard-admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userSetting()
    {
        $users = User::where ('role', 'user')->get();    
        return view('admin.user-admin', [
        'users' => $users
        ]);
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        // dd($request);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('users-admin')->with('success', 'User created successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users-admin')->with('success', 'User deleted successfully.');
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users-admin')->with('success', 'User updated successfully.');
    }

    public function videoSetting()
    {
        $videos = Videos::all();
        return view('admin.videos-admin', [
            'videos' => $videos
        ]);
    }

    public function createVideo(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'required|file|mimes:mp4,mov,avi,mkv|max:20480', // Max 20MB
        ]);

        Videos::create([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $request->file('video')->store('videos', 'public'),
        ]);

        return redirect()->route('videos-admin')->with('success', 'Video created successfully.');
    }

    public function editVideo(Request $request, $id)
    {
        $video = Videos::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'nullable|file|mimes:mp4,mov,avi,mkv|max:20480', // Max 20MB
        ]);

        $video->title = $request->title;
        $video->description = $request->description;

        if ($request->hasFile('video')) {
            // Delete old video file
            if ($video->video) {
                \Storage::disk('public')->delete($video->video);
            }
            // Store new video file
            $video->video = $request->file('video')->store('videos', 'public');
        }

        $video->save();

        return redirect()->route('videos-admin')->with('success', 'Video updated successfully.');
    }

     public function deleteVideo($id)
    {
        $video = Videos::findOrFail($id);
        
        // Delete video file from storage
        if ($video->video) {
            \Storage::disk('public')->delete($video->video);
        }

        $video->delete();

        return redirect()->route('videos-admin')->with('success', 'Video deleted successfully.');
    }

    public function logs()
    {
        $logs = video_access_logs::with('user', 'video')->get();
        // dd($logs);
        return view('admin.logs-admin', [
            'logs' => $logs
        ]);
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
