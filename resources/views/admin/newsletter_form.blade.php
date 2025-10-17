@extends(backpack_view('blank'))

@section('content')
<div class="container">
    <h2>Send Newsletter</h2>

    <form method="POST" action="{{ route('admin.newsletter.send') }}">
        @csrf
        <div class="form-group mt-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="Newsletter subject" required>
        </div>

        <div class="form-group mt-3">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="6" placeholder="Write your newsletter here..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Send Newsletter</button>
    </form>
</div>
@endsection
