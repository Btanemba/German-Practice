@extends(backpack_view('blank'))

@php
    use Carbon\Carbon;
    use App\Models\Event;
    use App\Models\Subscriber;

    // Count upcoming events
    $upcomingEventsCount = Event::whereDate('event_date', '>=', Carbon::today())->count();

    // Count active subscribers
    $activeSubscribersCount = Subscriber::where('subscribed', true)->count();
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

</div>
@endsection
