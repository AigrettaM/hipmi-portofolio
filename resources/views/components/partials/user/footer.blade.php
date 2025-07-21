<footer class="bg-white pt-4 pb-3 text-dark">
    <div class="container">
        <div class="row text-center text-md-start align-items-center gy-4">

            <!-- Logo -->
            <div class="col-md-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo HIPMI" class="img-fluid" width="125">
            </div>

            <!-- Navigation -->
            <div class="col-md-4">
                <h5 class="fs-3 fw-bold text-primary mb-2">Navigation</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-decoration-none text-muted d-block mb-1">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-decoration-none text-muted d-block mb-1">About</a></li>
                    <li><a href="#" class="text-decoration-none text-muted d-block mb-1">Hipmi Info</a></li>
                    <li><a href="{{ route('contact') }}" class="text-decoration-none text-muted d-block">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-5">
                <h5 class="fs-3 fw-bold text-primary mb-3">Contact Info</h5>
                <div class="mb-4">
                    <a href="#" class="text-white rounded-circle fs-6 px-2 py-1 me-3 bg-primary"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white rounded-circle fs-6 px-2 py-1 me-3 bg-primary"><i class="bi bi-envelope-fill"></i></a>
                    <a href="#" class="text-white rounded-circle fs-6 px-2 py-1 me-3 bg-primary"><i class="bi bi-tiktok"></i></a>
                    <a href="#" class="text-white rounded-circle fs-6 px-2 py-1 bg-primary"><i class="bi bi-whatsapp"></i></a>
                </div>
                <p class="mb-0 text-muted">Jl. Pendidikan No.15, Cibiru Wetan, Kec. Cileunyi, <br>Kabupaten Bandung, Jawa Barat 40625</p>
            </div>

        </div>

        <hr class="my-3">

        <!-- Copyright -->
        <div class="text-center small py-3">
            Copyright © {{ date('Y') }} HIPMI PT UPI CIBIRU - All rights reserved.
        </div>
    </div>
</footer>
