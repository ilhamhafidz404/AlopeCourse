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
  <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">

  <!-- glider -->
  <link rel="stylesheet" href="{{asset('dist/css/glider.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">

  <title>user</title>
</head>
@auth
@if(auth()->user()->hasRole('banned'))
<body class="banned">
  <x-navbar-component></x-navbar-component>
  @else
  <body>
    <x-navbar-component></x-navbar-component>
    <x-header-component></x-header-component>
    @yield('content')
    @endif
    @else
    <body>
      <x-navbar-component></x-navbar-component>
      <x-header-component></x-header-component>
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

      <script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>

      <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
      <script src="/js/script.js"></script>
      @include('sweetalert::alert')
    </body>
  </html>