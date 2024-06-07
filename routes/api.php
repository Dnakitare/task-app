<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/register', 'App\Http\Controllers\AuthController@register');
  Route::get('/verify-email', 'App\Http\Controllers\AuthController@verifyEmail')->name('verify-email');
  Route::post('/login', 'App\Http\Controllers\AuthController@login');
});

// use sanctum middleware to protect the routes
Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

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
