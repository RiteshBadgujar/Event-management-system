<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});


// Event list
Route::get('/events', [EventController::class, 'index']);


// Create event
Route::get('/events/create', [EventController::class, 'create']);

Route::post('/events', [EventController::class, 'store']);


// Search events
Route::get('/events/search', [EventController::class, 'search']);


// View event details
Route::get('/events/{id}', [EventController::class, 'show']);


// Edit event
Route::get('/events/{id}/edit', [EventController::class, 'edit']);

Route::put('/events/{id}', [EventController::class, 'update']);


// Event registrations
Route::get(
    '/events/{id}/registrations',
    [EventController::class, 'registrations']
);


// Register attendee
Route::post(
    '/events/{id}/register',
    [EventController::class, 'register']
);


// Ticket
Route::get(
    '/registrations/{id}/ticket',
    [EventController::class, 'ticket']
);


// Cancel registration
Route::delete(
    '/registrations/{id}',
    [EventController::class, 'cancelRegistration']
);


// Delete event
Route::delete(
    '/events/{id}',
    [EventController::class, 'destroy']
);