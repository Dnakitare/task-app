<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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
    Route::get('/projects', 'index');
    Route::post('/projects', 'store');
    Route::get('/projects/{project}', 'show');
    Route::get('/projects/{slug}/get-project-details', 'getProjectDetails');
    Route::put('/projects/{project}', 'update');
    Route::delete('/projects/{project}', 'destroy');
    Route::post('/projects/{project}/pin-on-dashboard', 'pinOnDashboard');
    Route::post('/projects/{project}/unpin-from-dashboard', 'unpinFromDashboard');
    Route::get('/count/projects', 'countProjects');
});

Route::controller(TaskController::class)->group(function () {
    Route::post('/tasks', 'store');
    Route::get('/tasks', 'index');
    Route::get('/tasks/{task}', 'show');
    Route::put('/tasks/{task}', 'update');
    Route::get('/tasks/{task}/not_started_to_pending', 'taskNotStartedToPending');
    Route::get('/tasks/{task}/not_started_to_completed', 'taskNotStartedToCompleted');
    Route::get('/tasks/{task}/pending_to_completed', 'taskPendingToCompleted');
    Route::get('/tasks/{task}/pending_to_not_started', 'taskPendingToNotStarted');
    Route::get('/tasks/{task}/completed_to_pending', 'taskCompletedToPending');
    Route::get('/tasks/{task}/completed_to_not_started', 'taskCompletedToNotStarted');
    Route::delete('/tasks/{member}', 'destroy');
});
