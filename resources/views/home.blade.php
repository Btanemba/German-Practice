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
                                    <div class="top_bar_lang" style="position: relative; z-index: 1000;">
                                        <span class="top_bar_title"
                                            style="font-size: 12px; margin-right: 8px;">{{ __('messages.site_language') }}</span>
                                        <ul class="lang_list" style="list-style: none; margin: 0; padding: 0;">
                                            <li class="hassubs" style="position: relative; display: inline-block;">
                                                <a href="#" style="
                                                    display: flex;
                                                    align-items: center;
                                                    gap: 5px;
                                                    text-decoration: none;
                                                    color: #3b82f6;
                                                    cursor: pointer;
                                                    background: rgba(59, 130, 246, 0.1);
                                                    padding: 6px 12px;
                                                    border-radius: 15px;
                                                    font-weight: 500;
                                                    font-size: 12px;
                                                    transition: all 0.3s ease;
                                                ">
                                                    {{ App::getLocale() == 'en' ? 'EN' : 'DE' }}
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
                                                <ul style="
                                                    position: absolute;
                                                    top: 100%;
                                                    right: 0;
                                                    background: white;
                                                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                                                    border-radius: 8px;
                                                    padding: 8px 0;
                                                    min-width: 120px;
                                                    opacity: 0;
                                                    visibility: hidden;
                                                    transform: translateY(-10px);
                                                    transition: all 0.3s ease;
                                                    z-index: 1001;
                                                    list-style: none;
                                                    margin: 0;
                                                " onmouseenter="this.style.opacity='1'; this.style.visibility='visible'; this.style.transform='translateY(0)';"
                                                    onmouseleave="this.style.opacity='0'; this.style.visibility='hidden'; this.style.transform='translateY(-10px)';">
                                                    <li><a href="{{ route('language.switch', 'en') }}"
                                                            class="language-switch {{ App::getLocale() == 'en' ? 'active' : '' }}"
                                                            style="
                                                        display: block;
                                                        padding: 10px 16px;
                                                        color: #333;
                                                        text-decoration: none;
                                                        transition: all 0.3s ease;
                                                        font-size: 13px;
                                                        {{ App::getLocale() == 'en' ? 'font-weight: bold; color: #3b82f6; background: rgba(59, 130, 246, 0.1);' : '' }}
                                                    " onmouseover="this.style.background='#f8f9fa'; this.style.color='#3b82f6';"
                                                            onmouseout="this.style.background='{{ App::getLocale() == 'en' ? 'rgba(59, 130, 246, 0.1)' : 'transparent' }}'; this.style.color='{{ App::getLocale() == 'en' ? '#3b82f6' : '#333' }}';">🇺🇸
                                                            English</a></li>
                                                    <li><a href="{{ route('language.switch', 'de') }}"
                                                            class="language-switch {{ App::getLocale() == 'de' ? 'active' : '' }}"
                                                            style="
                                                        display: block;
                                                        padding: 10px 16px;
                                                        color: #333;
                                                        text-decoration: none;
                                                        transition: all 0.3s ease;
                                                        font-size: 13px;
                                                        {{ App::getLocale() == 'de' ? 'font-weight: bold; color: #3b82f6; background: rgba(59, 130, 246, 0.1);' : '' }}
                                                    " onmouseover="this.style.background='#f8f9fa'; this.style.color='#3b82f6';"
                                                            onmouseout="this.style.background='{{ App::getLocale() == 'de' ? 'rgba(59, 130, 246, 0.1)' : 'transparent' }}'; this.style.color='{{ App::getLocale() == 'de' ? '#3b82f6' : '#333' }}';">🇩🇪
                                                            Deutsch</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <script>
                                        // JavaScript to handle dropdown on mobile
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const langDropdown = document.querySelector('.top_bar_lang .hassubs');
                                            const dropdownMenu = langDropdown.querySelector('ul');
                                            const dropdownToggle = langDropdown.querySelector('a');

                                            // Handle click for mobile
                                            dropdownToggle.addEventListener('click', function (e) {
                                                e.preventDefault();
                                                const isVisible = dropdownMenu.style.opacity === '1';
                                                if (isVisible) {
                                                    dropdownMenu.style.opacity = '0';
                                                    dropdownMenu.style.visibility = 'hidden';
                                                    dropdownMenu.style.transform = 'translateY(-10px)';
                                                } else {
                                                    dropdownMenu.style.opacity = '1';
                                                    dropdownMenu.style.visibility = 'visible';
                                                    dropdownMenu.style.transform = 'translateY(0)';
                                                }
                                            });

                                            // Handle hover for desktop
                                            langDropdown.addEventListener('mouseenter', function () {
                                                dropdownMenu.style.opacity = '1';
                                                dropdownMenu.style.visibility = 'visible';
                                                dropdownMenu.style.transform = 'translateY(0)';
                                            });

                                            langDropdown.addEventListener('mouseleave', function () {
                                                dropdownMenu.style.opacity = '0';
                                                dropdownMenu.style.visibility = 'hidden';
                                                dropdownMenu.style.transform = 'translateY(-10px)';
                                            });

                                            // Close dropdown when clicking outside
                                            document.addEventListener('click', function (e) {
                                                if (!langDropdown.contains(e.target)) {
                                                    dropdownMenu.style.opacity = '0';
                                                    dropdownMenu.style.visibility = 'hidden';
                                                    dropdownMenu.style.transform = 'translateY(-10px)';
                                                }
                                            });
                                        });
                                    </script>

                                    <!-- Social -->
                                    <!--<div class="top_bar_social">-->
                                    <!--    <span class="top_bar_title social_title">{{ __('messages.follow_us') }}</span>-->
                                    <!--    <ul>-->
                                    <!--        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
                                    <!--        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
                                    <!--        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
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
                                                                height: 70px;
                                                                width: auto;
                                                                max-width: 200px;
                                                            ">
                                </a>
                            </div>
                            <nav class="main_nav_contaner">
                                <ul class="main_nav">
                                    <li class="active"><a href="">{{ __('messages.home') }}</a></li>
                                    <li><a href="#events">{{ __('messages.events') }}</a></li>
                                    <li><a href="javascript:void(0);"
                                            class="contactUsBtn">{{ __('messages.contact') }}</a></li>

                                </ul>
                            </nav>
                            <div class="header_content_right ml-auto text-right">
                                <div class="user">
                                    <a href="{{ backpack_url('login') }}" target="_blank"
                                        title="{{ __('messages.admin_login') }}" style="
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
        padding-top: 20px;
        margin-top: 0;
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
                            {{ __('messages.hero_subtitle') }}
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
                                {{ __('messages.start_learning') }}
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
                                {{ __('messages.view_events') }}
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
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">50+</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">{{ __('messages.students') }}</div>
                                </div>
                                <div class="stat-item text-center">
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">500+</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">{{ __('messages.classes') }}</div>
                                </div>
                                <div class="stat-item text-center">
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">95%</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">{{ __('messages.success_rate') }}
                                    </div>
                                </div>
                                <div class="stat-item text-center">
                                    <div style="font-size: 2.5rem; font-weight: 700; color: #10b981;">A1-C2</div>
                                    <div style="color: rgba(255, 255, 255, 0.8);">{{ __('messages.all_levels') }}</div>
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
                    ">{{ __('messages.latest_practice_materials') }}</h2>
                    <p class="section-subtitle" style="
                        font-size: 1.1rem;
                        color: #64748b;
                        max-width: 600px;
                        margin: 0 auto;
                    ">{{ __('messages.practice_materials_subtitle') }}</p>

                    <!-- Christmas Sale Banner -->
                    <!--<div style="-->
                    <!--    background: linear-gradient(135deg, #dc2626, #b91c1c);-->
                    <!--    color: white;-->
                    <!--    padding: 20px 40px;-->
                    <!--    border-radius: 15px;-->
                    <!--    margin: 30px auto;-->
                    <!--    max-width: 600px;-->
                    <!--    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.3);-->
                    <!--    border: 3px solid #fef2f2;-->
                    <!--    position: relative;-->
                    <!--    overflow: hidden;-->
                    <!--">-->
                    <!--    <div style="-->
                    <!--        position: absolute;-->
                    <!--        top: -20px;-->
                    <!--        right: -20px;-->
                    <!--        font-size: 100px;-->
                    <!--        opacity: 0.1;-->
                    <!--    ">🎄</div>-->
                    <!--    <div style="text-align: center; position: relative; z-index: 1;">-->
                    <!--        <div style="font-size: 2rem; margin-bottom: 10px;">🎅 🎄 ⛄</div>-->
                    <!--        <h3 style="font-weight: 700; margin-bottom: 10px; font-size: 1.8rem;">Christmas Special Offer!</h3>-->
                    <!--        <p style="font-size: 1.3rem; font-weight: 600; margin-bottom: 5px;">-->
                    <!--            <span style="-->
                    <!--                background: white;-->
                    <!--                color: #dc2626;-->
                    <!--                padding: 5px 15px;-->
                    <!--                border-radius: 25px;-->
                    <!--                font-size: 1.5rem;-->
                    <!--            ">30% OFF</span>-->
                    <!--        </p>-->
                    <!--        <p style="font-size: 0.95rem; opacity: 0.9; margin-top: 10px;">All Practice Materials - Limited Time Only!</p>-->
                    <!--    </div>-->
                    <!--</div>-->
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

                        // Calculate Christmas sale price (30% off)
                        $originalPrice = $material->cost;
                        // $discountedPrice = $originalPrice > 0 ? $originalPrice * 0.7 : 0;
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
                            <!-- Christmas Sale Badge -->
                            <!--@if($originalPrice > 0)-->
                            <!--    <div style="-->
                            <!--        position: absolute;-->
                            <!--        top: 15px;-->
                            <!--        right: 15px;-->
                            <!--        background: linear-gradient(135deg, #dc2626, #b91c1c);-->
                            <!--        color: white;-->
                            <!--        padding: 8px 15px;-->
                            <!--        border-radius: 10px;-->
                            <!--        font-weight: 700;-->
                            <!--        font-size: 0.9rem;-->
                            <!--        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);-->
                            <!--        z-index: 10;-->
                            <!--        border: 2px solid white;-->
                            <!--    ">-->
                            <!--        🎄 -30%-->
                            <!--    </div>-->
                            <!--@endif-->

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
                                    @if($originalPrice > 0)
                                                                        <!-- Show original price strikethrough and discounted price -->
                                                                        <div style="display: flex; flex-direction: column; gap: 5px;">
                                                                            <span style="
                                                                                        color: #94a3b8;
                                                                                        font-size: 0.8rem;

                                                                                        font-weight: 500;
                                                                                    ">€{{ number_format($originalPrice, 2) }}</span>
                                                                            {{--
                                                                            <span style="
                                            background: linear-gradient(45deg, #dc2626, #b91c1c);
                                            color: white;
                                            padding: 8px 16px;
                                            border-radius: 20px;
                                            font-size: 1rem;
                                            font-weight: 700;
                                        ">€{{ number_format($discountedPrice, 2) }}</span>
                                                                            --}}
                                                                        </div>
                                    @else
                                        <span style="
                                                    background: linear-gradient(45deg, #10b981, #059669);
                                                    color: white;
                                                    padding: 8px 16px;
                                                    border-radius: 20px;
                                                    font-size: 0.875rem;
                                                    font-weight: 600;
                                                ">{{ $material->formatted_cost }}</span>
                                    @endif
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
                                        {{ __('messages.get_material') }}
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
                            <h4 style="color: #1e293b; margin-bottom: 15px;">{{ __('messages.no_practice_materials') }}</h4>
                            <p style="color: #64748b;">{{ __('messages.check_back_materials') }}</p>
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
                        ">{{ __('messages.favourite_tutor') }}</h2>
                        <div class="instructor-card" style="
                            background: rgba(255, 255, 255, 0.1);
                            backdrop-filter: blur(20px);
                            border-radius: 20px;
                            padding: 30px;
                            border: 1px solid rgba(255, 255, 255, 0.2);
                        ">
                            <h4 style="color: #10b981; font-weight: 600; margin-bottom: 10px;">Tamara Terbul</h4>
                            <p style="color: #94a3b8; margin-bottom: 15px; font-weight: 500;">
                                {{ __('messages.german_expert') }}</p>
                            <p style="color: rgba(255, 255, 255, 0.9); line-height: 1.6; margin-bottom: 20px;">
                                {{ __('messages.instructor_description') }}
                            </p>
                            <div class="social-links">

                                <a href="https://www.linkedin.com/in/tamara-terbul-411b5493/" target="_blank" style="
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
                                "><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="instructor-image" style="position: relative;">
                        <img src="images/wifey.jpg" alt="Tamara Terbul" style="
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
                        ">{{ __('messages.years_experience') }}</div>
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
                    ">{{ __('messages.join_community') }}</h2>
                    <p style="
                        font-size: 1.1rem;
                        color: #64748b;
                        max-width: 600px;
                        margin: 0 auto;
                    ">{{ __('messages.registration_subtitle') }}</p>
                </div>
            </div>

            <div class="row g-3">
                <!-- Events Registration Form -->
                <div class="col-lg-6" style="display: flex;">
                    <div class="registration-form" id="eventsFormWrapper" style="
                        background: white;
                        border-radius: 25px;
                        padding: 15px;
                        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
                        border: 1px solid rgba(226, 232, 240, 0.8);
                        transition: all 0.3s ease;
                        width: 100%;
                        min-height: auto;
                    ">
                        <!-- Collapsible Header -->
                        <div id="eventsToggleBtn" class="form-header text-center"
                            style="cursor: pointer; user-select: none; transition: all 0.3s ease; margin: 0;"
                            onmouseover="this.style.opacity='0.8';" onmouseout="this.style.opacity='1';">
                            <div style="font-size: 3rem; margin-bottom: 10px;">🎉</div>
                            <h3 style="color: #1e293b; font-weight: 600; margin-bottom: 8px; margin-top: 0;">
                                {{ __('messages.events_hangouts') }}</h3>
                            <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 10px; margin-top: 5px;">{{ __('messages.events_description') }}</p>
                            <div style="font-size: 1.2rem; color: #3b82f6; margin-top: 8px; transition: transform 0.3s ease;"
                                id="eventsToggleIcon">▼</div>
                        </div>

                        <!-- Form Container (Hidden by default) -->
                        <div id="eventsFormContainer"
                            style="display: none; max-height: 0; overflow: hidden; transition: max-height 0.3s ease; margin-top: 20px;">
                            <form id="event_register_form" method="POST" action="/register-user">
                                @csrf
                                <input type="hidden" name="type" value="Hangout">

                                <div class="row g-3">
                                    <!-- Event Selection -->
                                    <div class="col-12">
                                        <label
                                            style="color: #374151; font-weight: 500; margin-bottom: 10px; display: block; font-size: 0.95rem;">
                                            {{ __('messages.select_event') }}
                                        </label>
                                        <select name="hangout_id" id="eventHangoutSelect"
                                            class="form-select modern-input" required style="
                                        border-radius: 15px;
                                        border: 2px solid #e2e8f0;
                                        padding: 15px;
                                        font-size: 1rem;
                                        width: 100%;
                                    ">
                                            <option value="">{{ __('messages.loading_events') }}</option>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <label style="color: #64748b;">{{ __('messages.first_name') }}</label>
                                            <input type="text" name="first_name" class="form-control modern-input"
                                                placeholder="{{ __('messages.first_name') }}" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <label style="color: #64748b;">{{ __('messages.last_name') }}</label>
                                            <input type="text" name="last_name" class="form-control modern-input"
                                                placeholder="{{ __('messages.last_name') }}" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <label style="color: #64748b;">{{ __('messages.email_address') }}</label>
                                            <input type="email" name="email" class="form-control modern-input"
                                                placeholder="{{ __('messages.email_address') }}" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <label style="color: #64748b;">{{ __('messages.phone_number') }}</label>
                                            <input type="tel" name="phone" class="form-control modern-input"
                                                placeholder="{{ __('messages.phone_number') }}" style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <label style="color: #64748b;">{{ __('messages.city') }}</label>
                                            <input type="text" name="city" class="form-control modern-input"
                                                placeholder="{{ __('messages.city') }}" style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>

                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn-submit" style="
                                        background: linear-gradient(45deg, #f59e0b, #d97706);
                                        border: none;
                                        color: white;
                                        padding: 18px 40px;
                                        border-radius: 50px;
                                        font-size: 1.1rem;
                                        font-weight: 600;
                                        transition: all 0.3s ease;
                                        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
                                        width: 100%;
                                    ">
                                            🎉 {{ __('messages.register_for_event') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Classes Registration Form -->
                <div class="col-lg-6" style="display: flex;">
                    <div class="registration-form" id="classesFormWrapper" style="
                        background: white;
                        border-radius: 25px;
                        padding: 15px;
                        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
                        border: 1px solid rgba(226, 232, 240, 0.8);
                        transition: all 0.3s ease;
                        width: 100%;
                        min-height: auto;
                    ">
                        <!-- Collapsible Header -->
                        <div id="classesToggleBtn" class="form-header text-center"
                            style="cursor: pointer; user-select: none; transition: all 0.3s ease; margin: 0;"
                            onmouseover="this.style.opacity='0.8';" onmouseout="this.style.opacity='1';">
                            <div style="font-size: 3rem; margin-bottom: 10px;">📚</div>
                            <h3 style="color: #1e293b; font-weight: 600; margin-bottom: 8px; margin-top: 0;">
                                {{ __('messages.structured_classes') }}</h3>
                            <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 10px; margin-top: 5px;">{{ __('messages.classes_description') }}</p>
                            <div style="font-size: 1.2rem; color: #3b82f6; margin-top: 8px; transition: transform 0.3s ease;"
                                id="classesToggleIcon">▼</div>
                        </div>

                        <!-- Form Container (Hidden by default) -->
                        <div id="classesFormContainer"
                            style="display: none; max-height: 0; overflow: hidden; transition: max-height 0.3s ease; margin-top: 20px;">
                            <form id="class_register_form" method="POST" action="/register-user">
                                @csrf
                                <input type="hidden" name="type" value="Classes">

                                <div class="row g-3">

                                    <!-- Class Booking Section -->
                                    <div class="col-12">
                                        <div class="class-booking-container mt-2 p-3" style="
                                        background: #f8fafc;
                                        border-radius: 20px;
                                        border: 2px solid #e2e8f0;
                                    ">
                                            <div class="mb-3">
                                                <label for="classLevelSelect"
                                                    style="color: #374151; font-weight: 500; margin-bottom: 10px; display: block;">
                                                    {{ __('messages.choose_level') }}
                                                </label>
                                                <select id="classLevelSelect" class="form-select modern-input" style="
                                                border-radius: 15px;
                                                border: 2px solid #e2e8f0;
                                                padding: 15px;
                                            ">
                                                    <option value="">{{ __('messages.select_level') }}</option>
                                                </select>
                                            </div>

                                            <div id="calendar" class="mb-3"></div>
                                            <div class="legend text-center mb-3">
                                                <span
                                                    class="badge bg-success me-2">{{ __('messages.available') }}</span>
                                                <span
                                                    class="badge bg-warning text-dark">{{ __('messages.unavailable') }}</span>
                                            </div>

                                            <div id="timeSlots" style="display:none;">
                                                <h6
                                                    style="color: #374151; font-weight: 500; margin-bottom: 15px; font-size: 0.9rem;">
                                                    {{ __('messages.available_time_slots') }}</h6>
                                                <div id="timeSlotButtons" class="d-flex flex-wrap gap-2"></div>
                                            </div>

                                            <input type="hidden" name="class_schedule_id" id="selectedClassSchedule">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <label style="color: #64748b;">{{ __('messages.first_name') }}</label>
                                            <input type="text" name="first_name" class="form-control modern-input"
                                                placeholder="{{ __('messages.first_name') }}" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                             <label style="color: #64748b;">{{ __('messages.last_name') }}</label>
                                            <input type="text" name="last_name" class="form-control modern-input"
                                                placeholder="{{ __('messages.last_name') }}" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                             <label style="color: #64748b;">{{ __('messages.email_address') }}</label>
                                            <input type="email" name="email" class="form-control modern-input"
                                                placeholder="{{ __('messages.email_address') }}" required style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                             <label style="color: #64748b;">{{ __('messages.phone_number') }}</label>
                                            <input type="tel" name="phone" class="form-control modern-input"
                                                placeholder="{{ __('messages.phone_number') }}" style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                             <label style="color: #64748b;">{{ __('messages.city') }}</label>
                                            <input type="text" name="city" class="form-control modern-input"
                                                placeholder="{{ __('messages.city') }}" style="
                                            border-radius: 15px;
                                            border: 2px solid #e2e8f0;
                                            padding: 20px 15px;
                                            font-size: 1rem;
                                            transition: all 0.3s ease;
                                        ">

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
                                        width: 100%;
                                    ">
                                            📚 {{ __('messages.register_for_class') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                    ">{{ __('messages.upcoming_events') }}</h2>
                    <p style="
                        font-size: 1.1rem;
                        color: #94a3b8;
                        max-width: 600px;
                        margin: 0 auto;
                    ">{{ __('messages.events_subtitle') }}</p>
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

                                // Build Google Maps URL for the event location (if present)
                                $mapUrl = $event->location ? 'https://www.google.com/maps/search/?api=1&query=' . urlencode($event->location) : null;
                            @endphp

                            <div class="col-lg-4 col-md-6">
                                <a href="{{ url('/#register') }}" class="text-decoration-none">
                                    <div class="event-card h-100" style="
                        background: rgba(255, 255, 255, 0.05);
                        backdrop-filter: blur(20px);
                        border-radius: 20px;
                        padding: 25px;
                        border: 1px solid rgba(255, 255, 255, 0.1);
                        transition: all 0.3s ease;
                        position: relative;
                        overflow: hidden;
                        cursor: pointer;
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
                                                ">{{ __('messages.full') }}</div>
                                            @endif
                                        </div>

                                        <div class="event-content">
                                            <h4 style="color: white; font-weight: 600; margin-bottom: 15px; font-size: 1.25rem;">
                                                {{ $event->title }}
                                            </h4>

                                            <div class="event-details mb-3">
                                                <div
                                                    style="display: flex; align-items: center; margin-bottom: 8px; color: #94a3b8;">
                                                    <i class="fa fa-clock-o me-2"></i>
                                                    <span>{{ $time }}</span>
                                                </div>
                                                <div
                                                    style="display: flex; align-items: center; margin-bottom: 8px; color: #94a3b8;">
                                                    <i class="fa fa-users me-2"></i>
                                                    <span>{{ $registrationCount }}/{{ $event->capacity }}
                                                        {{ __('messages.registered') }}</span>
                                                </div>

                                                {{-- Location placed under the registered line for better mobile layout --}}
                                                @if($mapUrl)
                                                    <div class="event-location" style="margin-top:8px;">
                                                        <a class="event-map-link" href="{{ $mapUrl }}" target="_blank" rel="noopener"
                                                            onclick="event.stopPropagation();" title="{{ $event->location }}">
                                                            <i class="fa fa-map-marker" aria-hidden="true"
                                                                style="font-size:0.95rem;"></i>
                                                            <span class="event-location-text">{{ $event->location }}</span>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- Restore event description with read-more --}}
                                            @if($event->description)
                                                <div class="event-description mb-3">
                                                    <p class="event-desc-short" style="color: #cbd5e1; margin-bottom:0;">
                                                        {{ Str::limit($event->description, 180) }}
                                                    </p>

                                                    <p class="event-desc-full" style="display:none; color: #cbd5e1; margin-top:0;">
                                                        {!! nl2br(e($event->description)) !!}
                                                    </p>

                                                    @if(Str::length($event->description) > 180)
                                                        <a href="#" class="read-more-btn" aria-expanded="false"
                                                            style="color:#60a5fa; display:inline-block; margin-top:8px;">
                                                            {{ __('messages.read_more') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="event-footer d-flex justify-content-between align-items-center">
                                                <div class="event-tags"
                                                    style="display:flex; gap:8px; align-items:center; flex:1; min-width:0;">
                                                    <span style="
                                        background: linear-gradient(45deg, #10b981, #059669);
                                        color: white;
                                        padding: 6px 12px;
                                        border-radius: 15px;
                                        font-size: 0.75rem;
                                        font-weight: 600;
                                        white-space:nowrap;
                                        overflow:hidden;
                                        text-overflow:ellipsis;
                                    ">{{ ucfirst($event->tag ?? 'Event') }}</span>

                                                    @if(!$isFull)
                                                                    <span style="
                                                            background: rgba(34, 197, 94, 0.12);
                                                            color: #22c55e;
                                                            padding: 6px 12px;
                                                            border-radius: 15px;
                                                            font-size: 0.75rem;
                                                            font-weight: 600;
                                                            margin-left: 8px;
                                                            white-space:nowrap;
                                                        ">{{ $remainingSpots }} {{ __('messages.spots_left') }}</span>
                                                    @endif
                                                </div>

                                                {{-- keep footer compact; location moved above --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
                            <h4 style="color: white; margin-bottom: 15px;">{{ __('messages.no_upcoming_events') }}</h4>
                            <p style="color: #94a3b8;">{{ __('messages.check_back_events') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Modern Classes Section -->
    <section id="classes" class="classes-section py-5" style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 style="
                        font-size: clamp(2rem, 4vw, 3rem);
                        font-weight: 700;
                        color: #1e293b;
                        margin-bottom: 1rem;
                    ">{{ __('messages.upcoming_classes') ?? 'Upcoming Classes' }}</h2>
                    <p style="
                        font-size: 1.1rem;
                        color: #64748b;
                        max-width: 600px;
                        margin: 0 auto;
                    ">{{ __('messages.classes_subtitle') ?? 'Book your spot in our structured German classes' }}</p>
                </div>
            </div>
            <div class="row g-4">
                @forelse($classSchedules as $class)
                    @php
                        // Level-based color schemes
                        $levelColors = [
                            'A1' => ['bg' => 'rgba(34, 197, 94, 0.05)', 'border' => 'rgba(34, 197, 94, 0.2)', 'badge' => '#10b981', 'icon' => '🌱'],
                            'A2' => ['bg' => 'rgba(59, 130, 246, 0.05)', 'border' => 'rgba(59, 130, 246, 0.2)', 'badge' => '#3b82f6', 'icon' => '📘'],
                            'B1' => ['bg' => 'rgba(245, 158, 11, 0.05)', 'border' => 'rgba(245, 158, 11, 0.2)', 'badge' => '#f59e0b', 'icon' => '📙'],
                            'B2' => ['bg' => 'rgba(239, 68, 68, 0.05)', 'border' => 'rgba(239, 68, 68, 0.2)', 'badge' => '#ef4444', 'icon' => '📕'],
                            'C1' => ['bg' => 'rgba(168, 85, 247, 0.05)', 'border' => 'rgba(168, 85, 247, 0.2)', 'badge' => '#a855f7', 'icon' => '📗'],
                            'C2' => ['bg' => 'rgba(236, 72, 153, 0.05)', 'border' => 'rgba(236, 72, 153, 0.2)', 'badge' => '#ec4899', 'icon' => '📓'],
                        ];
                        $colorScheme = $levelColors[$class->level] ?? ['bg' => 'rgba(100, 116, 139, 0.05)', 'border' => 'rgba(100, 116, 139, 0.2)', 'badge' => '#64748b', 'icon' => '📚'];
                        $classDate = \Carbon\Carbon::parse($class->date);
                        $startTime = \Carbon\Carbon::parse($class->start_time)->format('H:i');
                        $endTime = \Carbon\Carbon::parse($class->end_time)->format('H:i');
                    @endphp

                    <div class="col-lg-4 col-md-6">
                        <a href="{{ url('/#register') }}" class="text-decoration-none">
                            <div class="class-card h-100" style="
                                    background: white;
                                    border-radius: 20px;
                                    padding: 0;
                                    border: 2px solid {{ $colorScheme['border'] }};
                                    transition: all 0.3s ease;
                                    position: relative;
                                    overflow: hidden;
                                    cursor: pointer;
                                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                                ">
                                <!-- Class Image (if available) -->
                                @if($class->image)
                                    <div style="
                                                width: 100%;
                                                height: 180px;
                                                background: url('{{ asset('storage/' . $class->image) }}') center/cover;
                                                border-radius: 18px 18px 0 0;
                                            "></div>
                                @else
                                    <div style="
                                                width: 100%;
                                                height: 180px;
                                                background: linear-gradient(135deg, {{ $colorScheme['badge'] }}22, {{ $colorScheme['badge'] }}44);
                                                border-radius: 18px 18px 0 0;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                font-size: 4rem;
                                            ">{{ $colorScheme['icon'] }}</div>
                                @endif

                                <!-- Level Badge -->
                                <div style="
                                        position: absolute;
                                        top: 15px;
                                        right: 15px;
                                        background: {{ $colorScheme['badge'] }};
                                        color: white;
                                        padding: 8px 16px;
                                        border-radius: 50px;
                                        font-weight: 700;
                                        font-size: 0.9rem;
                                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
                                    ">
                                    {{ $class->level }}
                                </div>

                                <!-- Content Padding -->
                                <div style="padding: 25px;">
                                    <!-- Topic and Title -->
                                    <div class="mb-4">
                                        @if($class->topic)
                                            <h4
                                                style="color: #1e293b; font-weight: 600; margin-bottom: 8px; font-size: 1.3rem;">
                                                {{ $class->topic }}
                                            </h4>
                                            <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 10px;">
                                                {{ __('messages.level') }} {{ $class->level }}
                                            </p>
                                        @else
                                            <h4
                                                style="color: #1e293b; font-weight: 600; margin-bottom: 10px; font-size: 1.5rem;">
                                                {{ __('messages.level') }} {{ $class->level }}
                                            </h4>
                                        @endif

                                        <!-- Cost Info -->
                                        <div
                                            style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap; margin-bottom: 15px;">
                                            @if($class->cost && $class->cost > 0)
                                                <span style="
                                                            background: {{ $colorScheme['bg'] }};
                                                            color: {{ $colorScheme['badge'] }};
                                                            padding: 6px 12px;
                                                            border-radius: 10px;
                                                            font-weight: 700;
                                                            font-size: 0.95rem;
                                                        ">💰 €{{ number_format($class->cost, 2) }}</span>
                                            @else
                                                <span style="
                                                            background: #dcfce7;
                                                            color: #166534;
                                                            padding: 6px 12px;
                                                            border-radius: 10px;
                                                            font-weight: 700;
                                                            font-size: 0.95rem;
                                                        ">✨ {{ __('messages.free') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Class Session Info -->
                                    <div class="class-sessions" style="
                                        background: {{ $colorScheme['bg'] }};
                                        border-radius: 15px;
                                        padding: 20px;
                                        margin-bottom: 15px;
                                        transition: all 0.3s ease;
                                    ">
                                        <div class="class-session-item">
                                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                                                <div style="
                                                    background: {{ $colorScheme['badge'] }};
                                                    color: white;
                                                    padding: 8px 12px;
                                                    border-radius: 10px;
                                                    font-weight: 600;
                                                    font-size: 0.85rem;
                                                    min-width: 80px;
                                                    text-align: center;
                                                ">
                                                    {{ $classDate->format('M d') }}
                                                </div>
                                                <div style="flex: 1;">
                                                    <div style="color: #1e293b; font-weight: 600; font-size: 0.95rem;">
                                                        {{ $classDate->format('l') }}
                                                    </div>
                                                    <div style="color: #64748b; font-size: 0.85rem;">
                                                        🕐 {{ $startTime }} - {{ $endTime }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register Button -->
                                    <div class="text-center mt-3">
                                        <div style="
                                            background: {{ $colorScheme['badge'] }};
                                            color: white;
                                            padding: 12px 24px;
                                            border-radius: 50px;
                                            font-weight: 600;
                                            font-size: 1rem;
                                            display: inline-block;
                                            transition: all 0.3s ease;
                                        ">
                                            📚 Register for Class
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @empty
                    <div class="col-12 text-center">
                        <div style="
                                background: white;
                                border-radius: 20px;
                                padding: 60px 40px;
                                border: 2px solid #e2e8f0;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                            ">
                            <div style="font-size: 3rem; margin-bottom: 20px;">📚</div>
                            <h4 style="color: #1e293b; margin-bottom: 15px;">
                                {{ __('messages.no_upcoming_classes') ?? 'No Upcoming Classes' }}</h4>
                            <p style="color: #64748b;">
                                {{ __('messages.check_back_classes') ?? 'Check back soon for new class schedules' }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Modal (place before footer include) -->
    <div id="contactModal" class="contact-modal"
        style="display:none; position:fixed; inset:0; z-index:1050; align-items:center; justify-content:center; background:rgba(0,0,0,0.5);">
        <div style="background:white; border-radius:12px; width:90%; max-width:600px; padding:24px; position:relative;">
            <button id="closeContactModal"
                style="position:absolute; right:12px; top:12px; background:none; border:none; font-size:1.25rem;">&times;</button>
            <h4 style="margin-bottom:12px;">Contact Us</h4>
            <form id="contactForm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- changed: add classes, allow wrapping and min-width:0 so fields don't overflow on small screens -->
                <div class="contact-row" style="display:flex; gap:12px; margin-bottom:12px; flex-wrap:wrap;">
                    <input class="contact-input" name="first_name" placeholder="First name" required
                        style="flex:1; min-width:0; padding:10px; border-radius:8px; border:1px solid #ddd;">
                    <input class="contact-input" name="last_name" placeholder="Last name" required
                        style="flex:1; min-width:0; padding:10px; border-radius:8px; border:1px solid #ddd;">
                </div>
                <div style="margin-bottom:12px;">
                    <input name="email" type="email" placeholder="Email" required
                        style="width:100%; padding:10px; border-radius:8px; border:1px solid #ddd;">
                </div>
                <div style="margin-bottom:12px;">
                    <textarea name="message" placeholder="Your request" required rows="5"
                        style="width:100%; padding:10px; border-radius:8px; border:1px solid #ddd;"></textarea>
                </div>
                <div style="text-align:right;">
                    <button type="submit" id="contactSubmit"
                        style="background:#3b82f6; color:white; padding:10px 18px; border-radius:8px; border:none;">Send</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openBtns = document.querySelectorAll('.contactUsBtn');
            const modal = document.getElementById('contactModal');
            const closeBtn = document.getElementById('closeContactModal');
            const form = document.getElementById('contactForm');

            function getCsrfToken() {
                return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                    document.querySelector('input[name="_token"]')?.value ||
                    '{{ csrf_token() }}';
            }

            openBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.style.display = 'flex';
                });
            });

            closeBtn?.addEventListener('click', () => modal.style.display = 'none');
            modal?.addEventListener('click', (e) => { if (e.target === modal) modal.style.display = 'none'; });

            form?.addEventListener('submit', function (e) {
                e.preventDefault();
                const btn = document.getElementById('contactSubmit');
                btn.disabled = true; btn.textContent = 'Sending...';

                const formData = new FormData(this);
                fetch('/contact', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                    .then(async res => {
                        const data = await res.json().catch(() => ({}));
                        btn.disabled = false; btn.textContent = 'Send';
                        if (res.ok && data.success) {
                            // requires SweetAlert2 already included in this page
                            Swal.fire({ title: 'Sent', text: data.message || 'Your message has been sent.', icon: 'success' });
                            form.reset();
                            modal.style.display = 'none';
                        } else {
                            Swal.fire({ title: 'Error', text: data.message || 'Unable to send. Try again.', icon: 'error' });
                        }
                    })
                    .catch(err => {
                        btn.disabled = false; btn.textContent = 'Send';
                        Swal.fire({ title: 'Network Error', text: 'Could not reach server.', icon: 'error' });
                        console.error(err);
                    });
            });
        });
    </script>

    <!-- Add SweetAlert2 for modern alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include Flatpickr CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Modern CSS -->
    <style>
        /* Registration form container styles */
        .registration-form {
            overflow: hidden;
            position: relative;
        }

        .registration-form .row {
            margin: 0;
        }

        .registration-form .col-12 {
            padding-left: 0;
            padding-right: 0;
        }

        .registration-form label,
        .registration-form select,
        .registration-form input,
        .registration-form button {
            max-width: 100%;
            box-sizing: border-box;
        }

        .form-select,
        .form-control {
            width: 100% !important;
            box-sizing: border-box;
        }

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

        /* Improved event location styles */
        .event-map-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 12px;
            background: rgba(96, 165, 250, 0.06);
            color: #60a5fa;
            text-decoration: none;
            font-weight: 600;
            max-width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            transition: all 0.2s ease;
            border: 1px solid rgba(96, 165, 250, 0.08);
        }

        .event-map-link:hover {
            background: rgba(96, 165, 250, 0.12);
            transform: translateY(-2px);
        }

        .event-location-text {
            display: inline-block;
            max-width: 220px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        /* ensure tags and location behave responsively */
        .event-footer {
            gap: 12px;
            flex-wrap: wrap;
        }

        .event-tags {
            min-width: 0;
        }

        @media (max-width: 576px) {
            .event-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .event-location {
                width: 100%;
                margin-top: 8px;
                display: block;
            }

            .event-map-link {
                width: 100%;
                box-sizing: border-box;
            }

            .event-location-text {
                max-width: calc(100% - 36px);
            }
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

        .class-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .class-card:hover .class-sessions {
            transform: scale(1.02);
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

        /* Improve alignment and readability for event descriptions */
        .event-card,
        .event-content,
        .event-description {
            text-align: left !important;
        }

        .event-description {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #cbd5e1;
            margin: 0;
            padding: 0;
            /* allow hyphenation to avoid large gaps */
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            hyphens: auto;
            word-break: break-word;
            white-space: normal;
            /* don't preserve source line-breaks unless needed */
        }

        .event-description p,
        .event-desc-short,
        .event-desc-full {
            margin: 0 0 0.75rem;
            padding: 0;
            text-align: left;
            white-space: normal;
        }

        .read-more-btn {
            display: inline-block;
            margin-top: 6px;
            padding: 0;
        }

        /* small screen tweaks */
        @media (max-width: 576px) {
            .event-card {
                padding: 18px;
            }

            .event-content {
                padding-left: 8px;
                padding-right: 8px;
            }
        }

        /* Two-form layout responsive styles */
        .registration-form {
            min-height: 600px;
        }

        @media (max-width: 991px) {
            .registration-form {
                margin-bottom: 30px;
                min-height: auto;
            }
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

            .btn-hero-primary,
            .btn-hero-secondary {
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

        .contact-row .contact-input {
            min-width: 0;
            box-sizing: border-box;
        }

        @media (max-width: 480px) {
            .contact-row {
                gap: 10px;
            }

            .contact-row .contact-input {
                width: 100% !important;
                flex: 0 0 100% !important;
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

        /* Language switcher styles */
        .language-switch.active {
            font-weight: bold;
            color: #3b82f6 !important;
        }

        .language-switch {
            transition: all 0.3s ease;
        }

        .language-switch:hover {
            color: #3b82f6 !important;
        }

        /* Header and Top Bar Mobile Styles */
        .header {
            margin-bottom: 0 !important;
            position: relative !important;
        }

        .super_container {
            position: relative;
            overflow-x: hidden;
        }

        .top_bar {
            padding: 12px 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.5);
            position: relative;
            z-index: 1000;
            display: block !important;
            visibility: visible !important;
            height: auto !important;
            min-height: 50px;
        }

        .header_container {
            padding: 15px 0;
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 0 !important;
            position: relative;
            z-index: 999;
        }

        /* Language dropdown visibility */
        .top_bar_lang {
            position: relative;
        }

        .top_bar_lang .lang_list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .top_bar_lang .lang_list li {
            position: relative;
            display: inline-block;
        }

        .top_bar_lang .lang_list li ul {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 8px 0;
            min-width: 120px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            list-style: none;
            margin: 0;
        }

        .top_bar_lang .lang_list li:hover ul,
        .top_bar_lang .lang_list li ul:hover {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .top_bar_lang .lang_list li ul li {
            display: block;
            width: 100%;
        }

        .top_bar_lang .lang_list li ul li a {
            display: block;
            padding: 8px 16px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .top_bar_lang .lang_list li ul li a:hover {
            background: #f8f9fa;
            color: #3b82f6;
        }

        /* Mobile specific fixes */
        @media (max-width: 768px) {
            .top_bar {
                padding: 10px 0;
                display: block !important;
                visibility: visible !important;
                background: rgba(255, 255, 255, 0.98) !important;
                position: relative !important;
            }

            .top_bar_content {
                flex-wrap: nowrap;
                gap: 15px;
                justify-content: space-between;
                align-items: center;
            }

            .top_bar_lang,
            .top_bar_social {
                font-size: 13px;
            }

            .top_bar_lang {
                display: block !important;
                visibility: visible !important;
            }

            .top_bar_lang .lang_list li ul {
                right: 0;
                left: auto;
                min-width: 100px;
            }

            .header_container {
                padding: 10px 0;
                position: relative !important;
                box-shadow: none !important;
            }

            .header_content {
                flex-wrap: wrap;
                gap: 10px;
            }

            .logo_container img {
                height: 60px !important;
                max-width: 150px !important;
            }

            .main_nav_contaner {
                order: 3;
                width: 100%;
                margin-top: 10px;
            }

            .main_nav {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .main_nav li {
                margin: 0;
            }

            .main_nav li a {
                font-size: 14px;
                padding: 8px 12px;
                display: block;
                background: rgba(59, 130, 246, 0.1);
                border-radius: 20px;
                text-decoration: none;
                color: #3b82f6;
                transition: all 0.3s ease;
            }

            .main_nav li a:hover,
            .main_nav li.active a {
                background: #3b82f6;
                color: white;
            }

            .header_content_right {
                margin-left: auto !important;
            }

            /* Fix hero section spacing */
            .hero-section {
                margin-top: 0 !important;
                padding-top: 40px !important;
            }
        }

        @media (max-width: 576px) {
            .top_bar {
                padding: 8px 0;
                display: block !important;
                visibility: visible !important;
            }

            .top_bar_content {
                font-size: 12px;
                justify-content: space-between;
                align-items: center;
            }

            .top_bar_lang {
                display: block !important;
                visibility: visible !important;
            }

            .top_bar_lang .top_bar_title {
                font-size: 11px;
                margin-right: 8px;
            }

            .top_bar_lang .lang_list li ul {
                font-size: 12px;
                right: -10px;
            }

            .top_bar_social {
                display: none;
                /* Hide social on very small screens */
            }

            .header_container {
                padding: 8px 0;
            }

            .logo_container img {
                height: 50px !important;
                max-width: 120px !important;
            }

            .hero-section {
                padding-top: 30px !important;
            }

            .main_nav li a {
                font-size: 13px;
                padding: 6px 10px;
            }
        }

        /* Extra small screens - Force language switcher visibility */
        @media (max-width: 480px) {
            .top_bar {
                display: block !important;
                visibility: visible !important;
                padding: 12px 0 !important;
                background: #3b82f6 !important;
                color: white !important;
                position: relative !important;
                margin-bottom: 0 !important;
            }

            .top_bar_content {
                justify-content: center !important;
            }

            .top_bar_lang {
                display: block !important;
                visibility: visible !important;
                text-align: center;
            }

            .top_bar_lang .top_bar_title {
                color: white !important;
                font-weight: 500;
                font-size: 12px !important;
            }

            .top_bar_lang .hassubs>a {
                background: rgba(255, 255, 255, 0.2) !important;
                color: white !important;
                border: 1px solid rgba(255, 255, 255, 0.3) !important;
                font-weight: 600 !important;
            }

            .top_bar_social {
                display: none !important;
            }
        }
    </style>

    <script>
        // Translations object
        const translations = {
            selectEvent: '{{ __("messages.select_event") }}',
            loadingEvents: '{{ __("messages.loading_events") }}',
            noEventsAvailable: 'No events available',
            errorLoadingEvents: 'Error loading events',
            selectLevel: '{{ __("messages.select_level") }}',
            selectDate: '{{ __("messages.select_date") }}',
            noTimeSlots: '{{ __("messages.no_time_slots") }}',
            selectLearningType: '{{ __("messages.select_learning_type") }}',
            chooseBetweenTypes: '{{ __("messages.choose_between_types") }}',
            eventSelectionRequired: '{{ __("messages.event_selection_required") }}',
            chooseEventBeforeSubmit: '{{ __("messages.choose_event_before_submit") }}',
            scheduleRequired: '{{ __("messages.schedule_required") }}',
            selectClassDateTime: '{{ __("messages.select_class_date_time") }}',
            processingRegistration: '{{ __("messages.processing_registration") }}',
            pleaseWaitRegister: '{{ __("messages.please_wait_register") }}',
            registrationSuccessful: '{{ __("messages.registration_successful") }}',
            successfullyRegistered: '{{ __("messages.successfully_registered") }}',
            awesome: '{{ __("messages.awesome") }}',
            registrationFailed: '{{ __("messages.registration_failed") }}',
            somethingWentWrong: '{{ __("messages.something_went_wrong") }}',
            sessionExpired: '{{ __("messages.session_expired") }}',
            sessionExpiredRefresh: '{{ __("messages.session_expired_refresh") }}',
            refreshPage: '{{ __("messages.refresh_page") }}',
            networkError: '{{ __("messages.network_error") }}',
            checkInternetConnection: '{{ __("messages.check_internet_connection") }}',
            close: '{{ __("messages.close") }}',
            ok: '{{ __("messages.ok") }}',
            loading: '{{ __("messages.loading") }}',
            time: '{{ __("messages.time") }}',
            spotsLeft: '{{ __("messages.spots_left") }}'
        };

        document.addEventListener('DOMContentLoaded', function () {
            // Elements for both forms
            const levelSelect = document.getElementById('classLevelSelect');
            const timeSlots = document.getElementById('timeSlots');
            const timeSlotButtons = document.getElementById('timeSlotButtons');
            const selectedClassSchedule = document.getElementById('selectedClassSchedule');
            const eventHangoutSelect = document.getElementById('eventHangoutSelect');

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

            // Load events for the event registration form
            fetch('/get-events', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': getCsrfToken()
                }
            })
                .then(res => res.json())
                .then(data => {
                    eventHangoutSelect.innerHTML = `<option value="">${translations.selectEvent}</option>`;

                    if (data.length === 0) {
                        eventHangoutSelect.innerHTML = `<option value="" disabled>${translations.noEventsAvailable}</option>`;
                    } else {
                        data.forEach(event => {
                            const displayText = `${event.title} - ${event.date} ${translations.time} ${event.time} (${event.remaining_spots} ${translations.spotsLeft})`;
                            eventHangoutSelect.innerHTML += `<option value="${event.id}">${displayText}</option>`;
                        });
                    }
                })
                .catch(err => {
                    console.error('Error loading events:', err);
                    eventHangoutSelect.innerHTML = `<option value="" disabled>${translations.errorLoadingEvents}</option>`;
                });

            // Load levels for class registration form
            loadLevels();

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
                        levelSelect.innerHTML = `<option value="">${translations.selectLevel}</option>`;
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
                calendarContainer.innerHTML = `<input type="text" id="calendarInput" class="form-control modern-input" placeholder="${translations.selectDate}" style="border-radius: 15px; border: 2px solid #e2e8f0; padding: 15px;">`;

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
                    timeSlotButtons.innerHTML = `<p style="color: #64748b;">${translations.noTimeSlots}</p>`;
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

            // Submit event registration form
            document.getElementById('event_register_form').addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitButton = this.querySelector('.btn-submit');
                const hangoutId = eventHangoutSelect.value;

                // Validation
                if (!hangoutId) {
                    Swal.fire({
                        title: translations.eventSelectionRequired,
                        text: translations.chooseEventBeforeSubmit,
                        icon: 'warning',
                        confirmButtonText: translations.ok,
                        confirmButtonColor: '#f59e0b'
                    });
                    return;
                }

                // Show loading
                submitButton.disabled = true;
                const originalText = submitButton.innerHTML;
                submitButton.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>${translations.processingRegistration}`;

                Swal.fire({
                    title: translations.processingRegistration,
                    text: translations.pleaseWaitRegister,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => Swal.showLoading()
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
                    .then(response => {
                        if (response.status === 419) {
                            throw new Error('session_expired');
                        }
                        return response.json();
                    })
                    .then(data => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalText;

                        if (data.success) {
                            Swal.fire({
                                title: translations.registrationSuccessful,
                                text: translations.successfullyRegistered,
                                icon: 'success',
                                confirmButtonText: translations.awesome,
                                confirmButtonColor: '#10b981'
                            }).then(() => {
                                this.reset();
                                eventHangoutSelect.selectedIndex = 0;
                            });
                        } else {
                            throw new Error(data.message || translations.somethingWentWrong);
                        }
                    })
                    .catch(error => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalText;

                        if (error.message === 'session_expired') {
                            Swal.fire({
                                title: translations.sessionExpired,
                                text: translations.sessionExpiredRefresh,
                                icon: 'error',
                                confirmButtonText: translations.refreshPage,
                                confirmButtonColor: '#ef4444'
                            }).then(() => location.reload());
                        } else if (error.message === 'Failed to fetch') {
                            Swal.fire({
                                title: translations.networkError,
                                text: translations.checkInternetConnection,
                                icon: 'error',
                                confirmButtonText: translations.close,
                                confirmButtonColor: '#ef4444'
                            });
                        } else {
                            Swal.fire({
                                title: translations.registrationFailed,
                                text: error.message || translations.somethingWentWrong,
                                icon: 'error',
                                confirmButtonText: translations.close,
                                confirmButtonColor: '#ef4444'
                            });
                        }
                    });
            });

            // Submit class registration form
            document.getElementById('class_register_form').addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitButton = this.querySelector('.btn-submit');
                const classScheduleId = selectedClassSchedule.value;

                // Validation
                if (!classScheduleId) {
                    Swal.fire({
                        title: translations.scheduleRequired,
                        text: translations.selectClassDateTime,
                        icon: 'warning',
                        confirmButtonText: translations.ok,
                        confirmButtonColor: '#3b82f6'
                    });
                    return;
                }

                // Show loading
                submitButton.disabled = true;
                const originalText = submitButton.innerHTML;
                submitButton.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>${translations.processingRegistration}`;

                Swal.fire({
                    title: translations.processingRegistration,
                    text: translations.pleaseWaitRegister,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => Swal.showLoading()
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
                    .then(response => {
                        if (response.status === 419) {
                            throw new Error('session_expired');
                        }
                        return response.json();
                    })
                    .then(data => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalText;

                        if (data.success) {
                            Swal.fire({
                                title: translations.registrationSuccessful,
                                text: translations.successfullyRegistered,
                                icon: 'success',
                                confirmButtonText: translations.awesome,
                                confirmButtonColor: '#10b981'
                            }).then(() => {
                                this.reset();
                                levelSelect.selectedIndex = 0;
                                timeSlots.style.display = 'none';
                                selectedClassSchedule.value = '';
                                if (calendarInstance) {
                                    calendarInstance.destroy();
                                    calendarInstance = null;
                                }
                            });
                        } else {
                            throw new Error(data.message || translations.somethingWentWrong);
                        }
                    })
                    .catch(error => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalText;

                        if (error.message === 'session_expired') {
                            Swal.fire({
                                title: translations.sessionExpired,
                                text: translations.sessionExpiredRefresh,
                                icon: 'error',
                                confirmButtonText: translations.refreshPage,
                                confirmButtonColor: '#ef4444'
                            }).then(() => location.reload());
                        } else if (error.message === 'Failed to fetch') {
                            Swal.fire({
                                title: translations.networkError,
                                text: translations.checkInternetConnection,
                                icon: 'error',
                                confirmButtonText: translations.close,
                                confirmButtonColor: '#ef4444'
                            });
                        } else {
                            Swal.fire({
                                title: translations.registrationFailed,
                                text: error.message || translations.somethingWentWrong,
                                icon: 'error',
                                confirmButtonText: translations.close,
                                confirmButtonColor: '#ef4444'
                            });
                        }
                    });
            });

            // Handle event registration buttons (scroll to event form)
            document.querySelectorAll('.register-event-btn').forEach(button => {
                button.addEventListener('click', function () {
                    // Scroll to registration section
                    document.getElementById('register').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });
        });

        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.read-more-btn');
            if (!btn) return;

            // Prevent the click from bubbling to the parent anchor (stops navigation/refresh)
            e.preventDefault();
            e.stopPropagation();

            const container = btn.closest('.event-description');
            if (!container) return;

            const shortP = container.querySelector('.event-desc-short');
            const fullP = container.querySelector('.event-desc-full');
            const expanded = container.classList.contains('expanded');

            const readMoreText = {!! json_encode(__('messages.read_more') ?? 'Read more') !!};
            const showLessText = {!! json_encode(__('messages.show_less') ?? 'Show less') !!};

            if (expanded) {
                // collapse
                container.classList.remove('expanded');
                if (fullP) fullP.style.display = 'none';
                if (shortP) shortP.style.display = 'block';
                btn.textContent = readMoreText;
                btn.setAttribute('aria-expanded', 'false');
            } else {
                // expand (no scrolling)
                container.classList.add('expanded');
                if (shortP) shortP.style.display = 'none';
                if (fullP) fullP.style.display = 'block';
                btn.textContent = showLessText;
                btn.setAttribute('aria-expanded', 'true');
            }
        });

        // Events Form Toggle
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('eventsToggleBtn');
            const formContainer = document.getElementById('eventsFormContainer');
            const toggleIcon = document.getElementById('eventsToggleIcon');
            const wrapper = document.getElementById('eventsFormWrapper');
            let isOpen = false;

            toggleBtn.addEventListener('click', function () {
                isOpen = !isOpen;
                if (isOpen) {
                    formContainer.style.display = 'block';
                    formContainer.style.maxHeight = '2000px';
                    wrapper.style.padding = '30px';
                    toggleIcon.style.transform = 'rotate(180deg)';
                } else {
                    formContainer.style.display = 'none';
                    formContainer.style.maxHeight = '0';
                    wrapper.style.padding = '15px';
                    toggleIcon.style.transform = 'rotate(0deg)';
                }
            });
        });

        // Classes Form Toggle
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('classesToggleBtn');
            const formContainer = document.getElementById('classesFormContainer');
            const toggleIcon = document.getElementById('classesToggleIcon');
            const wrapper = document.getElementById('classesFormWrapper');
            let isOpen = false;

            toggleBtn.addEventListener('click', function () {
                isOpen = !isOpen;
                if (isOpen) {
                    formContainer.style.display = 'block';
                    formContainer.style.maxHeight = '2000px';
                    wrapper.style.padding = '30px';
                    toggleIcon.style.transform = 'rotate(180deg)';
                } else {
                    formContainer.style.display = 'none';
                    formContainer.style.maxHeight = '0';
                    wrapper.style.padding = '15px';
                    toggleIcon.style.transform = 'rotate(0deg)';
                }
            });
        });
    </script>
    @include('components.chat-widget')
    <!-- Footer -->
    @include('layouts.footer')
</div>
