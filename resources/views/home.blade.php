@extends('layouts.app')

@section('title', 'Beranda - HIPMI PT UPI Cibiru')

@section('content')
  <!-- SECTION 1: TAMPILAN PERTAMA -->
  <section class="section-pertama">
    <div class="container position-relative">
      <div class="row align-items-center">
        <div class="col-md-6 text-black">
          <h1 class="hipmi-text">HIPMI PT UPI<br><span class="text-warning">CIBIRU</span></h1>
          <p class="my-3 text-dark">
            HIPMI PT UPI Kampus di Cibiru adalah organisasi mahasiswa yang berfokus pada pengembangan kewirausahaan.
            Kami menjadi wadah bagi para calon pengusaha untuk mendapatkan pelatihan bisnis, membangun jejaring yang
            luas, serta bimbingan praktis untuk mengubah ide menjadi usaha nyata sejak di bangku kuliah.
          </p>
          <a href="#" class="btn btn-custom-gradient px-4 py-2 rounded-pill fw-bold">Join Now</a>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <div class="foto-penggabungan">
            <img src="{{ asset('images/Vector.png') }}" alt="Vector" class="vector-shape" />
            <img src="{{ asset('images/foto-hipmi.png') }}" alt="Foto Tim" class="foto-hipmi" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 2: VIDEO PROFILE -->
  <section class="video-profile-section py-4">
    <div class="container my-3">
      <div class="row align-items-center">  
        <div class="col-lg-6 mb-6 mb-lg-0">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/IiKhNd18VH8?si=_3Zzhv1xlvEFWsXo" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-lg-6 ps-lg-5">
          <h3 class="video-who-text">Who we are?</h3>
          <h2 class="video-profile-text">Video Profile</h2>
          <p class="text-secondary mb-4">
            With the spirit of Empowering Inclusivity, HIPMI PT UPI CIBIRU is here to create a more inclusive space,
            empower every potential young entrepreneur, and embrace diversity as a strength in building a sustainable
            business ecosystem.
          </p>
          <a href="https://www.instagram.com/hipmiupi.kamdacibiru/" class="btn btn-custom-gradient px-4 py-2 rounded-pill fw-bold">See more</a>
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

    <!-- SECTION 3 - Program  -->
    <section class="program-section py-5">
        <div class="program-bg p-5">
            <div class="container text-center">
                <h2 class="video-profile-text">Our Program</h2>
                <div class="row g-4">
                    @foreach ($programs as $program)
                        @component('components.flip-card', [
                            'bg' => $program['bg'],
                            'icon' => $program['icon'],
                            'title' => $program['title'],
                            'description' => $program['description']
                        ])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4 - Hipmi Info -->
    <section class="hipmi-info py-5">
        <div class="container text-center">
            <h2 class="video-profile-text">HIPMI Info</h2>
            <div class="row g-4">
                @foreach ($infoCards as $card)
                    @component('components.info-card', [
                        'bg' => $card['bg'],
                        'icon' => $card['icon'],
                        'title' => $card['title'],
                        'route' => $card['route']
                    ])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 5 - Artikel -->
    <section class="artikel-info">
        <div class="container py-5">
            <h2 class="video-profile-text text-center mb-4">Artikel</h2>
            <div class="carousel-container">
                <!-- Navigasi -->
                <button class="nav-button nav-prev" onclick="moveSlide(-1)">&#8249;</button>
                <button class="nav-button nav-next" onclick="moveSlide(1)">&#8250;</button>

                <div class="carousel-track" id="carouselTrack">
                @foreach ($articles as $article)
                    <x-article-card
                        :image="$article['image']"
                        :title="$article['title']"
                        :link="$article['link']"
                    />
                @endforeach
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
