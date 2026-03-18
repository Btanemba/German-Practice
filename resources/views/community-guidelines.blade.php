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
                                    <li class="main_nav_item"><a href="/community-guidelines" class="main_nav_link" style="text-decoration: none; color: #333; font-weight: 500;">Community Guidelines</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="guidelines_section" style="padding: 100px 0 80px 0; background-color: #f8f9fa; margin-top: 120px;">
        <div class="container">
            <h1 class="section_title" style="text-align: center; font-size: 48px; font-weight: 900; margin-bottom: 60px; color: #4f46e5; letter-spacing: 2px; text-transform: uppercase;">
                Community Guidelines
            </h1>

            <div class="guidelines_content" style="background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); padding: 50px; max-width: 900px; margin: 0 auto;">

                <div class="guideline_item" style="margin-bottom: 50px;">
                    <h2 style="font-size: 28px; font-weight: 700; color: #4f46e5; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i class="fa fa-heart" style="font-size: 28px;"></i>
                        Respect and Kindness
                    </h2>
                    <p style="font-size: 16px; color: #4b5563; line-height: 1.8; margin-bottom: 15px;">
                        Treat all community members with respect and kindness. We are a diverse community of learners from different backgrounds, cultures, and experiences. Every member deserves to be treated with dignity.
                    </p>
                </div>

                <div class="guideline_item" style="margin-bottom: 50px;">
                    <h2 style="font-size: 28px; font-weight: 700; color: #4f46e5; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i class="fa fa-shield" style="font-size: 28px;"></i>
                        Safe and Inclusive Environment
                    </h2>
                    <p style="font-size: 16px; color: #4b5563; line-height: 1.8; margin-bottom: 15px;">
                        Maintain a safe and inclusive environment for all learners. Zero tolerance for harassment, discrimination, hate speech, or any form of bullying. Everyone should feel welcome and safe while learning.
                    </p>
                </div>

                <div class="guideline_item" style="margin-bottom: 50px;">
                    <h2 style="font-size: 28px; font-weight: 700; color: #4f46e5; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i class="fa fa-comments" style="font-size: 28px;"></i>
                        Constructive Communication
                    </h2>
                    <p style="font-size: 16px; color: #4b5563; line-height: 1.8; margin-bottom: 15px;">
                        Communicate constructively and professionally. When providing feedback or criticism, focus on being helpful and supportive. Share knowledge generously and help fellow learners grow.
                    </p>
                </div>

                <div class="guideline_item" style="margin-bottom: 50px;">
                    <h2 style="font-size: 28px; font-weight: 700; color: #4f46e5; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i class="fa fa-book" style="font-size: 28px;"></i>
                        Intellectual Property
                    </h2>
                    <p style="font-size: 16px; color: #4b5563; line-height: 1.8; margin-bottom: 15px;">
                        Respect intellectual property rights and copyright. Do not share copyrighted materials without permission. Give credit where credit is due and acknowledge sources appropriately.
                    </p>
                </div>

                <div class="guideline_item" style="margin-bottom: 50px;">
                    <h2 style="font-size: 28px; font-weight: 700; color: #4f46e5; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i class="fa fa-rules" style="font-size: 28px;"></i>
                        No Spam or Abuse
                    </h2>
                    <p style="font-size: 16px; color: #4b5563; line-height: 1.8; margin-bottom: 15px;">
                        Do not engage in spamming, flooding, or any abusive behavior. Keep discussions on-topic and relevant to German language learning. Respect community moderation decisions.
                    </p>
                </div>

                <div class="guideline_item" style="margin-bottom: 50px;">
                    <h2 style="font-size: 28px; font-weight: 700; color: #4f46e5; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                        <i class="fa fa-user-secret" style="font-size: 28px;"></i>
                        Privacy and Confidentiality
                    </h2>
                    <p style="font-size: 16px; color: #4b5563; line-height: 1.8; margin-bottom: 15px;">
                        Respect the privacy of other community members. Do not share personal information without consent. Keep conversations confidential when appropriate and follow our privacy policy.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="enforcement_section" style="padding: 100px 0; background: white;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section_title" style="font-size: 36px; font-weight: 800; margin-bottom: 30px; color: #111827;">Enforcement</h2>
                    <p style="font-size: 17px; color: #4b5563; line-height: 1.8; margin-bottom: 25px;">These guidelines are here to create a positive learning environment for everyone. Violations may result in warnings, content removal, or suspension from the community.</p>
                    <p style="font-size: 17px; color: #4b5563; line-height: 1.8; margin-bottom: 25px;">If you witness any violation of these guidelines or have concerns, please report it to our moderation team immediately. We take all reports seriously and will investigate promptly.</p>
                    <p style="font-size: 17px; color: #4b5563; line-height: 1.8;">Together, we create a supportive and respectful community where learning thrives.</p>
                </div>
                <div class="col-lg-6">
                    <div style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); border-radius: 20px; padding: 50px; color: white; text-align: center; box-shadow: 0 20px 40px rgba(79, 70, 229, 0.2);">
                        <i class="fa fa-flag" style="font-size: 60px; margin-bottom: 25px;"></i>
                        <h3 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">Report a Violation</h3>
                        <p style="font-size: 17px; line-height: 1.6; opacity: 0.9; margin-bottom: 25px;">Found something that doesn't align with our values? Help us keep the community safe.</p>
                        <a href="mailto:support@sprachraum.com" style="display: inline-block; background: white; color: #4f46e5; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
