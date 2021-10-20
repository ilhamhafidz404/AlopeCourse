<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Premium - Alope</title>
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
    .hubungiKami::before{
      content: '';
      width: 100px;
      height: 6px;
      border-radius: 15px;
      background: rgba(255, 255, 255, 0.7);
      position: absolute;
      left: 10px;
      bottom: 0;
      transition: 0.3s;
    }
    .hubungiKami:hover::before{
      content: '';
      width: calc(100% - 20px);
      height: 20px;
      background: rgba(255, 255, 255, 0.5);
      left: 20px;
    }
    .hubungiKami{
      color: #fff !important;
    }
  </style>
</head>

<body>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <x-navbar-component></x-navbar-component>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('template')}}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row mt-5">
          <div class="col-md-8 mt-4">
            <h1 class="display-2 text-white text-uppercase">
              ALOPE PREMIUM
            </h1>
            <p class="text-white mt-0 mb-3" style="white-text: nowrap">
              Silahkan isi bukti kalau anda sudah membayar paket pada kami. Setelah mengirim Form, klik button "Hubungi Admin" untuk mendapat notice dari kami lebih cepat lagi.
            </p>
            <p class="text-white mt-0 mb-5">
              Jika kalian sudah mengirim form pembayaran ini, isi juga form bukti pembelian yang akan tergenerate setelah mengirim formulir.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="card p-3" style="margin-top: -100px">
        <div class="row">
          <div class="col-md-5">
            <div class="alert bg-gradient-success text-white">
              Silahkan 
              <a href="{{route('touch-admin')}}" target="_blank" class="fw-bold hubungiKami position-relative">
                <i class="fab fa-whatsapp ml-1"></i> Hubungi Admin 
              </a> 
              untuk proses yang lebih cepat.
            </div>
            <div class="card mt-4">
              <div class="card-header">
                <i class="fas fa-credit-card me-2 text-muted fs-3"></i>
                <span class="fw-bold">Via Rekening Bank</span>
                <small class="d-block" style="font-size: 10px">Gunakan transfer bank untuk transaksi</small>
              </div>
              <div class="card-body p-2">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between">
                    <div>
                      <img src="{{asset('image/payment/bca.svg')}}" width="50px" class="me-2">
                      BCA
                    </div>
                    <small>
                      norek BCA saya
                    </small>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <div>
                      <img src="{{asset('image/payment/mandiri.svg')}}" width="50px" class="me-2">
                      MANDIRI
                    </div>
                    <small>
                      norek MANDIRI saya
                    </small>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card mt-3">
              <div class="card-header">
                <i class="fas fa-wallet me-2 text-muted fs-3"></i>
                <span class="fw-bold">Via E-Money Transfer</span>
                <small class="d-block" style="font-size: 10px">Gunakan E-wallet untuk transaksi</small>
              </div>
              <div class="card-body p-2">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between">
                    <div>
                      <img src="{{asset('image/payment/gopay.svg')}}" width="30px" class="me-2">
                      GoPay
                    </div>
                    <small>
                      Nomor Gopay saya
                    </small>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <div>
                      <img src="{{asset('image/payment/dana.svg')}}" width="30px" class="me-2">
                      Dana
                    </div>
                    <small>
                      Nomor Dana saya
                    </small>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <div>
                      <img src="{{asset('image/payment/link-aja-x.svg')}}" width="30px" class="me-2">
                      Link Aja
                    </div>
                    <small>
                      Nomor Link Aja saya
                    </small>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <div>
                      <img src="{{asset('image/payment/ovo.svg')}}" width="30px" class="me-2">
                      OVO
                    </div>
                    <small>
                      Nomor OVO saya
                    </small>
                  </li>
                </ul>
              </div>
            </div>
            <a href="/" class="btn btn-danger">
              Kembali
            </a>
          </div>
          <div class="col-md-7">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdkMcMDIty2z9WjnDyoJE4ijW1E0X6s82sVuFbB4tlxot3TPQ/viewform?embedded=true" height="900" width="100%" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe>
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

</html>