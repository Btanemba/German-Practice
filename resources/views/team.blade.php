@include('layouts.nav')

<div class="super_container">
    <header class="header" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; background: white;">
        <div class="top_bar" style="background: #f8f9fa; border-bottom: 1px solid #eee;">
            <div class="top_bar_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="top_bar_content d-flex flex-row align-items-center justify-content-end" style="height: 40px;">
                                <div class="top_bar_right">
                                    <div class="top_bar_lang" style="position: relative;">
                                        <span class="top_bar_title" style="font-size: 12px; margin-right: 8px;">{{ __('messages.site_language') }}</span>
                                        <ul class="lang_list" style="list-style: none; margin: 0; padding: 0; display: inline-block;">
                                            <li class="hassubs" style="position: relative;"
                                                onmouseenter="this.querySelector('.dropdown_list').style.opacity='1'; this.querySelector('.dropdown_list').style.visibility='visible'; this.querySelector('.dropdown_list').style.transform='translateY(0)';"
                                                onmouseleave="this.querySelector('.dropdown_list').style.opacity='0'; this.querySelector('.dropdown_list').style.visibility='hidden'; this.querySelector('.dropdown_list').style.transform='translateY(-10px)';">
                                                <a href="#" style="display: flex; align-items: center; gap: 5px; text-decoration: none; color: #3b82f6; cursor: pointer; background: rgba(59, 130, 246, 0.1); padding: 4px 12px; border-radius: 15px; font-weight: 500; font-size: 12px; transition: all 0.3s ease;">
                                                    {{ App::getLocale() == 'en' ? 'EN' : 'DE' }}
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown_list" style="position: absolute; top: 100%; right: 0; background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); border-radius: 8px; padding: 8px 0; min-width: 120px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s ease; z-index: 1001; list-style: none; margin: 0;">
                                                    <li><a href="{{ route('language.switch', 'en') }}" style="display: block; padding: 10px 16px; color: #333; text-decoration: none; font-size: 13px; {{ App::getLocale() == 'en' ? 'font-weight: bold; color: #3b82f6; background: rgba(59, 130, 246, 0.1);' : '' }}">🇺🇸 English</a></li>
                                                    <li><a href="{{ route('language.switch', 'de') }}" style="display: block; padding: 10px 16px; color: #333; text-decoration: none; font-size: 13px; {{ App::getLocale() == 'de' ? 'font-weight: bold; color: #3b82f6; background: rgba(59, 130, 246, 0.1);' : '' }}">🇩🇪 Deutsch</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_container" style="background: white; border-bottom: 1px solid #eee;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-between" style="height: 80px;">
                            <div class="logo_container">
                                <a href="/" class="logo">
                                    <img src="/images/logo2.jpg" alt="Sprachraum Logo" style="height: 48px;">
                                </a>
                            </div>
                            <nav class="main_nav">
                                <ul class="main_nav_list d-flex flex-row align-items-center" style="list-style: none; margin: 0; gap: 30px;">
                                    <li class="main_nav_item"><a href="/" class="main_nav_link" style="text-decoration: none; color: #333; font-weight: 500;">{{ __('messages.home') }}</a></li>
                                    <li class="main_nav_item"><a href="/team" class="main_nav_link" style="text-decoration: none; color: #333; font-weight: 500;">Team</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="team_section" style="padding: 100px 0 80px 0; background-color: #f8f9fa; margin-top: 120px;">
        <div class="container">
            <h1 class="section_title" style="text-align: center; font-size: 48px; font-weight: 900; margin-bottom: 60px; color: #4f46e5; letter-spacing: 2px; text-transform: uppercase;">
                Our Talented Team
            </h1>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team_card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%;">
                        <div class="team_image" style="height: 300px; overflow: hidden;">
                            <img src="/images/wifey.jpg" alt="Tamara Terbul" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                        </div>
                        <div class="team_content" style="padding: 40px 30px; text-align: center;">
                            <h3 class="team_name" style="font-size: 24px; font-weight: bold; margin-bottom: 8px; color: #1f2937;">Tamara Terbul</h3>
                            <p class="team_position" style="color: #4f46e5; font-weight: 600; margin-bottom: 20px; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">German Language Expert</p>
                            <p class="team_bio" style="color: #6b7280; line-height: 1.7; font-size: 15px;">Tamara brings passion, expertise, and personalized learning approaches to help you achieve fluency faster with 4+ years of experience in teaching German.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team_card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%;">
                        <div class="team_card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%;">
                        <div class="team_image" style="height: 300px; overflow: hidden;">
                            <img src="/images/Witcher.PNG" alt="Benedict Anemba" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                        </div>
                        <div class="team_content" style="padding: 40px 30px; text-align: center;">
                            <h3 class="team_name" style="font-size: 24px; font-weight: bold; margin-bottom: 8px; color: #1f2937;">Benedict Anemba</h3>
                            <p class="team_position" style="color: #4f46e5; font-weight: 600; margin-bottom: 20px; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Software Developer</p>
                            <p class="team_bio" style="color: #6b7280; line-height: 1.7; font-size: 15px;">Benedict is a skilled software developer with a passion for creating innovative solutions and enhancing user experiences through technology.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about_section" style="padding: 100px 0; background: white;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section_title" style="font-size: 36px; font-weight: 800; margin-bottom: 30px; color: #111827;">About Our Team</h2>
                    <p style="font-size: 17px; color: #4b5563; line-height: 1.8; margin-bottom: 25px;">At Sprachraum, our team is composed of experienced language educators, software developers, and language enthusiasts dedicated to making German language learning accessible and engaging for everyone.</p>
                    <p style="font-size: 17px; color: #4b5563; line-height: 1.8;">We believe in the power of language to connect people and cultures. Our mission is to provide high-quality German language education through innovative platforms and personalized learning experiences.</p>
                </div>
                <div class="col-lg-6">
                    <div style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); border-radius: 20px; padding: 50px; color: white; text-align: center; box-shadow: 0 20px 40px rgba(79, 70, 229, 0.2);">
                        <i class="fa fa-heart" style="font-size: 60px; margin-bottom: 25px;"></i>
                        <h3 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">Our Mission</h3>
                        <p style="font-size: 17px; line-height: 1.6; opacity: 0.9;">To empower learners worldwide with accessible, high-quality German language education and foster a community of language enthusiasts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')