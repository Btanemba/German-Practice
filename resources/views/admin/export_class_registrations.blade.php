@extends(backpack_view('blank'))

@section('header')
    <section class="container-fluid d-print-none">
        <h2>
            📊 Export Class Registrations
        </h2>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5>📊 Export Class Registrations to CSV</h5>
                <p class="text-muted mb-0">Download registration data including First Name, Last Name, Email, Phone, and Class details</p>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ url($crud->route.'/export-class') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="class_level">Select Class Level</label>
                        <select class="form-control @error('class_level') is-invalid @enderror"
                                id="class_level"
                                name="class_level"
                                required>
                            <option value="">Choose a class level...</option>
                            @foreach($classLevels as $level)
                                <option value="{{ $level }}" {{ old('class_level') == $level ? 'selected' : '' }}>
                                    Level {{ $level }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info">
                        <h6>📋 Export will include:</h6>
                        <ul class="mb-0">
                            <li>First Name</li>
                            <li>Last Name</li>
                            <li>Email Address</li>
                            <li>Phone Number</li>
                            <li>City</li>
                            <li>Class Level</li>
                            <li>Class Date</li>
                            <li>Start & End Time</li>
                            <li>Registration Date & Time</li>
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
        $('#class_level').select2({
            theme: 'bootstrap',
            placeholder: 'Choose a class level...'
        });
    });
</script>
@endsection
