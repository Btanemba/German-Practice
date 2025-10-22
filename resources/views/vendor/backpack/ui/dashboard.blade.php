@extends(backpack_view('blank'))

@php
    use Carbon\Carbon;
    use App\Models\Event;
    use App\Models\Subscriber;
    use App\Models\Hangout;

    // Count upcoming events
    $upcomingEventsCount = Event::whereDate('event_date', '>=', Carbon::today())->count();

    // Count active subscribers
    $activeSubscribersCount = Subscriber::where('subscribed', true)->count();

     // Find the next hangout date
    $nextHangout = Hangout::whereDate('date', '>=', Carbon::today())
        ->orderBy('date', 'asc')
        ->first();

    // Count how many hangouts are on that date
    $totalHangouts = $nextHangout
        ? Hangout::whereDate('date', $nextHangout->date)->count()
        : 0;
@endphp

@section('content')
<div class="row">

    {{-- Upcoming Events Card --}}
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <div class="card text-center shadow-sm p-3">
            <h4 class="fw-bold mb-2">Upcoming Events</h4>
            <h1 class="text-primary">{{ $upcomingEventsCount }}</h1>
            <p class="text-muted mb-0">as of {{ Carbon::today()->toFormattedDateString() }}</p>
        </div>
    </div>

    {{-- Active Subscribers Card --}}
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <div class="card text-center shadow-sm p-3">
            <h4 class="fw-bold mb-2">Active Subscribers</h4>
            <h1 class="text-success">{{ $activeSubscribersCount }}</h1>
            <p class="text-muted mb-0">Subscribed to Newsletter</p>
        </div>
    </div>

     {{-- Total Hangouts Card --}}
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <div class="card text-center shadow-sm p-3">
            <h4 class="fw-bold mb-2">Registered for C-C</h4>
            <h1 class="text-primary">{{ $totalHangouts }}</h1>

            @if ($nextHangout)
                <p class="text-muted mb-0">
                    for {{ Carbon::parse($nextHangout->date)->toFormattedDateString() }}
                </p>
            @else
                <p class="text-muted mb-0">No upcoming hangouts</p>
            @endif
        </div>
    </div>

</div>
@endsection
