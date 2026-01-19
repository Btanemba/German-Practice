<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventCrudController;
use App\Http\Controllers\Admin\SubscriberCrudController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\HangoutCrudController;
use App\Http\Controllers\Admin\ClassScheduleCrudController;
use App\Http\Controllers\Admin\RegistrationCrudController;
use App\Http\Controllers\Admin\PracticeMaterialCrudController;
use App\Http\Controllers\Admin\ChatMessageCrudController;
use App\Http\Controllers\Admin\ReviewCrudController;

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
], function () {
    // CRUD routes
    Route::crud('event', EventCrudController::class);
    Route::crud('subscriber', SubscriberCrudController::class);
    Route::crud('hangout', HangoutCrudController::class);
    Route::crud('class-schedule', ClassScheduleCrudController::class);
    Route::crud('registration', RegistrationCrudController::class);
    Route::crud('practice-material', PracticeMaterialCrudController::class);
    Route::crud('review', ReviewCrudController::class);

     Route::crud('chat-message', ChatMessageCrudController::class);

    // Newsletter routes
    Route::get('newsletter', [NewsletterController::class, 'showForm'])->name('admin.newsletter.form');
    Route::post('newsletter/send', [NewsletterController::class, 'send'])->name('admin.newsletter.send');

   // Bulk email routes
Route::get('registration/bulk-email-event', [RegistrationCrudController::class, 'bulkEmailEventForm']);
Route::post('registration/bulk-email-event', [RegistrationCrudController::class, 'processBulkEmailEvent']);
Route::get('registration/bulk-email-class', [RegistrationCrudController::class, 'bulkEmailClassForm']);
Route::post('registration/bulk-email-class', [RegistrationCrudController::class, 'processBulkEmailClass']);

 Route::get('registration/export-event-form', [\App\Http\Controllers\Admin\RegistrationCrudController::class, 'exportEventRegistrationsForm']);
    Route::post('registration/export-event', [\App\Http\Controllers\Admin\RegistrationCrudController::class, 'exportEventRegistrations']);
    Route::get('registration/export-class-form', [\App\Http\Controllers\Admin\RegistrationCrudController::class, 'exportClassRegistrationsForm']);
    Route::post('registration/export-class', [\App\Http\Controllers\Admin\RegistrationCrudController::class, 'exportClassRegistrations']);

   // Chat message specific routes
    Route::get('chat-message/{id}/mark-read', [ChatMessageCrudController::class, 'markAsRead']);
    Route::get('chat-message/{id}/conversation', [ChatMessageCrudController::class, 'viewConversation']);
    Route::get('chat-message/{id}/reply', [ChatMessageCrudController::class, 'showReplyForm']);
    Route::post('chat-message/{id}/send-reply', [ChatMessageCrudController::class, 'sendReply']);

}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */

