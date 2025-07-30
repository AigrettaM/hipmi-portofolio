<footer class="bg-white border-top pt-5 footer-hipmi">
  <div class="container">
    <div class="row text-center text-md-start">
      <!-- Logo -->
      <div class="col-md-4 mb-4">
        <img src="{{ asset('images/logo-hd.png') }}" alt="Logo HIPMI">
      </div>

      <!-- Navigation -->
      <div class="col-md-4 mb-4">
        <h5 class="video-profile-text">Navigation</h5>
        <ul class="list-unstyled">
          <li><a href="{{ route('home') }}" class="navigation-text-btn">Home</a></li>
          <li><a href="" class="navigation-text-btn">About</a></li>
          <li><a href="" class="navigation-text-btn">Hipmi Info</a></li>
          <li><a href="" class="navigation-text-btn">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-4 mb-4">
        <h5 class="video-profile-text">Contact Info</h5>
        <div class="mb-2">
          <a href="https://instagram.com/hipmiupi.kamdacibiru" target="_blank" class="text-success fs-5 me-3" title="Instagram">
            <img src="{{ asset('images/icons/instagram-logo.png') }}" alt="instagram-logo" class="instagram-footer">
          </a>
          <a href="mailto:hipmiupicibiru@gmail.com" class="text-success fs-5 me-3" title="Email">
            <img src="{{ asset('images/icons/email-logo.png') }}" alt="email-logo" class="email-footer">
          </a>
          <a href="https://www.tiktok.com/@hipmi.upicibiru" target="_blank" class="text-success fs-5 me-3" title="TikTok">
            <img src="{{ asset('images/icons/tiktok-logo.png') }}" alt="tiktok-logo" class="tiktok-footer">
          </a>
          <a href="https://wa.me/6285172228224" target="_blank" class="text-success fs-5" title="WhatsApp">
            <img src="{{ asset('images/icons/whatsaap-logo.png') }}" alt="whatsapp-logo" class="whatsapp-footer">
          </a>
        </div>
        <p class="navigation-text-btn">
          Jl. Pendidikan No.15, Cibiru Wetan, Kec. Cileunyi,<br />
          Kabupaten Bandung, Jawa Barat 40625
        </p>
      </div>
    </div>

    <hr>
    <div class="text-center pb-3">
      <small class="text-muted">
        Copyright © {{ now()->year }} HIPMI PT UPI CIBIRU - All rights reserved.
      </small>
    </div>
  </div>
</footer>
