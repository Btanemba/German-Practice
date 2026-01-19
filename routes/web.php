<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ReviewController;
use App\Models\Event;
use App\Models\PracticeMaterial;
use Illuminate\Http\Request;
use App\Models\{Hangout, ClassSchedule, Registration};
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QrCodeController;

// Homepage with Events and Practice Materials
Route::get('/', function () {
    $events = Event::orderBy('event_date', 'asc')->get();
    $practiceMaterials = PracticeMaterial::ordered()->get();

    // Get upcoming class schedules - no grouping, show each class individually
    $classSchedules = ClassSchedule::whereDate('date', '>=', \Carbon\Carbon::today())
        ->orderBy('level', 'asc')
        ->orderBy('date', 'asc')
        ->orderBy('start_time', 'asc')
        ->get();

    return view('home', compact('events', 'practiceMaterials', 'classSchedules'));
});

// Newsletter Subscribe/Unsubscribe
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe/{email}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

// Fetch Hangouts
Route::get('/get-hangouts', function () {
    return response()->json(Hangout::all());
});

// Chat routes
Route::post('/chat/send-message', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.send');
Route::get('/chat/get-messages', [App\Http\Controllers\ChatController::class, 'getMessages'])->name('chat.get');
Route::post('/chat/admin-reply', [App\Http\Controllers\ChatController::class, 'sendAdminReply'])->name('chat.admin-reply');

Route::get('/get-class-levels', [ClassController::class, 'levels']);
Route::get('/get-class-dates/{level}', [ClassController::class, 'dates']);
Route::get('/get-class-times/{level}/{date}', [ClassController::class, 'times']);
Route::post('/register-user', [App\Http\Controllers\ClassController::class, 'registerUser']);

Route::get('/get-events', [App\Http\Controllers\ClassController::class, 'getEvents']);

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Review routes
Route::post('/submit-review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/get-approved-reviews', [ReviewController::class, 'getApprovedReviews'])->name('review.approved');

// Language switching routes
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');
Route::get('/api/current-locale', [LanguageController::class, 'getCurrentLocale'])->name('language.current');

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
], function () {
    Route::get('registration/{id}/send-email', [\App\Http\Controllers\Admin\RegistrationCrudController::class, 'sendEmail']);
    Route::post('registration/{id}/process-email', [\App\Http\Controllers\Admin\RegistrationCrudController::class, 'processEmail']);
});
Route::get('/qr-code-image', [QrCodeController::class, 'generate'])->name('qr.download');
