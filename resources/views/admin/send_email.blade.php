@extends(backpack_view('blank'))

@section('header')
    <section class="container-fluid d-print-none">
        <h2>
            Send Email to {{ $registration->first_name }} {{ $registration->last_name }}
        </h2>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5>📧 Send Individual Email</h5>
                <p class="text-muted mb-0">To: {{ $registration->email }}</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url($crud->route.'/'.$registration->id.'/process-email') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="subject">Subject</label>
                        <input type="text"
                               class="form-control @error('subject') is-invalid @enderror"
                               id="subject"
                               name="subject"
                               value="{{ old('subject') }}"
                               required>
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="message">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror"
                                  id="message"
                                  name="message"
                                  rows="8"
                                  required>{{ old('message', "Hello {$registration->first_name},") }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <h6>📋 Client Information:</h6>
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> {{ $registration->first_name }} {{ $registration->last_name }}</li>
                            <li><strong>Email:</strong> {{ $registration->email }}</li>
                            <li><strong>Type:</strong> {{ $registration->type }}</li>
                            @if($registration->classSchedule)
                                <li><strong>Class:</strong> {{ $registration->classSchedule->level }} on {{ $registration->classSchedule->date }}</li>
                            @endif
                            @if($registration->hangout)
                                <li><strong>Hangout:</strong> {{ \Carbon\Carbon::parse($registration->hangout->date)->format('M d, Y') }}</li>
                            @endif
                        </ul>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <i class="la la-paper-plane"></i> Send Email
                        </button>
                        <a href="{{ url($crud->route) }}" class="btn btn-secondary">
                            <i class="la la-arrow-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
