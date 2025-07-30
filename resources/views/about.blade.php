@extends('layouts.app')

@section('title', 'Beranda - HIPMI PT UPI Cibiru')

@section('content')
    <div class="position-relative">
        <img src="{{ asset('images/yellow-fluid.png') }}" alt="" style="width: 340px">
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h1 class="hipmi-text text-center fs-1">About</h1>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative pt-3 pb-4 bg-white">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-md-7 d-flex justify-content-center">
                    <img src="{{ asset('images/foto-gabung-2.png') }}" alt="">
                </div>
                <div class="col-md-5 text-black">
                    <h1 class="hipmi-text">HIPMI PT UPI<br><span class="text-warning">CIBIRU</span></h1>
                    <p class="my-3 text-dark">
                        HIPMI PT UPI Kampus di Cibiru adalah organisasi mahasiswa yang berfokus pada pengembangan kewirausahaan.
                        Kami menjadi wadah bagi para calon pengusaha untuk mendapatkan pelatihan bisnis, membangun jejaring yang
                        luas, serta bimbingan praktis untuk mengubah ide menjadi usaha nyata sejak di bangku kuliah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: VISION & MISSION -->
    <section class="vision-hipmi py-4">
        <div class="container my-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="our-vission text-success">Our Vision</h2>
                    <div class="d-flex align-items-center mb-4 mission-item">
                        <img src="{{ asset('images/icons/vision.png') }}" alt="Vision Icon" class="icon-img">
                        <p class="mb-0">
                        Menjadi organisasi kewirausahaan yang mampu mengembangkan potensi kewirausahaan mahasiswa dan melahirkan pengusaha muda yang berdaya saing tinggi.
                        </p>
                    </div>

                    <h2 class="our-vission text-warning mb-3">Our Mission</h2>
                    <div class="d-flex align-items-center mb-3 mission-item">
                        <img src="{{ asset('images/icons/mission1.png') }}" alt="Mission Icon 1" class="icon-img">
                        <p class="mb-1">Mendorong jiwa kewirausahaan di kalangan mahasiswa</p>
                    </div>
                    <div class="d-flex align-items-center mb-3 mission-item">
                        <img src="{{ asset('images/icons/mission2.png') }}" alt="Mission Icon 2" class="icon-img">
                        <p class="mb-1">Meningkatkan kompetensi bisnis mahasiswa agar siap menghadapi dunia usaha.</p>
                    </div>
                    <div class="d-flex align-items-center mb-3 mission-item">
                        <img src="{{ asset('images/icons/mission3.png') }}" alt="Mission Icon 3" class="icon-img">
                        <p class="mb-1">Menjalin kemitraan dengan pengusaha, industri, dan pemerintah untuk membuka peluang lebih luas.</p>
                    </div>
                </div>

                <div class="col-md-6 text-center mt-4 mt-md-0">
                    <img src="{{ asset('images/foto-gabung.png') }}" alt="Foto Gabungan HIPMI" class="vision-img img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Members of Team  -->
    <section class="program-section py-5">
        <div class="program-bg p-5">
            <div class="container text-center">
                <h2 class="video-profile-text">Our Team</h2>
                <div class="carousel-container">
                    <!-- Navigasi -->
                    <button class="nav-button nav-prev" onclick="moveSlide(-1)">&#8249;</button>
                    <button class="nav-button nav-next" onclick="moveSlide(1)">&#8250;</button>

                    <div class="carousel-track" id="carouselTrack">
                    @foreach ($members as $member)
                        <x-member-card
                            :image="$member['image']"
                            :name="$member['name']"
                            :position="$member['position']"
                        />
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentPosition = 0;
        const track = document.getElementById('carouselTrack');
        const cardWidth = 316;

        function moveSlide(direction) {
            const maxScroll = track.scrollWidth - track.clientWidth;
            currentPosition += direction * cardWidth;

            if (currentPosition < 0) currentPosition = 0;
            if (currentPosition > maxScroll) currentPosition = maxScroll;

            track.style.transform = `translateX(-${currentPosition}px)`;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
