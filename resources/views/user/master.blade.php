<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/testi.css">

  <!-- prism -->
  <link rel="stylesheet" href="{{asset('dist/css/prism.css')}}">

  <!-- glider -->
  <link rel="stylesheet" href="{{asset('dist/css/glider.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">


  <!--
      	==========================================================================================================
      	==========================================================================================================
      	==========================================================================================================
      	,,
      	`7MMF' A `7MF' `7MM OO
      	`MA ,MA ,V MM 88
      	VM: ,VVM: ,V .gP"Ya MM ,p6"bo ,pW"Wq.`7MMpMMMb.pMMMb. .gP"Ya ||
      	MM. M' MM. M',M' Yb MM 6M' OO 6W' `Wb MM MM MM ,M' Yb ||
      	`MM A' `MM A' 8M"""""" MM 8M 8M M8 MM MM MM 8M"""""" `'
      	:MM; :MM; YM. , MM YM. , YA. ,A9 MM MM MM YM. , ,,
      	VF VF `Mbmmd'.JMML.YMbmd' `Ybmd9'.JMML JMML JMML.`Mbmmd' db
      	to,
      	___ __ __ _ __ _ _ _ __ _ __ _
      	/ __>| \ \| / / | \ | ___ ___ ___ _ _ <_> /. | | / / _ _ ._ _ <_>._ _ ___ ___ ._ _
      	\__ \| || \ | |/ ._>/ . |/ ._>| '_>| | /_ .| | \ | | || ' || || ' |/ . |<_> || ' |
      	<___/|_|_|_||_\_\ |_\_|\___.\_. |\___.|_| |_| |_| |_\_\`___||_|_||_||_|_|\_. |<___||_|_|
      	<___' <___'
      	──────▄▀▄─────▄▀▄
      	─────▄█░░▀▀▀▀▀░░█▄
      	─▄▄──█░░░░░░░░░░░█──▄▄
      	█▄▄█─█░░▀░░┬░░▀░░█─█▄▄█ Hayo mau ngapain liat2 ke sini ( ͡❛ ͜ʖ ͡❛) ?
      	==========================================================================================================
      	==========================================================================================================
      	==========================================================================================================
      	-->

  <title>@yield('title')</title>
  <style>
    svg.svgTesti {
      margin-top: -400px !important;
    }
    svg.svgTestiBottom {
      margin-top: -150px;
    }
@media only screen and (max-width: 1486px) {
      svg.svgTesti {
        display: none;
      }
      #testi {
        margin-top: 0
      }
      svg.svgTestiBottom {
        margin-top: -70px;
      }
      .premium {
        margin-top: 50px !important;
        margin-bottom: -300px !important;
      }
    }

@media only screen and (max-width: 810px) {
      .premium {
        margin-top: 0px !important;
        margin-bottom: -200px !important;
      }
    }


@media only screen and (max-width: 696px) {
      .premium {
        margin-top: 0px !important;
        margin-bottom: -160px !important;
      }
    }

@media only screen and (max-width: 696px) {
      .premium {
        margin-top: 0px !important;
        margin-bottom: -100px !important;
      }
    }
  </style>
</head>
@auth
@if(auth()->user()->hasRole('banned'))
<body class="banned">
  <x-navbar-component></x-navbar-component>
  @else
  <body>

    <x-navbar-component> </x-navbar-component>
    <x-header-component></x-header-component>
    @yield('content')
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
    @endif
    @else
    <body>
      <x-navbar-component></x-navbar-component>
      <x-header-component></x-header-component>
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
      @yield('content')
      @endauth
      <x-banner-component></x-banner-component>
      <x-footer-component></x-footer-component>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script type="text/javascript">
        var myModal = new bootstrap.Modal(document.getElementById('notif'), {})
        myModal.toggle()
      </script>
      <script src="/js/app.js"></script>

      <!-- Prism  -->
      <script src="{{asset('dist/js/prism.js')}}"></script>

      <!-- Font Awesome  -->
      <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>

      <!-- Glider  -->
      <script src="{{asset('dist/js/glider.min.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="/js/script.js"></script>
      @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    </body>
  </html>