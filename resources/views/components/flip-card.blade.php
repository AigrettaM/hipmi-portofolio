<div class="col-md-4">
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front" style="background-image: url('{{ asset($bg) }}');">
        <div class="overlay">
          <img src="{{ asset($icon) }}" class="icon-center" />
          <h3 class="text-white">{{ $title }}</h3>
        </div>
      </div>
      <div class="flip-card-back d-flex flex-column justify-content-center align-items-center text-center p-4">
        <h3 class="text-white mb-3">{{ $title }}</h3>
        <p class="text-white">{{ $description }}</p>
      </div>
    </div>
  </div>
</div>
