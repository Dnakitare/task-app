<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::get('/verify-email', 'verifyEmail')->name('verify-email');
    Route::post('/login', 'login');
});

// use sanctum middleware to protect the routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
});

Route::controller(MemberController::class)->group(function () {
    Route::post('/members', 'store');
    Route::get('/members', 'index');
    Route::get('/members/{member}', 'show');
    Route::put('/members/{member}', 'update');
    Route::delete('/members/{member}', 'destroy');
});

Route::controller(ProjectController::class)->group(function () {
    Route::post('/projects/{project}/pin-on-dashboard', 'pinOnDashboard');
    Route::post('/projects/{project}/unpin-from-dashboard', 'unpinFromDashboard');
    Route::post('/projects', 'store');
    Route::get('/projects', 'index');
    Route::get('/projects/{project}', 'show');
    Route::put('/projects/{project}', 'update');
    Route::delete('/projects/{project}', 'destroy');
    Route::post('/projects/{project}/pin-on-dashboard', 'pinOnDashboard');
    Route::post('/projects/{project}/unpin-from-dashboard', 'unpinFromDashboard');
});
