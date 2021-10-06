<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
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
                <a href="" class="btn btn-sm btn-primary me-1">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              @endif
              @if($user->biodata->instagram)
              <li>
                <a href="" class="btn btn-sm btn-primary me-1">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              @endif
              @if($user->biodata->github)
              <li>
                <a href="" class="btn btn-sm btn-primary me-1">
                  <i class="fab fa-github"></i>
                </a>
              </li>
              @endif
              @if($user->biodata->facebook)
              <li>
                <a href="" class="btn btn-sm btn-primary me-1">
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
        <div class="col-xl-4 order-xl-2">
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
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
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
                  Jessica Jones<span class="font-weight-light">, 27</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
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