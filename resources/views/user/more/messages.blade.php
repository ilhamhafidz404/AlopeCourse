<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title> - Alope</title>
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
          <div class="col-md-8">
            <h1 class="display-2 text-white text-uppercase">
              Pesan
            </h1>
            @if($messages->count() >=1)
            <p class="text-white">
              Wow, ternyata ada yang memberi kamu pesan nih.
            </p>
            @else
            <p class="text-white">
              hmmmm kayaknya kota pesan kmu kosong.
            </p>
            @endif
            <p class="invisible">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, aliquid, eum? Et ab dolorem similique maiores iure, nihil odio, autem reiciendis enim officia, ex numquam officiis eius? Et quia, nesciunt.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid" style="margin-top:-200px">
      <div class="card">
        <div class="card-header">
          <h2>
            Kota Pesan Kamu
            <span class="badge bg-danger">
              {{$messageCount}}
            </span>
          </h2>
        </div>
        <div class="card-body">
          @foreach($messages as $message)
          <div class="card p-3 shadow">
            <div class="card-header">
              {{$message->subject}}
            </div>
            <div class="card-body">
              {{$message->message}}
            </div>
          </div>
          @endforeach
          {{$messages->links()}}
        </div>
      </div>
    </div>
  </div>
  @if(auth::check() && !auth()->user()->email_verified_at)
  <div class="alert alert-danger position-fixed bottom-0 w-100 m-0 p-2" style="z-index: 1000">
    <h5 class="text-center mb-0">
      Email anda belum di verifikasi
      <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
          <h5 class="mb-0">Verifikasi sekarang</h5>
        </button>.
      </form>
    </h5>
  </div>
  @endif

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