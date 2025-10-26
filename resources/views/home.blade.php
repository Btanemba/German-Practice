@include('layouts.nav')

<div class="super_container">
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        <div class="top_bar">
            <div class="top_bar_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                <div class="top_bar_right ml-auto">
                                    <!-- Language -->
                                    <div class="top_bar_lang">
                                        <span class="top_bar_title">site language:</span>
                                        <ul class="lang_list">
                                            <li class="hassubs">
                                                <a href="#">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul>
                                                    <li><a href="#">German</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Social -->
                                    <div class="top_bar_social">
                                        <span class="top_bar_title social_title">follow us</span>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Content -->
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo_container mr-auto">
                                <a href="/">
                                    <img src="{{ asset('images/logo2.jpg') }}" alt="Sprachraum" style="
                                                                height: 80px;
                                                                width: auto;
                                                                max-width: 200px;
                                                            ">
                                </a>
                            </div>
                            <nav class="main_nav_contaner">
                                <ul class="main_nav">
                                    <li class="active"><a href="">Home</a></li>
                                    <li><a href="#events">Events</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="header_content_right ml-auto text-right">
                                <div class="user">
                                    <a href="{{ backpack_url('login') }}" target="_blank" title="Admin Login" style="
                                                    display: inline-flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    width: 40px;
                                                    height: 40px;
                                                    background: rgba(59, 130, 246, 0.1);
                                                    border-radius: 50%;
                                                    color: #3b82f6;
                                                    text-decoration: none;
                                                    transition: all 0.3s ease;
                                                    border: 2px solid transparent;
                                                "
                                        onmouseover="this.style.background='#3b82f6'; this.style.color='white'; this.style.transform='scale(1.1)'"
                                        onmouseout="this.style.background='rgba(59, 130, 246, 0.1)'; this.style.color='#3b82f6'; this.style.transform='scale(1)'">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Modern Hero Section -->
    <section class="hero-section" style="
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.8)), url('images/index_background.jpg');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    ">
        <div class="hero-particles"></div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content text-white" style="animation: fadeInUp 1s ease-out;">
                        <h1 class="hero-title mb-4" style="
                            font-size: clamp(2.5rem, 5vw, 4rem);
                            font-weight: 500;
                            line-height: 1.2;
                            background: linear-gradient(45deg, #fff, #e0e7ff);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            background-clip: text;
                        ">

                        </h1>
                        <p class="hero-subtitle mb-5" style="
                            font-size: 1.25rem;
                            opacity: 0.9;
                            line-height: 1.6;
                        ">
                            Master German through interactive hangout-sessions, personalized classes, and engaging conversations with native speakers.
                        </p>
                        <div class="hero-buttons">
                            <a href="#register" class="btn btn-hero-primary me-3 mb-3" style="
                                background: linear-gradient(45deg, #10b981, #059669);
                                border: none;
                                padding: 15px 30px;
                                font-weight: 600;
                                border-radius: 50px;
                                text-decoration: none;
                                color: white;
                                transition: all 0.3s ease;
                                box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
                            ">
                                Start Learning Today
                            </a>
                            <a href="#events" class="btn btn-hero-secondary mb-3" style="
                                background: rgba(255, 255, 255, 0.1);
                                border: 2px solid rgba(255, 255, 255, 0.3);
                                padding: 13px 28px;
                                font-weight: 600;
                                border-radius: 50px;
                                text-decoration: none;
                                color: white;
                                transition: all 0.3s ease;
                                backdrop-filter: blur(10px);
                            ">
                                View Upcoming Events
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center" style="animation: fadeInRight 1s ease-out 0.3s both;">
                        <div class="floating-card" style="
                            background: rgba(255, 255, 255, 0.1);
                            backdrop-filter: blur(20px);
                            border-radius: 20px;
                            padding: 40px;
                            border: 1px solid rgba(255, 255, 255, 0.2);
                            animation: float 6s ease-in-out infinite;
                        ">
                            <div class="stats-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="stat-item text-center">
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">500+</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">Students</div>
                                </div>
                                <div class="stat-item text-center">
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">50+</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">Classes</div>
                                </div>
                                <div class="stat-item text-center">
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">95%</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">Success Rate</div>
                                </div>
                                <div class="stat-item text-center">
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">A1-C2</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">All Levels</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Practice Sessions -->
    <section class="practice-sessions py-5" style="background: linear-gradient(135deg, #f8fafc, #e2e8f0);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" style="
                        font-size: clamp(2rem, 4vw, 3rem);
                        font-weight: 700;
                        color: #1e293b;
                        margin-bottom: 1rem;
                    ">Latest Practice Materials</h2>
                    <p class="section-subtitle" style="
                        font-size: 1.1rem;
                        color: #64748b;
                        max-width: 600px;
                        margin: 0 auto;
                    ">Choose from our interactive learning methods designed to accelerate your German language journey</p>
                </div>
            </div>
            <div class="row g-4">
                @forelse($practiceMaterials as $index => $material)
                    @php
                        // Define gradient colors for variety
                        $gradients = [
                            'linear-gradient(45deg, #3b82f6, #1d4ed8)', // Blue
                            'linear-gradient(45deg, #8b5cf6, #7c3aed)', // Purple
                            'linear-gradient(45deg, #f59e0b, #d97706)', // Orange
                            'linear-gradient(45deg, #ef4444, #dc2626)', // Red
                            'linear-gradient(45deg, #10b981, #059669)', // Green
                            'linear-gradient(45deg, #ec4899, #db2777)', // Pink
                        ];
                        $gradientColor = $gradients[$index % count($gradients)];
                    @endphp

                    <div class="col-lg-4 col-md-6">
                        <div class="practice-card h-100" style="
                            background: white;
                            border-radius: 20px;
                            padding: 30px;
                            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                            transition: all 0.3s ease;
                            border: none;
                            position: relative;
                            overflow: hidden;
                        ">
                            @if($material->image)
                                <div class="card-image mb-4" style="
                                    width: 100%;
                                    height: 150px;
                                    border-radius: 15px;
                                    overflow: hidden;
                                    margin-bottom: 20px;
                                ">
                                    <img src="{{ $material->image_url }}" alt="{{ $material->title }}" style="
                                        width: 100%;
                                        height: 100%;
                                        object-fit: cover;
                                    ">
                                </div>
                            @else
                                <div class="card-icon mb-4" style="
                                    width: 70px;
                                    height: 70px;
                                    background: {{ $gradientColor }};
                                    border-radius: 20px;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-size: 1.8rem;
                                ">📚</div>
                            @endif

                            <h4 style="font-weight: 600; color: #1e293b; margin-bottom: 15px;">{{ $material->title }}</h4>

                            @if($material->description)
                                <p style="color: #64748b; line-height: 1.6; margin-bottom: 20px;">
                                    {{ Str::limit($material->description, 120) }}
                                </p>
                            @endif

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="badge-container">
                                    <span style="
                                        background: {{ $material->cost == 0 ? 'linear-gradient(45deg, #10b981, #059669)' : 'linear-gradient(45deg, #3b82f6, #1d4ed8)' }};
                                        color: white;
                                        padding: 8px 16px;
                                        border-radius: 20px;
                                        font-size: 0.875rem;
                                        font-weight: 600;
                                    ">{{ $material->formatted_cost }}</span>
                                </div>

                                @if($material->link)
                                    <a href="{{ $material->link }}" target="_blank" class="btn-practice-link" style="
                                        background: {{ $gradientColor }};
                                        color: white;
                                        padding: 8px 16px;
                                        border-radius: 20px;
                                        text-decoration: none;
                                        font-size: 0.875rem;
                                        font-weight: 600;
                                        transition: all 0.3s ease;
                                    ">
                                        Get Material
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Fallback content when no practice materials exist -->
                    <div class="col-12 text-center">
                        <div style="
                            background: rgba(59, 130, 246, 0.05);
                            border-radius: 20px;
                            padding: 60px 40px;
                            border: 2px dashed rgba(59, 130, 246, 0.2);
                        ">
                            <div style="font-size: 3rem; margin-bottom: 20px;">📚</div>
                            <h4 style="color: #1e293b; margin-bottom: 15px;">No Practice Materials Available</h4>
                            <p style="color: #64748b;">Check back soon for exciting new learning materials!</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Modern Instructor Section -->
    <section class="instructor-section py-5" style="background: linear-gradient(135deg, #1e293b, #334155);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="instructor-content text-white">
                        <h2 style="
                            font-size: clamp(2rem, 4vw, 3rem);
                            font-weight: 700;
                            margin-bottom: 1.5rem;
                            background: linear-gradient(45deg, #fff, #e0e7ff);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            background-clip: text;
                        ">Your Favourite Tutor in Town</h2>
                        <div class="instructor-card" style="
                            background: rgba(255, 255, 255, 0.1);
                            backdrop-filter: blur(20px);
                            border-radius: 20px;
                            padding: 30px;
                            border: 1px solid rgba(255, 255, 255, 0.2);
                        ">
                            <h4 style="color: #10b981; font-weight: 600; margin-bottom: 10px;">Tamara Terbul</h4>
                            <p style="color: #94a3b8; margin-bottom: 15px; font-weight: 500;">German Language Expert</p>
                            <p style="color: rgba(255, 255, 255, 0.9); line-height: 1.6; margin-bottom: 20px;">
                                With over 10 years of experience teaching German to international students, Tamara brings passion, expertise, and personalized learning approaches to help you achieve fluency faster.
                            </p>
                            <div class="social-links">
                                <a href="#" style="
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    width: 40px;
                                    height: 40px;
                                    background: rgba(255, 255, 255, 0.1);
                                    border-radius: 10px;
                                    color: white;
                                    text-decoration: none;
                                    margin-right: 10px;
                                    transition: all 0.3s ease;
                                "><i class="fa fa-facebook"></i></a>
                                <a href="https://www.linkedin.com/" target="_blank" style="
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    width: 40px;
                                    height: 40px;
                                    background: rgba(255, 255, 255, 0.1);
                                    border-radius: 10px;
                                    color: white;
                                    text-decoration: none;
                                    margin-right: 10px;
                                    transition: all 0.3s ease;
                                "><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="instructor-image" style="position: relative;">
                        <img src="images/instructor_1.jpg" alt="Tamara Terbul" style="
                            width: 300px;
                            height: 300px;
                            border-radius: 50%;
                            object-fit: cover;
                            border: 5px solid rgba(255, 255, 255, 0.2);
                            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                        ">
                        <div style="
                            position: absolute;
                            top: -10px;
                            right: 50px;
                            background: linear-gradient(45deg, #10b981, #059669);
                            color: white;
                            padding: 10px 20px;
                            border-radius: 20px;
                            font-weight: 600;
                            font-size: 0.875rem;
                            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
                        ">10+ Years Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Registration Section -->
    <section id="register" class="register-section py-5" style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 style="
                        font-size: clamp(2rem, 4vw, 3rem);
                        font-weight: 700;
                        color: #1e293b;
                        margin-bottom: 1rem;
                    ">Join Our Learning Community</h2>
                    <p style="
                        font-size: 1.1rem;
                        color: #64748b;
                        max-width: 600px;
                        margin: 0 auto;
                    ">Register for interactive sessions and start your German learning journey today</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="registration-form" style="
                        background: white;
                        border-radius: 25px;
                        padding: 40px;
                        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
                        border: 1px solid rgba(226, 232, 240, 0.8);
                    ">
                        <div class="form-header text-center mb-4">
                            <h3 style="color: #1e293b; font-weight: 600; margin-bottom: 10px;">Start Learning Today</h3>
                            <p style="color: #64748b;">Fill out the form below to register for our sessions</p>
                        </div>

                        <form id="register_form" method="POST" action="/register-user">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="first_name" class="form-control modern-input" id="firstName" placeholder="First Name" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">
                                        <label for="firstName" style="color: #64748b;">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="last_name" class="form-control modern-input" id="lastName" placeholder="Last Name" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">
                                        <label for="lastName" style="color: #64748b;">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control modern-input" id="email" placeholder="Email" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">
                                        <label for="email" style="color: #64748b;">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" name="phone" class="form-control modern-input" id="phone" placeholder="Phone" style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">
                                        <label for="phone" style="color: #64748b;">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="city" class="form-control modern-input" id="city" placeholder="City" style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">
                                        <label for="city" style="color: #64748b;">City</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select id="typeSelect" name="type" class="form-select modern-input" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">
                                            <option value="">Choose Option</option>
                                            <option value="Hangout">🎯 Events & Hangouts</option>
                                            <option value="Classes">📚 Structured Classes</option>
                                        </select>
                                        <label for="typeSelect" style="color: #64748b;">Learning Type</label>
                                    </div>
                                </div>

                                <!-- Hangout Section -->
                                <div id="hangoutSection" class="col-12" style="display:none;">
                                    <div class="modern-select-container mt-3">
                                        <label style="color: #374151; font-weight: 500; margin-bottom: 10px; display: block;">
                                            🎯 Select Your Event
                                        </label>
                                        <select name="hangout_id" id="hangoutSelect" class="form-select modern-input" style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 15px;
                                            font-size: 1rem;
                                        ">
                                            <option value="">Loading events...</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Class Booking Section -->
                                <div id="classBookingSection" class="col-12" style="display:none;">
                                    <div class="class-booking-container mt-3 p-4" style="
                                        background: #f8fafc;
                                        border-radius: 20px;
                                        border: 2px solid #e2e8f0;
                                    ">
                                        <h5 class="text-center mb-4" style="color: #374151; font-weight: 600;">
                                            📚 Select Your Class Level and Schedule
                                        </h5>

                                        <div class="mb-4">
                                            <label for="classLevelSelect" style="color: #374151; font-weight: 500; margin-bottom: 10px; display: block;">
                                                Choose Your Level
                                            </label>
                                            <select id="classLevelSelect" class="form-select modern-input" style="
                                                border-radius: 15px;
                                                border: 2px solid #e2e8f0;
                                                padding: 15px;
                                            ">
                                                <option value="">Select Level (A1–B2)</option>
                                            </select>
                                        </div>

                                        <div id="calendar" class="mb-3"></div>
                                        <div class="legend text-center mb-3">
                                            <span class="badge bg-success me-2">Available</span>
                                            <span class="badge bg-warning text-dark">Unavailable</span>
                                        </div>

                                        <div id="timeSlots" style="display:none;">
                                            <h6 style="color: #374151; font-weight: 500; margin-bottom: 15px;">Available Time Slots</h6>
                                            <div id="timeSlotButtons" class="d-flex flex-wrap gap-2"></div>
                                        </div>

                                        <input type="hidden" name="class_schedule_id" id="selectedClassSchedule">
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn-submit" style="
                                        background: linear-gradient(45deg, #3b82f6, #1d4ed8);
                                        border: none;
                                        color: white;
                                        padding: 18px 40px;
                                        border-radius: 50px;
                                        font-size: 1.1rem;
                                        font-weight: 600;
                                        transition: all 0.3s ease;
                                        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
                                        min-width: 200px;
                                    ">
                                        🚀 Register Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Events Section -->
    <section id="events" class="events-section py-5" style="background: linear-gradient(135deg, #1e293b, #334155);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 style="
                        font-size: clamp(2rem, 4vw, 3rem);
                        font-weight: 700;
                        color: white;
                        margin-bottom: 1rem;
                    ">Upcoming Events</h2>
                    <p style="
                        font-size: 1.1rem;
                        color: #94a3b8;
                        max-width: 600px;
                        margin: 0 auto;
                    ">Join our exciting events and immerse yourself in German culture and language</p>
                </div>
            </div>
            <div class="row g-4">
                @forelse($events as $event)
                    @php
    $eventDate = \Carbon\Carbon::parse($event->event_date);
    $day = $eventDate->format('d');
    $month = $eventDate->format('M');
    $year = $eventDate->format('Y');
    $time = $event->event_time ? \Carbon\Carbon::parse($event->event_time)->format('H:i') : 'TBA';
    $registrationCount = $event->getRegistrationCount();
    $remainingSpots = $event->getRemainingSpots();
    $isFull = $event->isFull();
                    @endphp

                    <div class="col-lg-4 col-md-6">
                        <div class="event-card h-100" style="
                            background: rgba(255, 255, 255, 0.05);
                            backdrop-filter: blur(20px);
                            border-radius: 20px;
                            padding: 25px;
                            border: 1px solid rgba(255, 255, 255, 0.1);
                            transition: all 0.3s ease;
                            position: relative;
                            overflow: hidden;
                        ">
                            <div class="event-image mb-3" style="position: relative;">
                                <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/default-event.jpg') }}"
                                     alt="{{ $event->title }}" style="
                                    width: 100%;
                                    height: 200px;
                                    object-fit: cover;
                                    border-radius: 15px;
                                ">
                                <div class="event-date-badge" style="
                                    position: absolute;
                                    top: 15px;
                                    left: 15px;
                                    background: rgba(59, 130, 246, 0.9);
                                    backdrop-filter: blur(10px);
                                    color: white;
                                    padding: 10px 15px;
                                    border-radius: 10px;
                                    text-align: center;
                                    min-width: 70px;
                                ">
                                    <div style="font-size: 1.5rem; font-weight: 700; line-height: 1;">{{ $day }}</div>
                                    <div style="font-size: 0.75rem; opacity: 0.9;">{{ $month }}</div>
                                </div>
                                @if($isFull)
                                    <div style="
                                        position: absolute;
                                        top: 15px;
                                        right: 15px;
                                        background: #ef4444;
                                        color: white;
                                        padding: 5px 12px;
                                        border-radius: 15px;
                                        font-size: 0.75rem;
                                        font-weight: 600;
                                    ">FULL</div>
                                @endif
                            </div>

                            <div class="event-content">
                                <h4 style="color: white; font-weight: 600; margin-bottom: 15px; font-size: 1.25rem;">
                                    {{ $event->title }}
                                </h4>

                                <div class="event-details mb-3">
                                    <div style="display: flex; align-items: center; margin-bottom: 8px; color: #94a3b8;">
                                        <i class="fa fa-clock-o me-2"></i>
                                        <span>{{ $time }}</span>
                                    </div>
                                    <div style="display: flex; align-items: center; margin-bottom: 8px; color: #94a3b8;">
                                        <i class="fa fa-users me-2"></i>
                                        <span>{{ $registrationCount }}/{{ $event->capacity }} registered</span>
                                    </div>
                                </div>

                                <p style="color: #cbd5e1; line-height: 1.6; margin-bottom: 20px; font-size: 0.9rem;">
                                    {{ Str::limit($event->description ?? 'Join us for an exciting German learning experience!', 100) }}
                                </p>

                                <div class="event-footer d-flex justify-content-between align-items-center">
                                    <div class="event-tags">
                                        <span style="
                                            background: linear-gradient(45deg, #10b981, #059669);
                                            color: white;
                                            padding: 6px 12px;
                                            border-radius: 15px;
                                            font-size: 0.75rem;
                                            font-weight: 600;
                                        ">{{ ucfirst($event->tag ?? 'Event') }}</span>

                                        @if(!$isFull)
                                            <span style="
                                                background: rgba(34, 197, 94, 0.2);
                                                color: #22c55e;
                                                padding: 6px 12px;
                                                border-radius: 15px;
                                                font-size: 0.75rem;
                                                font-weight: 600;
                                                margin-left: 8px;
                                            ">{{ $remainingSpots }} spots left</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div style="
                            background: rgba(255, 255, 255, 0.05);
                            backdrop-filter: blur(20px);
                            border-radius: 20px;
                            padding: 60px 40px;
                            border: 1px solid rgba(255, 255, 255, 0.1);
                        ">
                            <div style="font-size: 3rem; margin-bottom: 20px;">📅</div>
                            <h4 style="color: white; margin-bottom: 15px;">No Upcoming Events</h4>
                            <p style="color: #94a3b8;">Check back soon for exciting new events and learning opportunities!</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Add SweetAlert2 for modern alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include Flatpickr CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Modern CSS -->
    <style>
        /* Modern animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Modern hover effects */
        .practice-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .btn-practice-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .event-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.1);
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
        }

        /* Modern form styling */
        .modern-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 90vh;
                padding: 80px 0;
            }

            .floating-card {
                margin-top: 40px;
                padding: 30px 20px;
            }

            .hero-buttons {
                text-align: center;
            }

            .btn-hero-primary, .btn-hero-secondary {
                display: block;
                width: 100%;
                max-width: 280px;
                margin: 0 auto 15px;
            }

            .registration-form {
                padding: 30px 20px;
            }

            .practice-card {
                margin-bottom: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .instructor-image img {
                width: 250px;
                height: 250px;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                min-height: 80vh;
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
            }

            .registration-form {
                border-radius: 15px;
                margin: 0 10px;
            }
        }

        /* Flatpickr styling */
        .flatpickr-day.available {
            background-color: #10b981 !important;
            color: white !important;
            border-radius: 8px;
        }

        .flatpickr-day.selected {
            background-color: #3b82f6 !important;
            color: white !important;
            border-radius: 8px;
        }

        #timeSlotButtons button {
            border: 2px solid #3b82f6;
            background-color: white;
            color: #3b82f6;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        #timeSlotButtons button.selected,
        #timeSlotButtons button:hover {
            background-color: #3b82f6;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        /* Loading spinner styles */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: 0.125em;
        }

        .btn-submit:disabled {
            opacity: 0.8;
            transform: none !important;
            cursor: not-allowed;
        }

        .btn-submit:disabled:hover {
            transform: none !important;
        }

        /* Custom spinner for SweetAlert */
        .swal2-loading {
            border-color: #3b82f6 !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.getElementById('typeSelect');
            const hangoutSection = document.getElementById('hangoutSection');
            const classBookingSection = document.getElementById('classBookingSection');
            const levelSelect = document.getElementById('classLevelSelect');
            const timeSlots = document.getElementById('timeSlots');
            const timeSlotButtons = document.getElementById('timeSlotButtons');
            const selectedClassSchedule = document.getElementById('selectedClassSchedule');

            let selectedLevel = null;
            let availableDates = [];
            let selectedDate = null;
            let calendarInstance = null;

            // Function to get fresh CSRF token
            function getCsrfToken() {
                return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                       document.querySelector('input[name="_token"]')?.value ||
                       '{{ csrf_token() }}';
            }

            // Function to refresh CSRF token (useful for long sessions)
            function refreshCsrfToken() {
                fetch('/refresh-csrf', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.csrf_token) {
                        document.querySelector('meta[name="csrf-token"]').setAttribute('content', data.csrf_token);
                        const tokenInput = document.querySelector('input[name="_token"]');
                        if (tokenInput) {
                            tokenInput.value = data.csrf_token;
                        }
                    }
                })
                .catch(err => console.warn('Could not refresh CSRF token:', err));
            }

            // Smooth scrolling for anchor links
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

            // Handle type selection
            typeSelect.addEventListener('change', function () {
                const type = this.value;
                hangoutSection.style.display = 'none';
                classBookingSection.style.display = 'none';
                timeSlots.style.display = 'none';

                if (type === 'Hangout') {
                    // Load events with proper formatting
                    fetch('/get-events', {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': getCsrfToken()
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            const hangoutSelect = document.getElementById('hangoutSelect');
                            hangoutSelect.innerHTML = '<option value="">Select Event</option>';

                            if (data.length === 0) {
                                hangoutSelect.innerHTML = '<option value="" disabled>No events available</option>';
                            } else {
                                data.forEach(event => {
                                    const displayText = `${event.title} - ${event.date} Time ${event.time} (${event.remaining_spots} spots left)`;
                                    hangoutSelect.innerHTML += `<option value="${event.id}">${displayText}</option>`;
                                });
                            }
                            hangoutSection.style.display = 'block';
                        })
                        .catch(err => {
                            console.error('Error loading events:', err);
                            const hangoutSelect = document.getElementById('hangoutSelect');
                            hangoutSelect.innerHTML = '<option value="" disabled>Error loading events</option>';
                            hangoutSection.style.display = 'block';
                        });
                } else if (type === 'Classes') {
                    loadLevels();
                    classBookingSection.style.display = 'block';
                }
            });

            // Load levels dynamically
            function loadLevels() {
                fetch('/get-class-levels', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                })
                    .then(res => res.json())
                    .then(levels => {
                        levelSelect.innerHTML = '<option value="">Select Level (A1–B2)</option>';
                        levels.forEach(level => {
                            levelSelect.innerHTML += `<option value="${level}">${level}</option>`;
                        });
                    });
            }

            // When level changes, load available class dates
            levelSelect.addEventListener('change', function () {
                selectedLevel = this.value;
                if (!selectedLevel) return;

                timeSlots.style.display = 'none';

                fetch(`/get-class-dates/${selectedLevel}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                })
                    .then(res => res.json())
                    .then(dates => {
                        availableDates = dates;
                        renderFlatpickrCalendar(availableDates);
                    });
            });

            // Initialize Flatpickr dynamically
            function renderFlatpickrCalendar(dates) {
                const calendarContainer = document.getElementById('calendar');
                calendarContainer.innerHTML = '<input type="text" id="calendarInput" class="form-control modern-input" placeholder="Select Date" style="border-radius: 15px; border: 2px solid #e2e8f0; padding: 15px;">';

                // Destroy existing Flatpickr instance before re-rendering
                if (calendarInstance) {
                    calendarInstance.destroy();
                }

                calendarInstance = flatpickr("#calendarInput", {
                    dateFormat: "Y-m-d",
                    minDate: "today",

                    enable: availableDates.map(date => {
                        const parts = date.split('-');
                        return {
                            from: new Date(parts[0], parts[1] - 1, parts[2]),
                            to: new Date(parts[0], parts[1] - 1, parts[2])
                        };
                    }),

                    onChange: function (selectedDates, dateStr) {
                        selectedDate = dateStr;
                        loadTimeSlots(selectedLevel, selectedDate);
                    },

                    onDayCreate: function (dObj, dStr, fp, dayElem) {
                        const date = dayElem.dateObj;
                        const y = date.getFullYear();
                        const m = String(date.getMonth() + 1).padStart(2, '0');
                        const d = String(date.getDate()).padStart(2, '0');
                        const localDateStr = `${y}-${m}-${d}`;

                        if (availableDates.includes(localDateStr)) {
                            dayElem.classList.add('available');
                        }
                    }
                });
            }

            // Load available time slots for selected date
            function loadTimeSlots(level, date) {
                fetch(`/get-class-times/${level}/${date}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                })
                    .then(res => res.json())
                    .then(times => showTimeSlots(times));
            }

            // Render time slots
            function showTimeSlots(times) {
                timeSlots.style.display = 'block';
                timeSlotButtons.innerHTML = '';

                if (times.length === 0) {
                    timeSlotButtons.innerHTML = '<p style="color: #64748b;">No available time slots for this date.</p>';
                    return;
                }

                times.forEach(t => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.textContent = t.time;
                    btn.onclick = () => {
                        selectedClassSchedule.value = t.id;
                        document.querySelectorAll('#timeSlotButtons button').forEach(b => b.classList.remove('selected'));
                        btn.classList.add('selected');
                    };
                    timeSlotButtons.appendChild(btn);
                });
            }

            // Submit form
            document.getElementById('register_form').addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const type = document.getElementById('typeSelect').value;
                const submitButton = this.querySelector('.btn-submit');

                // Clean up other fields depending on type
                if (type === 'Hangout') {
                    const hangoutId = document.getElementById('hangoutSelect').value;
                    formData.set('type', 'Hangout');
                    formData.set('hangout_id', hangoutId);
                    formData.delete('class_schedule_id');
                } else if (type === 'Classes') {
                    const classScheduleId = document.getElementById('selectedClassSchedule').value;
                    formData.set('type', 'Classes');
                    formData.set('class_schedule_id', classScheduleId);
                    formData.delete('hangout_id');
                }

                // Basic validation before sending
                if (!formData.get('type')) {
                    Swal.fire({
                        title: 'Please Select Learning Type',
                        text: 'Choose between Events & Hangouts or Structured Classes.',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                    });
                    return;
                }

                if (type === 'Hangout') {
                    const hangoutId = document.getElementById('hangoutSelect').value;
                    if (!hangoutId) {
                        Swal.fire({
                            title: 'Event Selection Required',
                            text: 'Please choose an event before submitting.',
                            icon: 'warning',
                            confirmButtonText: 'OK',
                        });
                        return;
                    }
                }

                if (type === 'Classes') {
                    const classScheduleId = document.getElementById('selectedClassSchedule').value;
                    if (!classScheduleId) {
                        Swal.fire({
                            title: 'Schedule Required',
                            text: 'Please select a class date and time slot.',
                            icon: 'warning',
                            confirmButtonText: 'OK',
                        });
                        return;
                    }
                }

                // Show loading state
                const originalButtonText = submitButton.innerHTML;
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></div>
                        Registering...
                    </div>
                `;

                // Show loading SweetAlert
                Swal.fire({
                    title: 'Processing Registration',
                    html: '<div class="text-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div><p class="mt-3">Please wait while we register you...</p></div>',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch('/register-user', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'Accept': 'application/json'
                    }
                })
                .then(async response => {
                    console.log('Response status:', response.status);
                    console.log('Response headers:', response.headers);

                    const data = await response.json();
                    console.log('Response data:', data);

                    // Close loading alert and restore button
                    Swal.close();
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;

                    if (response.ok && data.success) {
                        Swal.fire({
                            title: '🎉 Registration Successful!',
                            text: data.message || 'You have successfully registered.',
                            icon: 'success',
                            confirmButtonText: 'Awesome!',
                            confirmButtonColor: '#10b981',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });

                        this.reset();
                        hangoutSection.style.display = 'none';
                        classBookingSection.style.display = 'none';
                        timeSlots.style.display = 'none';
                    } else {
                        // Check for CSRF token mismatch
                        if (response.status === 419 || (data.message && data.message.includes('CSRF'))) {
                            Swal.fire({
                                title: 'Session Expired',
                                text: 'Your session has expired. Please refresh the page and try again.',
                                icon: 'warning',
                                confirmButtonText: 'Refresh Page',
                                confirmButtonColor: '#3085d6',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            // More detailed error logging
                            console.error('Registration failed:', data);
                            Swal.fire({
                                title: 'Registration Failed',
                                text: data.message || 'Something went wrong. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                })
                .catch(err => {
                    console.error('Network Error:', err);

                    // Close loading alert and restore button
                    Swal.close();
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;

                    Swal.fire({
                        title: 'Network Error',
                        text: 'Unable to connect to server. Please check your internet connection.',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    });
                });
            });

            // Handle event registration buttons
            document.querySelectorAll('.register-event-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const eventTitle = this.dataset.eventTitle;
                    const eventDate = this.dataset.eventDate;
                    const eventTime = this.dataset.eventTime;

                    // Scroll to registration form
                    document.querySelector('.register').scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Pre-select Hangout type and show relevant section
                    const typeSelect = document.getElementById('typeSelect');
                    typeSelect.value = 'Hangout';
                    typeSelect.dispatchEvent(new Event('change'));

                    // Show info about the event
                    setTimeout(() => {
                        Swal.fire({
                            title: `Register for ${eventTitle}`,
                            html: `
                                <div class="text-start">
                                    <p><strong>📅 Date:</strong> ${eventDate}</p>
                                    <p><strong>🕐 Time:</strong> ${eventTime}</p>
                                    <p class="mt-3">Please complete the registration form below to join this event.</p>
                                </div>
                            `,
                            icon: 'info',
                            confirmButtonText: 'Got it!',
                            confirmButtonColor: '#3085d6'
                        });
                    }, 500);
                });
            });
        });
    </script>

    <!-- Footer -->
    @include('layouts.footer')
</div>
