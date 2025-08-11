@extends('layouts.app')

@section('title', 'Beranda - HIPMI PT UPI Cibiru')

@section('content')
    <div class="position-relative">
       <img src="{{ asset('images/yellow-fluid.png') }}" alt="" style="width: 340px">
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h1 class="hipmi-text text-center fs-1">Achievers</h1>
            <h6 class="text-warning fw-bold text-center">Practice your skills</h6>
        </div>
    </div>

    <section class="achievers-section bg-white mb-4 pt-1 pb-5">
        <div class="container">
            <div class="carousel-container">
                <!-- Navigasi -->
                <button class="nav-button nav-prev" onclick="moveSlide(-1)">&#8249;</button>
                <button class="nav-button nav-next" onclick="moveSlide(1)">&#8250;</button>

                <div class="carousel-track" id="carouselTrack">
                    @foreach ($achievers as $achiever)
                        <x-carousel
                            image="{{ $achiever }}"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
