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
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('template')}}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center;">
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
              hmmmm kayaknya kotak pesan kmu kosong.
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
            Kotak Pesan Kamu
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

  <div class="container mt-5">
    <div class="row">
      <div class="col-xl-6 order-xl-2">
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
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
              <a href="#" class="btn btn-sm btn-default float-right">Message</a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">22</span>
                    <span class="description">Friends</span>
                  </div>
                  <div>
                    <span class="heading">
                      {{$like}}
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