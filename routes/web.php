<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\{Hangout, ClassSchedule, Registration};
use App\Http\Controllers\ClassController;

// Homepage with Events
Route::get('/', function () {
    $events = Event::orderBy('event_date', 'asc')->get();
    return view('home', compact('events'));
});

// Newsletter Subscribe/Unsubscribe
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe/{email}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

// Fetch Hangouts
Route::get('/get-hangouts', function () {
    return response()->json(Hangout::all());
});


Route::get('/get-class-levels', [ClassController::class, 'levels']);
Route::get('/get-class-dates/{level}', [ClassController::class, 'dates']);
Route::get('/get-class-times/{level}/{date}', [ClassController::class, 'times']);
Route::post('/register-user', [ClassController::class, 'register']);
