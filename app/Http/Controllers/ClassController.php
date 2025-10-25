<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Event;
use App\Models\ClassSchedule;
use Carbon\Carbon;
use App\Notifications\EventRegistrationConfirmation;
use App\Notifications\ClassRegistrationConfirmation;
use App\Notifications\AdminEventRegistrationNotification;
use App\Notifications\AdminClassRegistrationNotification;
use App\Models\NotifiableUser;
use Illuminate\Support\Facades\Notification;

class ClassController extends Controller
{
    public function levels()
    {
        $levels = ClassSchedule::select('level')->distinct()->orderBy('level')->get()->pluck('level');
        return response()->json($levels);
    }

    public function dates($level)
    {
        $dates = ClassSchedule::where('level', $level)
            ->orderBy('date')
            ->pluck('date')
            ->map(fn($d) => \Carbon\Carbon::parse($d)->format('Y-m-d'))
            ->values();

        return response()->json($dates);
    }

    public function times($level, $date)
    {
        $times = ClassSchedule::where('level', $level)
            ->where('date', $date)
            ->orderBy('start_time')
            ->get(['id', 'start_time', 'end_time'])
            ->map(fn($s) => [
                'id' => $s->id,
                'time' => "{$s->start_time} - {$s->end_time}"
            ]);

        return response()->json($times);
    }

    public function register(Request $request)
    {
        try {
            // Debug: Log incoming data
            \Log::info('Registration attempt:', $request->all());

            // Validation rules
            $rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'city' => 'nullable|string|max:100',
                'type' => 'required|in:Hangout,Classes'
            ];

            // Add conditional validation based on type
            if ($request->type === 'Hangout') {
                $rules['hangout_id'] = 'required|exists:events,id';
            } elseif ($request->type === 'Classes') {
                $rules['class_schedule_id'] = 'required|exists:class_schedules,id';
            }

            // Validate the request
            $validated = $request->validate($rules);

            // Handle Event Registration (Hangout type)
            if ($validated['type'] === 'Hangout' && !empty($validated['hangout_id'])) {
                $event = \App\Models\Event::findOrFail($validated['hangout_id']);

                // Check if event date has passed
                $eventDateTime = \Carbon\Carbon::parse($event->event_date . ' ' . ($event->event_time ?: '00:00:00'));
                if ($eventDateTime->isPast()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'This event has already passed.'
                    ], 400);
                }

                // Check if user is already registered
                $existingRegistration = \App\Models\Registration::where('hangout_id', $validated['hangout_id'])
                                                              ->where('email', $validated['email'])
                                                              ->first();

