<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Models\Event;

Route::get('/', function () {
    return view('home');
});

Route::get('/', function () {
    $events = Event::orderBy('event_date', 'asc')->get();
    return view('home', compact('events'));
});
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe/{email}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

