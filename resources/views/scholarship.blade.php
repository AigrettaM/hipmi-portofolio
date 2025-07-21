<x-layouts.user-side-layout>

    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="position-relative">
        <img src="{{ asset('images/yellow-fluid.png') }}" alt="">
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h1 class="hipmi-text text-center fs-1">Scholarship</h1>
            <h6 class="text-warning fw-bold text-center">Get your chance!</h6>
        </div>
    </div>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 gy-4">
                @foreach ($scholarshipCards as $card)
                    @component('components.scholarship-bootcamp-card', [
                        'image' => $card['image'],
                        'name' => $card['name'],
                        'desc' => $card['desc']
                    ])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.user-side-layout>
