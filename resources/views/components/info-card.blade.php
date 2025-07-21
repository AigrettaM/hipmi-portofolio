<div class="col-md-4">
  <div class="info-card">
    <div class="info-card-isi" style="background-image: url('{{ asset($bg) }}');">
        <div class="overlay">
            <img src="{{ asset($icon) }}" class="icon-center" />
            <h3 class="text-white">{{ $title }}</h3><br>
            <a href="{{ route($route) }}" class="btn btn-custom-kuning px-4 py-2 rounded-pill fw-semibold">See more</a>
        </div>
    </div>
  </div>
</div>
