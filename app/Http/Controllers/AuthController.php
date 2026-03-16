<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function proseslogin(Request $request)
{
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required']
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // ambil data user yang login
        $user = Auth::user();

        // cek role
        if ($user->role == 'admin') {
            return redirect()->route('dashboard-admin');
        } else {
            return redirect()->route('dashboard-user');
        }
    }

    return back()->withErrors([
        'username' => 'username atau password salah.',
    ])->onlyInput('username');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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
