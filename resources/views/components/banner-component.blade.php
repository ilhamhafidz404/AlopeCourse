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
          <a href="https://saweria.co/overlays/qr?streamKey=903b9226e51e880d78669ecae0be3f40&backgroundColor=%235562ccFF&barcodeColor=%23e6ececFF&username=alope" class="btn btn-light btn-premium px-4" target="_blank">
            Donasi Saweria
            <i class="fas fa-wallet text-warning ms-2"></i>
          </a>
        </div>
      </small>
    </div>
  @elseif(auth()->user()->hasRole("banned"))
    <div class="card p-3 shadow border-0 premium m-auto text-white text-center">
      <h4 class="mb-3">
        Akun Anda di Banned
      </h4>
      <small>
        Saat ini akun anda di <b>Banned</b> dari kelas Kami. Silahkan hubungi Admin jika merasa anda tidak melakukan kesalahn
        <div class="d-flex mt-4 justify-content-around">
          <a href="" class="btn btn-light px-4 btn-premium">
            <i class="fas fa-crown text-warning me-2"></i>
            Hubungi Admin
          </a>
        </div>
      </small>
    </div>
  @else
    <div class="card p-3 shadow border-0 premium m-auto text-white text-center">
      <h4 class="mb-3">Alope Premium</h4>
      <small>
        Dengan <b>Rp 25.00</b> perbulan dapatkan akses belajar tanpa batas dengan membeli versi <b>ALOPE PREMIUM</b>.
        <br>
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