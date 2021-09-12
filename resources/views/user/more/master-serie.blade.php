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

  <title>user</title>
  <style>
    body {
      font-family: 'Poppins', Sans-Serif;
      overflow-x: hidden;
      background-color: #f1f5f9;
    }
    .card-img-rounded {
      border-radius: 10px
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
    section.header {
      background-size: cover;
      background-position: center;
      background: linear-gradient(-45deg, #821FC8, #23ADD1 );
    }


    .header-tag, .header-hot {
      background-color: rgba(0,0,0, 0.3);
      max-width: 400px;
      border-radius: 20px;
    }
    .serie-name::before {
      content: '';
      width: 200px;
      height: 10px;
      position: absolute;
      background-color: rgba(255, 255, 255, 0.5);
      bottom: 0;
    }
    .series-content {
      margin-top: -37px !important;
    }
    .blog-serie {
      height: 150px;
      max-height: 200px;
      background-position: center;
      background-size: cover;
    }
    .writer-img {
      width: 25px;
      max-width: 35px;
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
    svg.footer-svg {
      margin-top: -200px;
    }
  </style>
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