                if ($existingRegistration) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You are already registered for this event.'
                    ], 400);
                }

                // Check event capacity
                if ($event->isFull()) {
                    return response()->json([
                        'success' => false,
                        'message' => "Sorry, {$event->title} registration is full!"
                    ], 400);
                }

                // Create registration
                \App\Models\Registration::create([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'] ?? null,
                    'city' => $validated['city'] ?? null,
                    'type' => 'Hangout',
                    'hangout_id' => $validated['hangout_id'],
                    'event_title' => $event->title
                ]);

                return response()->json([
                    'success' => true,
                    'message' => "Successfully registered for {$event->title}!"
                ]);
            }

            // Handle Class Registration
            if ($validated['type'] === 'Classes' && !empty($validated['class_schedule_id'])) {
                $classSchedule = \App\Models\ClassSchedule::findOrFail($validated['class_schedule_id']);

                // Check if user already registered for this class
                $existingRegistration = \App\Models\Registration::where('class_schedule_id', $validated['class_schedule_id'])
                                                              ->where('email', $validated['email'])
                                                              ->first();

                if ($existingRegistration) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You are already registered for this class.'
                    ], 400);
                }

                // Create registration
                \App\Models\Registration::create([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'] ?? null,
                    'city' => $validated['city'] ?? null,
                    'type' => 'Classes',
                    'class_schedule_id' => $validated['class_schedule_id'],
                ]);

                return response()->json([
                    'success' => true,
                    'message' => "Successfully registered for the class!"
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Please fill in all required fields correctly.'
            ], 400);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed:', $e->errors());

            return response()->json([
                'success' => false,
                'message' => 'Validation failed: ' . collect($e->errors())->flatten()->first()
            ], 422);

        } catch (\Exception $e) {
            \Log::error('Registration error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.'
            ], 500);
        }
    }

    public function getEvents()
    {
        // Get events that are not full and are upcoming
        $events = \App\Models\Event::whereDate('event_date', '>=', \Carbon\Carbon::today())
                                  ->get()
                                  ->filter(function($event) {
                                      return !$event->isFull(); // Only show events that aren't full
                                  })
                                  ->map(function($event) {
                                      $eventDate = \Carbon\Carbon::parse($event->event_date);
                                      $formattedDate = $eventDate->format('F jS Y'); // December 7th 2025

                                      $formattedTime = 'TBA';
                                      if ($event->event_time) {
                                          $time = \Carbon\Carbon::parse($event->event_time);
                                          $formattedTime = $time->format('H:i') . 'pm'; // 16:00pm
                                      }

                                      return [
                                          'id' => $event->id,
                                          'title' => $event->title,
                                          'date' => $formattedDate,
                                          'time' => $formattedTime,
                                          'remaining_spots' => $event->getRemainingSpots(),
                                          'capacity' => $event->capacity
                                      ];
                                  });

        return response()->json($events->values());
    }

    public function registerUser(Request $request)
    {
        try {
            // Basic validation
            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'type' => 'required|in:Hangout,Classes'
            ]);

            // Handle Event Registration (Hangout type)
            if ($request->type === 'Hangout') {
                \Log::info('Processing Hangout registration');
                \Log::info('Hangout ID received: ' . $request->hangout_id);

                // Validate hangout_id exists
                $request->validate(['hangout_id' => 'required|exists:events,id']);

                // Check if Event model exists and find the event
                try {
                    $event = \App\Models\Event::findOrFail($request->hangout_id);
                    \Log::info('Found event: ' . $event->title);
                } catch (\Exception $e) {
                    \Log::error('Event not found: ' . $e->getMessage());
                    return response()->json([
                        'success' => false,
                        'message' => 'Event not found.'
                    ], 404);
                }

                // Check if user already registered (simplified check)
                $existingRegistration = \App\Models\Registration::where('hangout_id', $request->hangout_id)
                                          ->where('email', $request->email)
                                          ->exists();

                if ($existingRegistration) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You are already registered for this event.'
                    ], 400);
                }

                // Check event capacity (simplified - skip the isFull() method for now)
                $registrationCount = \App\Models\Registration::where('hangout_id', $request->hangout_id)->count();
                \Log::info('Current registrations: ' . $registrationCount . ', Capacity: ' . $event->capacity);

                if ($registrationCount >= $event->capacity) {
                    return response()->json([
                        'success' => false,
                        'message' => "Sorry, {$event->title} registration is full!"
                    ], 400);
                }

                // Create registration (simplified)
                $registration = \App\Models\Registration::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'city' => $request->city,
                    'type' => 'Hangout',
                    'hangout_id' => $request->hangout_id,
                ]);

                \Log::info('Registration created successfully with ID: ' . $registration->id);

                // Send confirmation email to user
                try {
                    $user = new NotifiableUser(
                        $registration->email,
                        $registration->first_name . ' ' . $registration->last_name
                    );

                    Notification::send($user, new EventRegistrationConfirmation($event, $registration));
                    \Log::info('✅ Event confirmation email sent to user: ' . $registration->email);
                } catch (\Exception $e) {
                    \Log::error('❌ Failed to send user confirmation email: ' . $e->getMessage());
                }

                // Send notification email to admin
                try {
                    $adminEmail = env('ADMIN_EMAIL', 'admin@germanpractice.com'); // Add this to your .env
                    $admin = new NotifiableUser($adminEmail, 'Admin');

                    Notification::send($admin, new AdminEventRegistrationNotification($event, $registration));
                    \Log::info('✅ Admin notification email sent for event registration');
                } catch (\Exception $e) {
                    \Log::error('❌ Failed to send admin notification email: ' . $e->getMessage());
                }

                return response()->json([
                    'success' => true,
                    'message' => "🎉 Thank you for registering for {$event->title}! Check your email for confirmation details."
                ]);
            }

            // Handle Class Registration (keep existing working code)
            if ($request->type === 'Classes') {
                $request->validate(['class_schedule_id' => 'required|exists:class_schedules,id']);

                // ✅ FIX: Get the class schedule from database
                $classSchedule = \App\Models\ClassSchedule::findOrFail($request->class_schedule_id);

                $existingRegistration = \App\Models\Registration::where('class_schedule_id', $request->class_schedule_id)
                                          ->where('email', $request->email)
                                          ->exists();

                if ($existingRegistration) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You are already registered for this class.'
                    ], 400);
                }

                $registration = \App\Models\Registration::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'city' => $request->city,
                    'type' => 'Classes',
                    'class_schedule_id' => $request->class_schedule_id,
                ]);

                \Log::info('Class registration created with ID: ' . $registration->id);

                // ✅ FIX: Send confirmation email to user (now $classSchedule is defined)
                try {
                    $user = new NotifiableUser(
                        $registration->email,
                        $registration->first_name . ' ' . $registration->last_name
                    );

                    Notification::send($user, new ClassRegistrationConfirmation($classSchedule, $registration));
                    \Log::info('✅ Class confirmation email sent to user: ' . $registration->email);
                } catch (\Exception $e) {
                    \Log::error('❌ Failed to send user confirmation email: ' . $e->getMessage());
                    \Log::error('Error details: ' . $e->getTraceAsString());
                }

                // ✅ FIX: Send notification email to admin (now $classSchedule is defined)
                try {
                    $adminEmail = env('ADMIN_EMAIL', 'anembaben@gmail.com');
                    $admin = new NotifiableUser($adminEmail, 'Admin');

                    Notification::send($admin, new AdminClassRegistrationNotification($classSchedule, $registration));
                    \Log::info('✅ Admin notification email sent for class registration');
                } catch (\Exception $e) {
                    \Log::error('❌ Failed to send admin notification email: ' . $e->getMessage());
                    \Log::error('Error details: ' . $e->getTraceAsString());
                }

                return response()->json([
                    'success' => true,
                    'message' => "🎉 Welcome to our German classes! Check your email for confirmation and next steps."
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Please select a valid registration type.'
            ], 400);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed: ' . collect($e->errors())->flatten()->first()
            ], 422);

        } catch (\Exception $e) {
            \Log::error('Registration error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
