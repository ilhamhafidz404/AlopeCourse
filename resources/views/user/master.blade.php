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

  <style>
    body {
      font-family: 'Poppins', Sans-Serif;
      overflow-x: hidden;
      background-color: #f1f5f9;
    }
    body.banned {
      background: linear-gradient(-45deg, #821FC8, #23ADD1 );
      min-height: 100vh;
    }
    .navbar {
      transition: 0.5s;
    }
    .navbar.sticky {
      background-color: white !important;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.5);
      padding: 5px 30px !important;
    }
    .navbar.sticky a {
      color: #333 !important;
    }
    a {
      text-decoration: none !important;
    }
    .container-fluid {
      width: 90% !important;
    }
    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .card-img-rounded {
      border-radius: 10px
    }
    section.header {
      background-size: cover;
      background-position: center;
      background: linear-gradient(-45deg, #821FC8, #23ADD1 );
    }
    .header-path {
      background-color: #5D4A8E;
      bottom: -35px;
    }
    .header-hot {
      background-color: rgba(0,0,0, 0.3);
      max-width: 400px;
      border-radius: 20px;
    }
    .header-hot span.badge {
      border-radius: 20px;
    }
    .circle-container {
      padding-top: 120px;
      position: relative;
      height: 300px;
      margin-top: 50px;
    }
    .circle {
      border: 1px solid rgba(0,0,0,0.1);
    }
    .circle1 {
      width: 100px;
      height: 100px;
      z-index: 3;
    }
    .circle2 {
      width: 200px;
      height: 200px;
      z-index: 2;
    }
    .circle3 {
      height: 300px;
      width: 300px;
      z-index: 1;
    }
    .circle span {
      background-color: #fff;
      padding: 5px;
      width: 25px;
      height: 25px;
    }
    .circle span.html {
      top: 0;
      left: 5px;
      color: #e34c26;
    }
    .circle span.css {
      bottom: 0;
      right: 5px;
      color: #264de4;
    }
    .circle span.js {
      top: -10px;
      left: 55%;
      color: #f0db4f;
    }
    .circle span.php {
      bottom: 45px;
      left: 0;
      color: #8993be;
    }
    .circle span.sass {
      bottom: 90px;
      right: -13px;
      color: #cc6699;
    }
    .circle span.laravel {
      top: 30px;
      left: 33px;
      color: #fb503b;
    }
    .circle span.vue {
      bottom: 20px;
      right: 43px;
      color: #42b883;
    }
    .circle span.react {
      top: 60px;
      right: 8px;
      color: #61DBFB;
    }
    .circle span.node {
      bottom: 3px;
      left: 70px;
      color: #68A063;
    }

    .latest-blog-title {
      max-width: 400px;
      margin-top: -35px !important;
      background-color: #5D4A8E;
    }
    .latest-blog {
      background: linear-gradient(45deg, #594DD4, #7749CB);
    }

    .premium {
      background: linear-gradient(-20deg, #9A5FE3, #64C0EA);
      margin-top: 150px !important;
      margin-bottom: -230px !important;
      max-width: 500px;
    }
    .btn-premium {
      border-radius: 25px;
    }

    footer {
      background-color: #36275D;
      margin-top: -10px;
    }
  </style>

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