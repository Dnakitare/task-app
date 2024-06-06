<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', 'App\Http\Controllers\AuthController@register');

Route::get('/verify-email', 'App\Http\Controllers\AuthController@verifyEmail')->name('verify-email');
