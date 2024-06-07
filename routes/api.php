<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::get('/verify-email', 'App\Http\Controllers\AuthController@verifyEmail')->name('verify-email');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

// Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
Route::post('/projects', 'App\Http\Controllers\ProjectController@store');
// Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
Route::get('/projects/{project}', 'App\Http\Controllers\ProjectController@show');
Route::put('/projects/{project}', 'App\Http\Controllers\ProjectController@update');
// Route::delete('/projects/{project}', 'App\Http\Controllers\ProjectController@destroy');
// });
