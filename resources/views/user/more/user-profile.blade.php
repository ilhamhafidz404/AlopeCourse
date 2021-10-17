<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>{{$user->username}} - Alope</title>
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
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('template')}}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row mt-5">
          <div class="col-lg-7 col-md-8 mt-4">
            <h1 class="display-2 text-white text-uppercase">
              {{$user->name}}
            </h1>
            <p class="text-white mt-0 mb-3" style="white-text: nowrap">
              {{$user->biodata->job}}
              @if($user->biodata->from)
              yang berasal dari {{$user->biodata->from}}
              @endif
            </p>
            <ul class="d-flex">
              @if($user->biodata->twitter)
              <li>
                <a href="https://twitter.com/{{$user->biodata->twitter}}" class="btn btn-sm  me-1 text-white" style="background-color:#00acee ">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              @endif
              @if($user->biodata->instagram)
              <li>
                <a href="https://instagram.com/{{$user->biodata->instagram}}" class="btn btn-sm me-1 text-white" target="_blank" style="
                  background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);
                  ">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              @endif
              @if($user->biodata->github)
              <li>
                <a href="https://github.com/{{$user->biodata->github}}" class="btn btn-sm btn-neutral me-1" target="_blank" style="color: #171515">
                  <i class="fab fa-github"></i>
                </a>
              </li>
              @endif
              @if($user->biodata->facebook)
              <li>
                <a href="" class="btn btn-sm me-1 text-white" style="background-color: #4267B2">
                  <i class="fab fa-facebook"></i>
                </a>
              </li>
              @endif
              @if($user->biodata->website)
              <li>
                <a href="" class="btn btn-sm btn-primary me-1">
                  <i class="fas fa-link"></i>
                </a>
              </li>
              @endif
            </ul>
            <p class="text-white mt-0 mb-5">
              {{$user->biodata->about}}
            </p>
            <p class="invisible">
              Kita tidak tau banyak tentang {{$user->name}}, tpi percayalah dia pasti orang yang luar biasa.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-5">
          <div class="card card-profile">
            <div class="row justify-content-center">
              <div class="col-lg-4 order-lg-2">
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
        <div class="col-xl-7">
          <div class="list-group">
            <a href="{{route('profile.edit', auth()->user()->username)}}" class="list-group-item list-group-item-action text-purple">
              <i class="fas fa-cog me-3"></i>
              Edit Profile
            </a>
            <a href="{{route('invoice')}}" class="list-group-item list-group-item-action text-yellow">
              <i class="fas fa-crown me-3"></i>
              Beli Paket
            </a>
            <a href="{{route('redeem')}}" class="list-group-item list-group-item-action text-success">
              <i class="fas fa-ticket-alt me-3"></i>
              Reedem Token
            </a>
            <a href="{{route('message')}}" class="list-group-item list-group-item-action text-primary">
              <i class="fas fa-rocket me-3"></i>
              Message
            </a>
            <a class="list-group-item list-group-item-action text-warning" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt me-4"></i>
              {{ __('Logout') }}
            </a>
            <a href="{{route('iam_out')}}" onclick="return confirm('Yakin anda ingin menghapus akun anda?')" class="list-group-item list-group-item-action text-danger">
              <i class="fas fa-trash me-3"></i>
              Hapus Akun
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
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