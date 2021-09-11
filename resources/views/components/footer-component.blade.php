@auth
@if(auth()->user()->hasRole("premium"))
<div class="card p-3 shadow border-0 premium m-auto text-white text-center">
  <h4 class="mb-3">
    Alope Premium
  </h4>
  <small>
    Terimakasih sudah membeli  paket <b>Alope Premium</b>. Jika ingin memberi dukungan lebih, silahkan kunjungi link saweria kami
    <div class="d-flex mt-4 justify-content-around">
      <a href="" class="btn btn-light px-4 btn-premium">
        <i class="fas fa-crown text-warning me-2"></i>
        Dashboard
      </a>
      <a href="" class="btn btn-light btn-premium px-4">
        Donasi Saweria
        <i class="fas fa-wallet text-warning ms-2"></i>
      </a>
    </div>
  </small>
</div>
@else
<div class="card p-3 shadow border-0 premium m-auto text-white text-center">
  <h4 class="mb-3">Alope Premium</h4>
  <small>
    Dengan <b>Rp 25.00</b> perbulan dapatkan akses belajar tanpa batas dengan membeli versi <b>ALOPE PREMIUM</b>.
    <a href="" class="btn btn-light px-4 btn-premium mt-4">
      <i class="fas fa-crown text-warning me-2"></i>
      Beli Alope Premium
    </a>
  </small>
</div>
@endif

@else
<div class="card p-3 shadow border-0 premium m-auto text-white text-center">
  <h4 class="mb-3">
    Alope Course
  </h4>
  <small>
    Ayo belajar bersama kami. Terdapat tutorial menarik seputar <b>Programming</b>. Jangan takut jika kalian masih pemula, karena kami mengajarkan dari tingkat dasar sampai menengah.
    <div class="d-flex mt-4 justify-content-around">
      <a href="{{route('register')}}" class="btn btn-light px-4 btn-premium">
        <i class="fas fa-user-plus text-warning me-2"></i>
        Registrasi Akun
      </a>
      <a href="{{route('login')}}" class="btn btn-light btn-premium px-4">
        Masuk Akun
        <i class="fas fa-sign-in-alt text-warning ms-2"></i>
      </a>
    </div>
  </small>
</div>
@endauth


<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#36275D" fill-opacity="1" d="M0,288L1440,160L1440,320L0,320Z"></path></svg>
<footer class="text-muted py-5">
  <div class="container-fluid">
    <div class="row text-white">
      <div class="col-md-4">
        <h5 class="">Alope</h5>
        <small class="mt-5"> &copy; Copyright by Ilham Hafidz</small>
      </div>
      <div class="col-md-6">
      </div>
      <div class="col-md-2">
        <h5> Sosial Media</h5>
        <div class="d-flex align-items-center justify-content-around">
          <a href="">
            <i class="fab fa-instagram">  </i>
          </a>
          <a href="">
            <i class="fab fa-facebook-f">  </i>
          </a>
          <a href="">
            <i class="fab fa-twitter">  </i>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>