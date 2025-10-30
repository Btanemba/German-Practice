@extends(backpack_view('blank'))

@section('header')
    <section class="container-fluid d-print-none">
        <h2>
            💬 Conversation with {{ $user_name }}
        </h2>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>💬 Full Conversation</h5>
                        <p class="text-muted mb-0">
                            <strong>{{ $user_name }}</strong> ({{ $user_email }}) •
                            {{ $messages->count() }} messages
                        </p>
                    </div>
                    <div>
                        <a href="{{ url($crud->route.'/'.$messages->first()->id.'/reply') }}" class="btn btn-success">
                            <i class="la la-reply"></i> Reply
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Chat Container -->
                <div class="chat-container" style="
                    height: 600px;
                    overflow-y: auto;
                    border: 1px solid #e2e8f0;
                    border-radius: 15px;
                    padding: 20px;
                    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
                ">
                    @forelse($messages as $message)
                        <div class="message-wrapper mb-4 {{ $message->sender_type === 'admin' ? 'admin-message' : 'user-message' }}">
                            <div class="message-bubble {{ $message->sender_type === 'admin' ? 'ms-auto' : '' }}" style="
                                max-width: 70%;
                                padding: 15px 20px;
                                border-radius: 20px;
                                {{ $message->sender_type === 'admin'
                                    ? 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; margin-left: auto;'
                                    : 'background: white; border: 1px solid #e2e8f0; color: #1f2937;' }}
                                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                                position: relative;
                            ">
                                <!-- Message Content -->
                                <div class="message-content">
                                    <p class="mb-2" style="font-size: 15px; line-height: 1.5; margin: 0;">
                                        {{ $message->message }}
                                    </p>
                                </div>

                                <!-- Message Meta -->
                                <div class="message-meta" style="
                                    font-size: 12px;
                                    opacity: 0.8;
                                    margin-top: 8px;
                                    {{ $message->sender_type === 'admin' ? 'text-align: right;' : '' }}
                                ">
                                    <span class="sender-name" style="font-weight: 600;">
                                        {{ $message->sender_type === 'admin' ? '👨‍💼 Admin' : '👤 ' . $message->name }}
                                    </span>
                                    •
                                    <span class="timestamp">
                                        {{ $message->created_at->format('M d, Y H:i') }}
                                    </span>
                                    @if($message->sender_type === 'user' && $message->is_read)
                                        • <span style="color: #10b981;">✓ Read</span>
                                    @endif
                                </div>

                                <!-- Message Tail -->
                                <div class="message-tail" style="
                                    position: absolute;
                                    bottom: 15px;
                                    width: 0;
                                    height: 0;
                                    {{ $message->sender_type === 'admin'
                                        ? 'right: -8px; border-left: 8px solid #667eea; border-top: 8px solid transparent; border-bottom: 8px solid transparent;'
                                        : 'left: -8px; border-right: 8px solid white; border-top: 8px solid transparent; border-bottom: 8px solid transparent;' }}
                                "></div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <div style="font-size: 3rem; margin-bottom: 20px;">💬</div>
                            <h5>No messages found</h5>
                            <p class="text-muted">This conversation appears to be empty.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Conversation Stats -->
                <div class="conversation-stats mt-4 p-3" style="background: #f8fafc; border-radius: 10px;">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="stat-item">
                                <div class="stat-number" style="font-size: 1.5rem; font-weight: 700; color: #3b82f6;">
                                    {{ $messages->count() }}
                                </div>
                                <div class="stat-label" style="font-size: 0.875rem; color: #6b7280;">
                                    Total Messages
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-item">
                                <div class="stat-number" style="font-size: 1.5rem; font-weight: 700; color: #10b981;">
                                    {{ $messages->where('sender_type', 'user')->count() }}
                                </div>
                                <div class="stat-label" style="font-size: 0.875rem; color: #6b7280;">
                                    User Messages
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-item">
                                <div class="stat-number" style="font-size: 1.5rem; font-weight: 700; color: #667eea;">
                                    {{ $messages->where('sender_type', 'admin')->count() }}
                                </div>
                                <div class="stat-label" style="font-size: 0.875rem; color: #6b7280;">
                                    Admin Replies
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-item">
                                <div class="stat-number" style="font-size: 1.5rem; font-weight: 700; color: #f59e0b;">
                                    {{ $messages->first() ? $messages->first()->created_at->diffForHumans() : 'N/A' }}
                                </div>
                                <div class="stat-label" style="font-size: 0.875rem; color: #6b7280;">
                                    Started
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons mt-4 text-center">
                    <a href="{{ url($crud->route) }}" class="btn btn-secondary me-2">
                        ← Back to Chat Messages
                    </a>
                    <a href="{{ url($crud->route.'/'.$messages->first()->id.'/reply') }}" class="btn btn-success me-2">
                        <i class="la la-reply"></i> Reply to Conversation
                    </a>
                    <a href="mailto:{{ $user_email }}?subject=Re: Your message from {{ config('app.name') }}" class="btn btn-info">
                        <i class="la la-envelope"></i> Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom styles for chat conversation */
.chat-container {
    scroll-behavior: smooth;
}

.message-wrapper {
    display: flex;
    align-items: flex-end;
}

.message-wrapper.admin-message {
    justify-content: flex-end;
}

.message-wrapper.user-message {
    justify-content: flex-start;
}

.message-bubble {
    transition: all 0.2s ease;
    animation: messageSlideIn 0.3s ease-out;
}

.message-bubble:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15) !important;
}

@keyframes messageSlideIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .message-bubble {
        max-width: 85% !important;
        padding: 12px 16px !important;
    }

    .chat-container {
        height: 400px !important;
        padding: 15px !important;
    }

    .conversation-stats .row {
        font-size: 0.875rem;
    }

    .stat-number {
        font-size: 1.25rem !important;
    }
}

/* Scrollbar styling */
.chat-container::-webkit-scrollbar {
    width: 6px;
}

.chat-container::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.chat-container::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.chat-container::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-scroll to bottom of conversation
    const chatContainer = document.querySelector('.chat-container');
    chatContainer.scrollTop = chatContainer.scrollHeight;

    // Add smooth scroll behavior for action buttons
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endsection
