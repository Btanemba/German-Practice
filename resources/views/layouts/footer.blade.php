{{-- <footer class="footer">
    <div class="footer_body">
        <div class="container">
            <div class="row">

                <!-- Newsletter -->
                <div class="col-lg-3 footer_col">
                    <div class="newsletter_container d-flex flex-column align-items-start justify-content-end">
                        <div class="footer_logo mb-auto"><a href="#">Lingua</a></div>
                        <div class="footer_title">Subscribe</div>
                        <form action="{{ route('subscribe') }}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Email" required>
                            <button type="submit">→</button>
                        </form>
                    </div>
                </div>

                <!-- About -->
                <div class="col-lg-2 offset-lg-3 footer_col">
                    <div>
                        <div class="footer_title">About Us</div>
                        <ul class="footer_list">
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Help & Support -->


                <!-- Privacy -->
                <div class="col-lg-2 footer_col clearfix">
                    <div>
                        <div class="footer_title">Privacy & Terms</div>
                        <ul class="footer_list">
                            <li><a href="#">Community Guidelines</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer> --}}

<!-- Add SweetAlert2 (in your layout or before </body>) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<footer class="footer">
    <div class="footer_body py-5">
        <div class="container">
            <div class="row">

                <!-- Newsletter -->
                <div class="col-lg-4 col-md-6 footer_col mb-4">
                    <div class="newsletter_container text-start">
                        <div class="footer_logo mb-3">
                            <a href="#" class="text-decoration-none fs-3 fw-bold text-primary">LGWT</a>
                        </div>
                        <div class="footer_title mb-2 fw-semibold">Subscribe to our Newsletter</div>

                        <form id="subscribeForm" action="{{ route('subscribe') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                <button type="submit" class="btn btn-primary px-4">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- About -->
                 <div class="col-lg-2 offset-lg-3 footer_col">
                    <div>
                        <div class="footer_title">About Us</div>
                        <ul class="footer_list">
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Privacy -->
                <div class="col-lg-2 footer_col clearfix">
                    <div>
                        <div class="footer_title">Privacy & Terms</div>
                        <ul class="footer_list">
                            <li><a href="#">Community Guidelines</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const subscribeForm = document.getElementById('subscribeForm');

    subscribeForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(subscribeForm);
        const token = document.querySelector('input[name="_token"]').value;


        Swal.fire({
            title: 'Please wait...',
            text: 'Processing your subscription.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const response = await fetch(subscribeForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: formData
            });

            Swal.close();

            if (response.ok) {
                subscribeForm.reset();
                Swal.fire({
                    title: '🎉 Subscribed!',
                    text: 'Thank you for subscribing to LGWT updates.',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Something went wrong. Please try again.',
                    icon: 'error',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Close'
                });
            }
        } catch (error) {
            Swal.close();
            Swal.fire({
                title: 'Error!',
                text: 'Unable to send your subscription. Check your internet connection.',
                icon: 'error'
            });
        }
    });
});
</script>
