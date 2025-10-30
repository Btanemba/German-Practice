@extends(backpack_view('blank'))

@section('content')
@include(backpack_view('inc.alerts'))

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
          <strong><i class="la la-exclamation-circle"></i> Please fix the following issues:</strong>
          <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="card border-0 shadow-lg rounded-4">
        <div class="card-header bg-success text-white rounded-top-4">
          <h4 class="mb-0">
            <i class="la la-graduation-cap me-2"></i> Send Bulk Email to Class Registrants
          </h4>
        </div>

        <div class="card-body p-4">
          <form method="POST" action="{{ url($crud->route . '/bulk-email-class') }}">
            @csrf

            <div class="mb-4">
              <label class="form-label fw-semibold">Select Class Level <span class="text-danger">*</span></label>
              <select name="class_level" class="form-select shadow-sm" required>
                <option value="">-- Choose Class Level --</option>
                @foreach($classLevels as $level)
                  <option value="{{ $level }}">
                    Level {{ $level }}
                    ({{ \App\Models\Registration::where('type', 'Classes')->whereHas('classSchedule', function($q) use ($level) { $q->where('level', $level); })->count() }} registrants)
                  </option>
                @endforeach
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">Email Subject <span class="text-danger">*</span></label>
              <input 
                type="text" 
                name="subject" 
                class="form-control shadow-sm" 
                placeholder="Enter email subject" 
                required
              >
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
              <textarea 
                name="message" 
                class="form-control shadow-sm" 
                rows="8" 
                placeholder="Write your email message here..." 
                required></textarea>
              <small class="text-muted d-block mt-2">
                Available placeholders: <code>{first_name}</code>, <code>{last_name}</code>, <code>{email}</code>
              </small>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
              <button type="submit" class="btn btn-success px-4 py-2 shadow-sm">
                <i class="la la-paper-plane me-1"></i> Send Emails
              </button>
              <a href="{{ url($crud->route) }}" class="btn btn-outline-secondary px-4 py-2">
                <i class="la la-arrow-left me-1"></i> Cancel
              </a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
  .card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  }
  .btn-success:hover {
    background-color: #198754 !important;
  }
  .form-control, .form-select {
    border-radius: 0.5rem;
  }
</style>
@endsection
