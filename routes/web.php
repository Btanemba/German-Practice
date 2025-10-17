<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;

Route::get('/', function () {
    return view('home');
});

Route::get('/', function () {
    $events = Event::orderBy('event_date', 'asc')->get();
    return view('home', compact('events'));
});
