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

  <!-- prism -->
  <link rel="stylesheet" href="{{asset('dist/css/prism.css')}}">

  <!-- glider -->
  <link rel="stylesheet" href="{{asset('dist/css/glider.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>user</title>
</head>
<body class="bg-light">
  <x-navbar-component></x-navbar-component>
  <section class="py-5 text-start header text-white position-relative">
    <div class="container-fluid pb-5">
      <div class="row">
        <div class="col-lg-6">
          <br>
          @yield('header')
        </div>
      </div>
    </div>
  </section>

  @yield('card-content')

  <x-footer-component></x-footer-component>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="/js/app.js"></script>

  <!-- Prism  -->
  <script src="{{asset('dist/js/prism.js')}}"></script>

  <!-- Font Awesome  -->
  <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>

  <!-- Glider  -->
  <script src="{{asset('dist/js/glider.min.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script src="/js/script.js"></script>

</body>
</html>