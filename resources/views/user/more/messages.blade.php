<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Message {{auth()->user()->username}}</title>
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
    .message::before{
      content: '';
      position: absolute;
      border-left: 13px solid transparent;
      border-right: 13px solid transparent;
      border-bottom: 25px solid #2dce8a;
      left: -25px;
      transform: rotate(-90deg);
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
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('template')}}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row mt-5">
          <div class="col-md-8">
            @if($messages->count() >=1)
              <h1 class="display-2 text-white text-uppercase">
                Pesan
              </h1>
              @else
              <h1 class="display-2 text-white text-uppercase">
                Tidak ada pesan untukmu saat ini
              </h1>
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
      <div class="row">
        <div class="col-md-9 grid">
          @foreach($messages as $message)
            <div class="card shadow grid-item">
              <div class="card-header bg-gradient-success text-white message">
                {{$message->subject}}
              </div>
              <div class="card-body pr-5">
                {{$message->message}}
              </div>
            </div>
            <br>
          @endforeach
          {{$messages->links()}}
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container mt-5">
    <div class="row">
      <div class="col-xl-5">
        <div class="card card-profile">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{asset('storage/profile/'.$user->profile)}}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-body pt-5">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">22</span>
                    <span class="description">Friends</span>
                  </div>
                  <div>
                    <span class="heading">
                      {{$like}}yf
                    </span>
                    <span class="description">Like</span>
                  </div>
                  <div>
                    <span class="heading">89</span>
                    <span class="description">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3">
                {{$user->username}}
                @if($user->hasRole('premium'))
                <i class="fas fa-crown text-yellow ms-2"></i>
                @endif
              </h5>
              <div class="h5 font-weight-300">
                Bergabung pada {{$user->created_at->format('M Y')}}
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>University of Computer Science
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-7">
        <x-mini-nav-component></x-mini-nav-component>
      </div>
    </div>
  </div>

  {{-- @if(auth::check() && !auth()->user()->email_verified_at)
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
  @endif --}}

  <x-footer-component></x-footer-component>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/js/app.js"></script>
  <script src="/js/script.js"></script>

  {{-- Masonry --}}
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script>
    var elem = document.querySelector('.grid');
    var msnry = new Masonry( elem, {
      // options
      itemSelector: '.grid-item',
      columnWidth: 100
    });

    // element argument can be a selector string
    //   for an individual element
    var msnry = new Masonry( '.grid', {
      // options
    });
  </script>

  <script src="{{asset('template/')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{asset('template/')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="{{asset('template/')}}/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>