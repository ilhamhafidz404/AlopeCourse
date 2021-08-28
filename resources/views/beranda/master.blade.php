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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="{{asset('dist/css/prism.css')}}">

  <style>
    body {
      font-family: 'Poppins', Sans-Serif;
      overflow-x: hidden;
      background-color: #f1f5f9;
    }
    a {
      text-decoration: none !important;
    }
    .container-fluid {
      width: 90% !important;
    }
    ul {
      list-style: none;
    }
    .card-img-rounded {
      border-radius: 10px
    }
    section.header {
      background-size: cover;
      background-position: center;
    }
    .circle-container {
      padding-top: 120px;
      position: relative;
      height: 300px;
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
  </style>

  <title>Beranda</title>
</head>
<body>
  <x-navbar-component></x-navbar-component>
  @if(request()->is('beranda'))
  <x-header-component></x-header-component>
  @endif
  @yield('content')
  <x-footer-component></x-footer-component>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="{{asset('dist/js/prism.js')}}"></script>
  <!-- Font Awesome  -->
  <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    var typed3 = new Typed('#typed', {
      strings: ['Web Programming', 'Web Design', 'Mobile App'],
      typeSpeed: 50,
      backSpeed: 50,
      smartBackspace: true, // this is a default
      loop: true
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    console.log(tooltipTriggerList)
  </script>

</body>
</html>