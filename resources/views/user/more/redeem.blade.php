<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Alope -Reedem</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/mystyle.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('template/')}}/assets/css/argon.css?v=1.2.0" type="text/css">

  <style>
@media only screen and (max-width: 1363px) {
    svg.footer-svg {
      margin-top: -350px !important;
    }
    footer {
      margin-top: -57px !important;
    }
  }
@media only screen and (max-width: 1139px) {
    svg.footer-svg {
      margin-top: -300px !important;
    }
  }
@media only screen and (max-width: 917px) {
    svg.footer-svg {
      margin-top: -250px !important;
    }
  }
@media only screen and (max-width: 688px) {
    svg.footer-svg {
      margin-top: -200px !important;
    }
  }
@media only screen and (max-width: 455px) {
    svg.footer-svg {
      display: none;
    }
  }
  </style>
</head>
<body>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <x-navbar-component></x-navbar-component>
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('template')}}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
    </div>
    <div class="container-fluid" style="margin-top: -300px">
      <div class="row">
        <div class="col-md-8 text-white">
          <h1 class="fs-1 text-white fw-bold">Hello, {{auth()->user()->name}}</h1>
          <p>
            Ayo bergabung dalam ALOPE PREMIUM untuk mendapatkan akses ke semua tutorial dan source code yang ada. <span class="fw-bold text-yellow">
              this is Very Great
            </span>
          </p>
        </div>
      </div>
      <div class="card mt-5">
        <div class="card-body">
          <form action="{{route('getPremium')}}" method="POST" class="row">
            @csrf
            <label for="token" class="form-label">
              Redeem Token
            </label>
            <div class="col-md-10">
              <input type="text" class="form-control me-3" name="token" id="token" placeholder="Redeem disini...">
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary">Redeem</button>
            </div>
          </form>
        </div>
      </div>
      <div class="card mt-3 p-4">
        <h3>Cara Mendapatkan Kode Redeem Premium</h3>
        <div class="mt-3">
          <div class="d-flex mb-3">
            <div class="me-4 ">
              <h4 class="fs-1">
                1
              </h4>
            </div>
            <div>
              <p>
                Siapkan dan Pastikan anda mepunyai akun E-Wallet, baik Go-Pay, OVO ataupun Link Aja. Atau jika kalian tidak punya E-Wallet juga bisa menggunakan Rekening BANK apapun yang bisa transfer ke Rekening BANK saya (Mandiri, BCA dan BRI).
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1">
                2
              </h4>
            </div>
            <div>
              <p>
                Pilih paket yang bakal anda pilih, untuk sekarang anda bisa memilih paket <a href="" class="linkDesc">Silver</a>, <a href="" class="linkDesc">Gold</a>, <a href="" class="linkDesc">Platinum</a>. Paket ini menemtukan seberapa lama anda menjadi user Premium dan seberapa banyak fitur yang bisa anda jelajahi.
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1">
                3
              </h4>
            </div>
            <div>
              <p>
                Lakukan pembayaran dengan nominal sesuai paket yang anda pilih. Pembayaran bisa melalui transfer Bank atau E-wallet. Jika sudah melakukan pembayaran silahkan <b>Foto Bukti Pembayaran</b>.
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1">
                4
              </h4>
            </div>
            <div>
              <p>
                Kirimkan Foto Bukti Pembayaran tadi melalui <a href="" class="linkDesc">WhatsApp</a> yang tercantum. Silahkan tunggu beberapa menit untuk mendapatkan Voucher Token Reedemnya dari Customer Service kami.
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1">
                5
              </h4>
            </div>
            <div>
              <p>
                Masukan kode Reedem ke <a href="" class="linkDesc">Reedem Token</a>. Dan selamat anda sekarang sudah menjadi ALOPE PREMIUM MEMBER. <span class="text-warning fw-bold">Have Fun</span>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-footer-component></x-footer-component>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/js/app.js"></script>
  <script src="/js/script.js"></script>

  <script src="{{asset('template/')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="{{asset('template/')}}/assets/js/argon.js?v=1.2.0"></script>
</body>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</html>