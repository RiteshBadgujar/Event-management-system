<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);

Route::post('/events', [EventController::class, 'store']);

Route::post('/events/{id}/register', [EventController::class, 'register']);