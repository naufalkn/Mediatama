<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\requestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

// Login
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Admin
Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin')->middleware('auth');
Route::get('/users-admin', [AdminController::class, 'userSetting'])->name('users-admin')->middleware('auth');
Route::post('/users-admin/create', [AdminController::class, 'createUser'])->name('users-admin.create')->middleware('auth');
Route::delete('/users-admin/{id}', [AdminController::class, 'deleteUser'])->name('users-admin.delete')->middleware('auth');
Route::post('/users-admin/{id}', [AdminController::class, 'editUser'])->name('users-admin.edit')->middleware('auth');
Route::get('/videos-admin', [AdminController::class, 'videoSetting'])->name('videos-admin')->middleware('auth');
Route::post('/videos-admin/create', [AdminController::class, 'createVideo'])->name('videos-admin.create')->middleware('auth');
Route::post('/videos-admin/{id}', [AdminController::class, 'editVideo'])->name('videos-admin.edit')->middleware('auth');
Route::delete('/videos-admin/{id}', [AdminController::class, 'deleteVideo'])->name('video-admin.delete')->middleware('auth');
Route::get('/requests-admin', [requestController::class, 'requestAdmin'])->name('requests-admin')->middleware('auth');
Route::post('/requests-admin/{id}/approve', [requestController::class, 'approvedRequest'])->name('requests-admin.approve')->middleware('auth');
Route::post('/requests-admin/{id}/reject', [requestController::class, 'rejectRequest'])->name('requests-admin.reject')->middleware('auth');
Route::get('/logs-admin', [AdminController::class, 'logs'])->name('logs-admin')->middleware('auth');

// User
Route::get('/dashboard-user', [UserController::class, 'index'])->name('dashboard-user')->middleware('auth');
Route::post('/request/{video_id}', [requestController::class, 'requestUser'])->name('request-user')->middleware('auth');
Route::get('/my-videos', [requestController::class, 'myVideos'])->name('my-videos')->middleware('auth');
Route::get('/play-video/{id}', [requestController::class, 'playVideo'])->name('play-video')->middleware('auth');
