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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/mystyle.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('template/')}}/assets/css/argon.css?v=1.2.0" type="text/css">

  <style>
    body{
      font-family: 'Poppins', sans-serif;
    }
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
    @media only screen and (max-width: 767px) {
      .reedemPlatinum {
        display: none;
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
    <div class="container-fluid" style="margin-top: -250px">
      <div class="row">
        <div class="col-md-8 text-white">
          <h1 class="fs-1 text-white fw-bold">Hello, {{auth()->user()->name}}</h1>
          <p>
            Ayo bergabung dalam ALOPE PREMIUM untuk mendapatkan akses ke semua tutorial dan source code yang ada. <span class="fw-bold text-yellow">
              this is Very Great
            </span>
          </p>
        </div>
        <div class="col-md-4">
          <div class="position-absolute left-0 right-0 reedemPlatinum" style="top: -120px;">
            <h3 class="text-white text-center">Beli Paket Premium</h3>
            <div class="card border-0 shadow p-3 text-center platinum mx-auto" style="width: 230px">
              <h2 class="text-white">PLATINUM</h2>
              <h3 class=" mt-3 text-white">
                <sup>Rp.</sup>
                <span class="fw-bold" style="font-size: 50px">
                  100
                </span>
                <sub class="fw-bold mb-2">
                  .000
                </sub>
              </h3>
              <a href="{{route('invoice')}}" class="btn btn-neutral mt-4 btn_price">
                Beli Akses
              </a>
            </div>
          </div>
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
        <div class="mt-3 px-5">
          <div class="d-flex mb-3">
            <div class="me-4 ">
              <h4 class="fs-1 text-purple">
                1.
              </h4>
            </div>
            <div class="d-flex align-items-center">
              <p>
                Siapkan dan pastikan anda mepunyai akun E-Wallet, baik Go-Pay, OVO ataupun Link Aja. Atau jika kalian tidak punya E-Wallet juga bisa menggunakan Rekening BANK apapun yang bisa transfer ke Rekening BANK saya (Mandiri, BCA dan BRI).
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1 text-purple">
                2.
              </h4>
            </div>
            <div class="d-flex align-items-center">
              <p>
                Pilih paket yang bakal anda pilih, untuk sekarang anda bisa memilih paket <a href="" class="linkDesc">Silver</a>, <a href="" class="linkDesc">Gold</a>, <a href="" class="linkDesc">Platinum</a>. Paket ini menentukan seberapa lama anda menjadi user Premium dan seberapa banyak fitur yang bisa anda jelajahi.
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1 text-purple">
                3.
              </h4>
            </div>
            <div class="d-flex align-items-center">
              <p>
                Lakukan pembayaran dengan nominal sesuai paket yang anda pilih. Pembayaran bisa melalui transfer Bank atau E-wallet. Jika sudah melakukan pembayaran silahkan <b>foto bukti pembayaran</b>.
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1 text-purple">
                4.
              </h4>
            </div>
            <div class="d-flex align-items-center">
              <p>
                Kirimkan foto bukti pembayaran tadi melalui <a href="" class="linkDesc">WhatsApp</a> yang tercantum. Silahkan tunggu beberapa menit untuk mendapatkan voucher token reedemnya dari Customer Service kami.
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-4">
              <h4 class="fs-1 text-purple">
                5.
              </h4>
            </div>
            <div class="d-flex align-items-center">
              <p>
                Masukan kode reedem ke <a href="" class="linkDesc">Reedem Token</a>. Dan selamat anda sekarang sudah menjadi ALOPE PREMIUM MEMBER. <span class="text-warning fw-bold">Have Fun</span>.
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