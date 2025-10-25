@extends(backpack_view('blank'))

@php
    use Carbon\Carbon;
    use App\Models\Event;
    use App\Models\Subscriber;
    use App\Models\Registration;

    // Count upcoming events
    $upcomingEventsCount = Event::whereDate('event_date', '>=', Carbon::today())->count();

    // Count active subscribers
    $activeSubscribersCount = Subscriber::where('subscribed', true)->count();

    // ✅ FIXED: Find the next event date (changed from Hangout to Event)
    $nextEvent = Event::whereDate('event_date', '>=', Carbon::today())
        ->orderBy('event_date', 'asc')
        ->first();

    // ✅ FIXED: Count total registrations for events (not hangouts on a date)
    $totalEventRegistrations = Registration::where('type', 'Hangout')->count();

    // Count total booked classes
    $totalBookedClasses = Registration::whereNotNull('class_schedule_id')->count();
@endphp

@section('content')
<style>
    .dashboard-card {
        border: none;
        border-radius: 20px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
    }

    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
    }

    .card-events::before { background: linear-gradient(90deg, #667eea 0%, #764ba2 100%); }
    .card-subscribers::before { background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%); }
    .card-hangouts::before { background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%); }
    .card-classes::before { background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%); }

    .card-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 24px;
        color: white;
    }

    .icon-events { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .icon-subscribers { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .icon-hangouts { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
    .icon-classes { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 10px 0;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-number.subscribers {
        background: linear-gradient(45deg, #f093fb, #f5576c);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-number.hangouts {
        background: linear-gradient(45deg, #4facfe, #00f2fe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-number.classes {
        background: linear-gradient(45deg, #43e97b, #38f9d7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .dashboard-title {
        text-align: center;
        margin-bottom: 40px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }
</style>

<div class="container-fluid">
    <h1 class="dashboard-title">📊 Dashboard Overview</h1>

    <div class="row g-4">
        {{-- Upcoming Events Card --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card dashboard-card card-events shadow-lg p-4">
                <div class="card-body text-center">
                    <div class="card-icon icon-events">
                        📅
                    </div>
                    <h5 class="fw-bold mb-2 text-dark">Upcoming Events</h5>
                    <h1 class="stat-number">{{ $upcomingEventsCount }}</h1>
                    <p class="text-muted mb-0">
                        <small>📆 as of {{ Carbon::today()->format('M d, Y') }}</small>
                    </p>
                </div>
            </div>
        </div>

        {{-- Active Subscribers Card --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card dashboard-card card-subscribers shadow-lg p-4">
                <div class="card-body text-center">
                    <div class="card-icon icon-subscribers">
                        📧
                    </div>
                    <h5 class="fw-bold mb-2 text-dark">Active Subscribers</h5>
                    <h1 class="stat-number subscribers">{{ $activeSubscribersCount }}</h1>
                    <p class="text-muted mb-0">
                        <small>✉️ Newsletter Subscribers</small>
                    </p>
                </div>
            </div>
        </div>

        {{-- Total Event Registrations Card --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card dashboard-card card-hangouts shadow-lg p-4">
                <div class="card-body text-center">
                    <div class="card-icon icon-hangouts">
                        🎯
                    </div>
                    <h5 class="fw-bold mb-2 text-dark">Event Registrations</h5>
                    <h1 class="stat-number hangouts">{{ $totalEventRegistrations }}</h1>
                    @if ($nextEvent)
                        <p class="text-muted mb-0">
                            <small>📅 Next: {{ Carbon::parse($nextEvent->event_date)->format('M d, Y') }}</small>
                        </p>
                    @else
                        <p class="text-muted mb-0">
                            <small>😴 No upcoming events</small>
                        </p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Total Booked Classes Card --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card dashboard-card card-classes shadow-lg p-4">
                <div class="card-body text-center">
                    <div class="card-icon icon-classes">
                        🎓
                    </div>
                    <h5 class="fw-bold mb-2 text-dark">Booked Classes</h5>
                    <h1 class="stat-number classes">{{ $totalBookedClasses }}</h1>
                    <p class="text-muted mb-0">
                        <small>📚 Total Registrations</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
