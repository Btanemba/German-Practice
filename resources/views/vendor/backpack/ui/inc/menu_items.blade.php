{{-- Dashboard --}}
<li class="nav-item">
    <a class="nav-link nav-dashboard" href="{{ backpack_url('dashboard') }}">
        <i class="la la-tachometer-alt nav-icon"></i>
        <span>{{ trans('backpack::base.dashboard') }}</span>
    </a>
</li>

{{-- Events --}}
<li class="nav-item">
    <a class="nav-link nav-events" href="{{ backpack_url('event') }}">
        <i class="la la-calendar-check nav-icon"></i>
        <span>📅 Events</span>
    </a>
</li>

{{-- Subscribers --}}
<li class="nav-item">
    <a class="nav-link nav-subscribers" href="{{ backpack_url('subscriber') }}">
        <i class="la la-envelope nav-icon"></i>
        <span>📧 Subscribers</span>
    </a>
</li>

{{-- Clients --}}
<li class="nav-item">
    <a class="nav-link nav-clients" href="{{ backpack_url('registration') }}">
        <i class="la la-user-friends nav-icon"></i>
        <span>👥 Clients</span>
    </a>
</li>

{{-- Chat Messages --}}
<li class="nav-item">
    <a class="nav-link nav-chat" href="{{ backpack_url('chat-message') }}">
        <i class="la la-comments nav-icon"></i>
        <span>💬 Chats</span>
        @php
            $unreadCount = \App\Models\ChatMessage::where('sender_type', 'user')->where('is_read', false)->count();
        @endphp
        @if($unreadCount > 0)
            <span class="badge badge-danger ms-2">{{ $unreadCount }}</span>
        @endif
    </a>
</li>

{{-- Reviews --}}
<li class="nav-item">
    <a class="nav-link nav-reviews" href="{{ backpack_url('review') }}">
        <i class="la la-star nav-icon"></i>
        <span>⭐ Reviews</span>
    </a>
</li>

{{-- Activities Dropdown --}}
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle nav-activities" href="#" id="activitiesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="la la-rocket nav-icon"></i>
        <span>🎯 Activities</span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="activitiesDropdown">
        <li>
            <a class="dropdown-item" href="{{ backpack_url('practice-material') }}">
                <i class="la la-book-open nav-icon"></i>
                📚 Practice Materials
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ backpack_url('class-schedule') }}">
                <i class="la la-chalkboard-teacher nav-icon"></i>
                🎓 Class Schedules
            </a>
        </li>
    </ul>
</li>

<style>
    /* Modern sidebar styling */
    .sidebar .nav-item .nav-link {
        border-radius: 12px;
        margin: 2px 8px;
        padding: 12px 16px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .sidebar .nav-item .nav-link:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* Dashboard - Purple gradient */
    .nav-dashboard:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white !important;
    }

    /* Events - Orange gradient */
    .nav-events:hover {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: white !important;
    }

    /* Subscribers - Blue gradient */
    .nav-subscribers:hover {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: #333 !important;
    }

    /* Clients - Green gradient */
    .nav-clients:hover {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white !important;
    }

    /* Chat Messages - Teal gradient */
    .nav-chat:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white !important;
    }

    /* Reviews - Yellow gradient */
    .nav-reviews:hover {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white !important;
    }

    /* Activities dropdown - Pink gradient */
    .nav-activities:hover {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white !important;
    }

    /* Dropdown items */
    .sidebar .dropdown-menu {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        margin-left: 10px;
    }

    .sidebar .dropdown-item {
        border-radius: 8px;
        margin: 2px 8px;
        padding: 8px 12px;
        transition: all 0.3s ease;
    }

    .sidebar .dropdown-item:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: translateX(3px);
    }

    /* Icons styling */
    .nav-icon {
        width: 20px;
        text-align: center;
        margin-right: 10px;
        font-size: 18px;
    }

    /* Add subtle animation */
    @keyframes slideIn {
        from { opacity: 0; transform: translateX(-10px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .sidebar .nav-item {
        animation: slideIn 0.3s ease;
    }
</style>

<script>
    // Add staggered animation delay for menu items
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.sidebar .nav-item');
        menuItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>

