<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/app/login');
});

Route::get('/app/{any}', function () {
    return view('welcome');
});
