<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSchedule;
use App\Models\Registration;

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
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email|max:255',
        'phone'      => 'nullable|string|max:50',
        'city'       => 'nullable|string|max:255',
        'type'       => 'required|in:Hangout,Classes',
        'hangout_id' => 'nullable|exists:hangouts,id',
        'class_schedule_id' => 'nullable|exists:class_schedules,id',
    ]);

    Registration::create($validated);

    return response()->json(['message' => 'Successfully registered!']);
}
}
