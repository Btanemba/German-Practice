@extends(backpack_view('blank'))

@section('header')
    <section class="container-fluid d-print-none">
        <h2>
            💬 Reply to {{ $user_name }}
        </h2>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5>💬 Chat Conversation with {{ $user_name }}</h5>
                <p class="text-muted mb-0">Email: {{ $user_email }}</p>
            </div>
            <div class="card-body">
                <!-- Conversation History -->
                <div class="chat-history" style="max-height: 400px; overflow-y: auto; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; margin-bottom: 20px; background: #f8fafc;">
                    @foreach($messages as $message)
                        <div class="message mb-3 {{ $message->sender_type === 'admin' ? 'text-end' : '' }}">
                            <div class="d-inline-block" style="max-width: 70%; padding: 12px 16px; border-radius: 18px;
                                {{ $message->sender_type === 'admin' ? 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;' : 'background: white; border: 1px solid #e2e8f0;' }}">
                                <p class="mb-1" style="font-size: 14px; line-height: 1.4;">{{ $message->message }}</p>
                                <small style="opacity: 0.7; font-size: 11px;">
                                    {{ $message->sender_type === 'admin' ? 'Admin' : $message->name }} •
                                    {{ $message->created_at->format('M d, Y H:i') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Reply Form -->
                <form method="POST" action="{{ url($crud->route.'/'.$messages->first()->id.'/send-reply') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="message">Your Reply</label>
                        <textarea class="form-control @error('message') is-invalid @enderror"
                                  id="message"
                                  name="message"
                                  rows="4"
                                  placeholder="Type your response here..."
                                  required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info">
                        <h6>💡 How it works:</h6>
                        <ul class="mb-0">
                            <li>Your reply will appear instantly in the user's chat widget</li>
                            <li>The user will get a notification if their chat is closed</li>
                            <li>They can continue the conversation in real-time</li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url($crud->route) }}" class="btn btn-secondary">
                            ← Back to Chat Messages
                        </a>
                        <button type="submit" class="btn btn-success">
                            💬 Send Reply
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.chat-history {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
}

.message:last-child {
    margin-bottom: 0 !important;
}

/* Smooth scroll for chat history */
.chat-history {
    scroll-behavior: smooth;
}

/* Admin message styling */
.message .d-inline-block {
    transition: all 0.2s ease;
}

.message .d-inline-block:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}
</style>

<script>
// Auto-scroll to bottom of chat history
document.addEventListener('DOMContentLoaded', function() {
    const chatHistory = document.querySelector('.chat-history');
    chatHistory.scrollTop = chatHistory.scrollHeight;
});
</script>
@endsection
