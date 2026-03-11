@include('layouts.nav')
<div class="super_container">
    <section class="hero-section" style="background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.8)), url('/images/index_background.jpg'); background-size: cover; background-position: center; min-height: 40vh; display: flex; align-items: center; position: relative; overflow: hidden; padding-top: 20px; margin-top: 0;">
        <div class="container text-center text-white" style="z-index:2;">
            <h1 class="mb-3" style="font-size:clamp(2.2rem,4vw,3.5rem); font-weight:700; background: linear-gradient(45deg, #fff, #e0e7ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Join Our Community</h1>
            <p style="font-size:1.2rem; opacity:0.95;">Become part of a supportive, fun, and engaging German learning community!</p>
        </div>
    </section>

    <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe); min-height: 60vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-4 p-4">
                        <h3 class="mb-4 text-center" style="color:#1de9b6; font-weight:700;">Register & Join</h3>
                        <form method="POST" action="{{ route('community.register.submit') }}" class="modern-register-form">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="first_name" class="form-control" id="firstName" placeholder="First Name" required>
                                        <label for="firstName">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Last Name" required>
                                        <label for="lastName">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="phone_number" class="form-control" id="phone" placeholder="Phone Number">
                                        <label for="phone">Phone Number (Whatsapp)</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="postal_code" class="form-control" id="postal" placeholder="Postal Code">
                                        <label for="postal">Postal</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="house_number" class="form-control" id="house" placeholder="House Number">
                                        <label for="house">House</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City">
                                        <label for="city">City</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="country" class="form-control" id="country" placeholder="Country">
                                        <label for="country">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="gender" class="form-select" id="gender" required>
                                            <option value="" selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <label for="gender">Gender</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="date_of_birth" class="form-control" id="dob" placeholder="Date of Birth">
                                        <label for="dob">Date of Birth</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <select name="subscription_model" class="form-select" id="subscription" required>
                                            <option value="" selected>Select Subscription</option>
                                            <option value="1_month">Monthly (€10)</option>
                                            <option value="3_month">3 Months (€25)</option>
                                            <option value="6_month">6 Months (€50)</option>
                                            <option value="1_year">Yearly (€105)</option>
                                        </select>
                                        <label for="subscription">Subscription</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success w-100 py-2 stylish-btn">
                                        Register & Join
                                    </button>
                                </div>
                            </div>
                            @if(session('success'))
                                <div class="alert alert-success mt-3">{{ session('success') }}</div>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Registration Successful!',
                                            text: 'Thank you for registering. Please check your email for confirmation.',
                                            confirmButtonColor: '#1de9b6',
                                            confirmButtonText: 'OK'
                                        }).then(function() {
                                            window.location.href = '/';
                                        });
                                    });
                                </script>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($errors->has('email'))
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Duplicate Email',
                                            text: '{{ $errors->first('email') }}',
                                            confirmButtonColor: '#ef4444',
                                            confirmButtonText: 'OK'
                                        });
                                    });
                                </script>
                            @endif
                            @if($errors->has('phone_number'))
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Duplicate Phone Number',
                                            text: '{{ $errors->first('phone_number') }}',
                                            confirmButtonColor: '#ef4444',
                                            confirmButtonText: 'OK'
                                        });
                                    });
                                </script>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.chat-widget')
    @include('layouts.footer')
</div>

<style>
    .modern-register-form .form-control,
    .modern-register-form .form-select {
        border-radius: 1rem;
        border: 1.5px solid #e0e7ef;
        background: #f8fafc;
        font-size: 1.08rem;
        box-shadow: 0 2px 8px rgba(59,130,246,0.04);
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .modern-register-form .form-control:focus,
    .modern-register-form .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59,130,246,0.10);
        background: #fff;
    }
    .modern-register-form .form-floating > label {
        color: #94a3b8;
        font-weight: 500;
        left: 1rem;
    }
    .modern-register-form .form-floating > .form-control:focus ~ label,
    .modern-register-form .form-floating > .form-control:not(:placeholder-shown) ~ label,
    .modern-register-form .form-floating > .form-select:focus ~ label,
    .modern-register-form .form-floating > .form-select:not([value=""]) ~ label {
        color: #3b82f6;
        font-weight: 600;
    }
    .modern-register-form .form-floating {
        position: relative;
    }
    .stylish-btn {
        background: linear-gradient(90deg, #1de9b6 60%, #06b6d4 100%) !important;
        font-weight: bold;
        font-size: 1.15rem;
        border-radius: 1rem;
        box-shadow: 0 4px 18px rgba(30,233,182,0.13);
        border: none;
        transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
    }
    .stylish-btn:hover {
        background: linear-gradient(90deg, #06b6d4 60%, #1de9b6 100%) !important;
        box-shadow: 0 8px 32px rgba(59,130,246,0.13);
        transform: translateY(-2px) scale(1.01);
    }
</style>


