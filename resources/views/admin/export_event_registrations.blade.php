@extends(backpack_view('blank'))

@section('header')
    <section class="container-fluid d-print-none">
        <h2>
            📊 Export Event Registrations
        </h2>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5>📊 Export Event Registrations to CSV</h5>
                <p class="text-muted mb-0">Download registration data including First Name, Last Name, and Email Address</p>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ url($crud->route.'/export-event') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="event_id">Select Event</label>
                        <select class="form-control @error('event_id') is-invalid @enderror"
                                id="event_id"
                                name="event_id"
                                required>
                            <option value="">Choose an event...</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                                    {{ $event->title }}
                                    ({{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }})
                                </option>
                            @endforeach
                        </select>
                        @error('event_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info">
                        <h6>📋 Export will include:</h6>
                        <ul class="mb-0">
                            <li>First Name</li>
                            <li>Last Name</li>
                            <li>Email Address</li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url($crud->route) }}" class="btn btn-secondary">
                            ← Back to Registrations
                        </a>
                        <button type="submit" class="btn btn-success">
                            📊 Download CSV
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after_scripts')
<script>
    $(document).ready(function() {
        $('#event_id').select2({
            theme: 'bootstrap',
            placeholder: 'Choose an event...'
        });
    });
</script>
@endsection
