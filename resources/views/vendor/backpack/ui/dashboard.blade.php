@extends(backpack_view('blank'))

@php
    use Carbon\Carbon;
    use App\Models\Event;

    // Count upcoming events (event_date in the future or today)
    $upcomingEventsCount = Event::whereDate('event_date', '>=', Carbon::today())->count();

@endphp

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-center shadow-sm p-3">
            <h4 class="fw-bold mb-2">Upcoming Events</h4>
            <h1 class="text-primary">{{ $upcomingEventsCount }}</h1>
            <p class="text-muted mb-0">as of {{ Carbon::today()->toFormattedDateString() }}</p>
        </div>
    </div>
</div>
@endsection
