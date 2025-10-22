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
                                                <a href="#">English<i class="fa fa-angle-down"
                                                        aria-hidden="true"></i></a>
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
                                    <li class="active"><a href="">Home</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="header_content_right ml-auto text-right">
                                <div class="header_search">
                                    <div class="search_form_container">
                                        <form action="#" id="search_form" class="search_form trans_400">
                                            <input type="search" class="header_search_input trans_400"
                                                placeholder="Type for Search" required="required">
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
        <div class="menu_close_container">
            <div class="menu_close">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="search">
            <form action="#" class="header_search_form menu_mm">
                <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                <button
                    class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
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
                                <p>Expand your German vocabulary with words, phrases, and interactive exercises that
                                    help
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu
                                metus in, sagittis fringilla tortor.</p>
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


    {{-- Register for Practice Sessions --}}
    <div class="register py-5" style="background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- Registration Form -->
                <div class="col-lg-6">
                    <div class="register_form_container p-5 shadow-lg rounded-4 bg-white">
                        <div class="register_form_title text-center mb-4 fw-bold fs-4 text-primary">
                            Practice German with Tamara and Others
                        </div>

                        <form id="register_form" method="POST" action="/register-user">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="form-control form-control-lg"
                                        placeholder="First Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" class="form-control form-control-lg"
                                        placeholder="Last Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="phone" class="form-control form-control-lg"
                                        placeholder="Phone">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="city" class="form-control form-control-lg"
                                        placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <select id="typeSelect" name="type" class="form-select form-select-lg" required>
                                        <option value="">Select Option</option>
                                        <option value="Hangout">Coffee-Connect</option>
                                        <option value="Classes">Classes</option>
                                    </select>
                                </div>

                                <!-- Hangout Section -->
                                <div id="hangoutSection" class="col-12" style="display:none;">
                                    <select name="hangout_id" id="hangoutSelect" class="form-select form-select-lg">
                                        <option value="">Select Hangout Date & Time</option>
                                    </select>
                                </div>

                                <!-- Class Booking Section -->
                                <div id="classBookingSection" class="col-12" style="display:none;">
                                    <h5 class="mt-4 mb-3 text-center fw-semibold text-secondary">
                                        Select Your Class Level and Schedule
                                    </h5>

                                    <div class="mb-3">
                                        <label for="classLevelSelect" class="form-label fw-medium">Choose Level</label>
                                        <select id="classLevelSelect" class="form-select form-select-lg">
                                            <option value="">Select Level (A1–B2)</option>
                                        </select>
                                    </div>

                                    <div id="calendar"></div>
                                    <div class="legend mt-3 text-center">
                                        <span class="badge bg-success">Available</span>
                                        <span class="badge bg-warning text-dark">Unavailable</span>
                                    </div>


                                    <div id="timeSlots" style="display:none; margin-top:20px;">
                                        <h6 class="fw-semibold mb-2 text-secondary">Available Time Slots</h6>
                                        <div id="timeSlotButtons" class="d-flex flex-wrap gap-2"></div>
                                    </div>

                                    <input type="hidden" name="class_schedule_id" id="selectedClassSchedule">
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit"
                                        class="btn btn-primary btn-lg px-5 py-2 shadow-sm rounded-pill">
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="col-lg-6">
                    <div class="register_info text-center text-lg-start ps-lg-5">
                        <h2 class="fw-bold text-white mb-3">Join Our Community</h2>
                        <p class="fs-5 text-white-50 mb-4">
                            Improve your German in a friendly environment! Whether you’re joining for fun hangouts or
                            structured classes,
                            you’ll get the support you need to grow your language skills.
                        </p>
                        <ul class="list-unstyled text-white-50 fs-6">
                            <li>✔ Interactive classes with native speakers</li>
                            <li>✔ Flexible schedules</li>
                            <li>✔ Both online and in-person sessions</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>



    {{-- Include Flatpickr CSS & JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        /* Optional: Style available dates and selected buttons */
        .flatpickr-day.available {
            background-color: #28a745 !important;
            color: white !important;
            border-radius: 50%;
        }

        .flatpickr-day.selected {
            background-color: #007bff !important;
            color: white !important;
            border-radius: 50%;
        }

        #timeSlotButtons button {
            border: 1px solid #007bff;
            background-color: white;
            color: #007bff;
            border-radius: 20px;
            padding: 6px 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        #timeSlotButtons button.selected {
            background-color: #007bff;
            color: white;
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

            // Handle type selection
            typeSelect.addEventListener('change', function () {
                const type = this.value;
                hangoutSection.style.display = 'none';
                classBookingSection.style.display = 'none';
                timeSlots.style.display = 'none';

                if (type === 'Hangout') {
                    fetch('/get-hangouts')
                        .then(res => res.json())
                        .then(data => {
                            const hangoutSelect = document.getElementById('hangoutSelect');
                            hangoutSelect.innerHTML = '<option value="">Select Hangout Date & Time</option>';
                            data.forEach(item => {
                                hangoutSelect.innerHTML += `<option value="${item.id}">${item.date} - ${item.time}</option>`;
                            });
                            hangoutSection.style.display = 'block';
                        });
                } else if (type === 'Classes') {
                    loadLevels();
                    classBookingSection.style.display = 'block';
                }
            });

            // Load levels dynamically
            function loadLevels() {
                fetch('/get-class-levels')
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

                fetch(`/get-class-dates/${selectedLevel}`)
                    .then(res => res.json())
                    .then(dates => {
                        availableDates = dates;
                        renderFlatpickrCalendar(availableDates);
                    });
            });

            // Initialize Flatpickr dynamically
            function renderFlatpickrCalendar(dates) {
                const calendarContainer = document.getElementById('calendar');
                calendarContainer.innerHTML = '<input type="text" id="calendarInput" class="form-control form-control-lg" placeholder="Select Date">';

                // Destroy existing Flatpickr instance before re-rendering
                if (calendarInstance) {
                    calendarInstance.destroy();
                }

                calendarInstance = flatpickr("#calendarInput", {
                    dateFormat: "Y-m-d",
                    minDate: "today",

                    // ✅ Ensures Flatpickr uses local date interpretation (no UTC offset)
                    enable: availableDates.map(date => {
                        const parts = date.split('-'); // e.g., "2025-12-07"
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

                        // ✅ Match local date string directly
                        if (availableDates.includes(localDateStr)) {
                            dayElem.classList.add('available');
                        }
                    }
                });

            }

            // Load available time slots for selected date
            function loadTimeSlots(level, date) {
                fetch(`/get-class-times/${level}/${date}`)
                    .then(res => res.json())
                    .then(times => showTimeSlots(times));
            }

            // Render time slots
            function showTimeSlots(times) {
                timeSlots.style.display = 'block';
                timeSlotButtons.innerHTML = '';

                if (times.length === 0) {
                    timeSlotButtons.innerHTML = '<p>No available time slots for this date.</p>';
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

    // 🟢 Clean up other fields depending on type
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

    // 🔒 Basic validation before sending
    if (!formData.get('type')) {
        alert('Please select a registration type.');
        return;
    }
  if (type === 'Hangout') {
    const hangoutId = document.getElementById('hangoutSelect').value;
    if (!hangoutId) {
        Swal.fire({
            title: 'Date & Time Required',
            text: 'Please choose a Coffee-Connect date and time before submitting.',
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

    fetch('/register-user', {
        method: 'POST',
        body: formData,
    })
        .then(res => res.json())
        .then(data => {
            Swal.fire({
                title: '🎉 Registration Successful!',
                text: 'You have successfully registered.',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ Refresh page after clicking OK
                    window.location.reload();
                }
            });

            this.reset();
            hangoutSection.style.display = 'none';
            classBookingSection.style.display = 'none';
            timeSlots.style.display = 'none';
        })
        .catch(err => {
            console.error('Error:', err);
            Swal.fire({
                title: 'Oops...',
                text: 'Something went wrong. Please try again later.',
                icon: 'error',
                confirmButtonText: 'Close'
            });
        });
});

        });
    </script>

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
