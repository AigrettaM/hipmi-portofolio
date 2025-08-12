<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'HIPMI PT UPI Cibiru')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />

  <style>
    /* Loader Overlay */
    #page-loader {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 1;
        transition: opacity 0.4s ease;
    }
    #page-loader.hidden {
        opacity: 0;
        pointer-events: none;
    }
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }
  </style>
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<body>

  <!-- Loader -->
  <div id="page-loader">
      <div class="spinner-border text-success" role="status">
          <span class="visually-hidden">Loading...</span>
      </div>
  </div>

  @include('components.navbar')

  <main>
    @yield('content')
  </main>

  @include('components.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
  <script>
    // Saat halaman selesai load → sembunyikan loader
    window.addEventListener('load', () => {
        document.getElementById('page-loader').classList.add('hidden');
    });

    // Saat klik link internal → tampilkan loader lagi
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(e) {
            let url = this.getAttribute('href');
            if (url && !url.startsWith('#') && !url.startsWith('javascript:') && this.target !== '_blank') {
                document.getElementById('page-loader').classList.remove('hidden');
            }
        });
    });
  </script>
  @stack('scripts')
</body>
</html>
