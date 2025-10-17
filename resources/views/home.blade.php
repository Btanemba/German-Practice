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
								<a href="#">
									<div class="logo_text">LGWT</div>
								</a>
							</div>
							<nav class="main_nav_contaner">
								<ul class="main_nav">
									<li class="active"><a href="index.html">Home</a></li>
									<li><a href="#">Events</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
							<div class="header_content_right ml-auto text-right">
								<div class="header_search">
									<div class="search_form_container">
										<form action="#" id="search_form" class="search_form trans_400">
											<input type="search" class="header_search_input trans_400" placeholder="Type for Search" required="required">
											<div class="search_button">
												<i class="fa fa-search" aria-hidden="true"></i>
											</div>
										</form>
									</div>
								</div>

								<!-- Hamburger -->

								<div class="user"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></div>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.html">Home</a></li>
				<li class="menu_mm"><a href="courses.html">Courses</a></li>
				<li class="menu_mm"><a href="instructors.html">Instructors</a></li>
				<li class="menu_mm"><a href="#">Events</a></li>
				<li class="menu_mm"><a href="blog.html">Blog</a></li>
				<li class="menu_mm"><a href="contact.html">Contact</a></li>
			</ul>
		</nav>
		<div class="menu_extra">
			<div class="menu_phone"><span class="menu_title">phone:</span>+44 300 303 0266</div>
			<div class="menu_social">
				<span class="menu_title">follow us</span>
				<ul>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background" style="background-image: url(images/index_background.jpg);"></div>
		<div class="home_content">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1 class="home_title">Learn German With Tamara</h1>
						<div class="home_button trans_200"><a href="#">get started</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Courses -->
<div class="courses">
    <div class="courses_background"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="section_title text-center">Practice Sessions</h2>
            </div>
        </div>
        <div class="row courses_row">

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_1.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Vocabulary</a></div>

                        <div class="course_text">
                            <p>Expand your German vocabulary with words, phrases, and interactive exercises that help
                                you speak with confidence.</p>

                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_2.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Grammar</a></div>
                        <div class="course_text">
                            <p> Learn how to use verbs,
                                nouns, and cases correctly in everyday situations.</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

            <!-- Course -->
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="images/course_3.jpg" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="course.html">Conversation</a></div>
                        <div class="course_text">
                            <p>Enhance your German fluency by practicing real conversations. Learn how to express
                                yourself confidently in daily situations and social settings.</p>

                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="instructors">
	<div class="instructors_background" style="background-image:url(images/instructors_background.png)"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="section_title text-center">Your Favourite Tutor in Town</h2>
			</div>
		</div>
		<div class="row instructors_row justify-content-center">
			<div class="col-lg-4 instructor_col">
				<div class="instructor text-center">
					<div class="instructor_image_container">
						<div class="instructor_image"><img src="images/instructor_1.jpg" alt=""></div>
					</div>
					<div class="instructor_name"><a href="instructors.html">Tamara Terbul</a></div>
					<div class="instructor_title">Teacher</div>
					<div class="instructor_text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor.</p>
					</div>
					<div class="instructor_social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	<!-- Register -->

	<div class="register">
		<div class="container">
			<div class="row">

				<!-- Register Form -->

				<div class="col-lg-6">
					<div class="register_form_container">
						<div class="register_form_title">Practice German with Tamara and Others</div>
						<form action="#" id="register_form" class="register_form">
							<div class="row register_row">
								<div class="col-lg-6 register_col">
									<input type="text" class="form_input" placeholder="Name" required="required">
								</div>
								<div class="col-lg-6 register_col">
									<input type="email" class="form_input" placeholder="Email" required="required">
								</div>
								<div class="col-lg-6 register_col">
									<input type="tel" class="form_input" placeholder="Phone">
								</div>
								<div class="col-lg-6 register_col">
									<input type="url" class="form_input" placeholder="Site">
								</div>
								<div class="col">
									<button type="submit" class="form_button trans_200">get it now</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- Register Timer -->

				<div class="col-lg-6">
					<div class="register_timer_container">
						<div class="register_timer_title">Register Now</div>
						<div class="register_timer_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor.</p>
						</div>
						<div class="timer_container">
							<ul class="timer_list">
								<li><div id="day" class="timer_num">00</div><div class="timer_ss">days</div></li>
								<li><div id="hour" class="timer_num">00</div><div class="timer_ss">hours</div></li>
								<li><div id="minute" class="timer_num">00</div><div class="timer_ss">minutes</div></li>
								<li><div id="second" class="timer_num">00</div><div class="timer_ss">seconds</div></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Events -->

    <div class="events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section_title text-center">Upcoming Events</h2>
                </div>
            </div>
            <div class="row events_row">
                @foreach($events as $event)
                    @php
                        $day = \Carbon\Carbon::parse($event->event_date)->format('d');
                        $month = \Carbon\Carbon::parse($event->event_date)->format('M');
                        $year = \Carbon\Carbon::parse($event->date)->format('Y');
                    @endphp

                    <div class="col-lg-4 event_col">
                        <div class="event">
                            <div class="event_image">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                            </div>

                            <div class="event_body">
                                <div class="event_title"><a href="#">{{ $event->title }}</a></div>

                                <div class="event_date">
                                    <div class="event_day">{{ $day }}</div>
                                    <div class="event_month">{{ strtolower($month) }}</div>
                                    <div class="event_year">{{ $year }}</div>
                                </div>

                                <div class="event_tag">{{ $event->tag ?? '—' }}</div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

	<!-- Footer -->
 @include('layouts.footer')

</div>
