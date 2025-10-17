<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsletterController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('event', 'EventCrudController');
    Route::crud('subscriber', 'SubscriberCrudController');


Route::get('newsletter', [NewsletterController::class, 'showForm'])->name('admin.newsletter.form');
Route::post('newsletter/send', [NewsletterController::class, 'send'])->name('admin.newsletter.send');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
