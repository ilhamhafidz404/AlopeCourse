<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">

  <link rel="stylesheet" href="{{asset('dist/css/dropify.min.css')}}">
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('template/')}}/assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/mystyle.css">
  <style>
    .form-control
{
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;

    display: block;

    width: 100%;
    height: calc(1.5em + 1.25rem + 2px);
    padding: .625rem .75rem;

    transition: all .15s cubic-bezier(.68, -.55, .265, 1.55); 

    color: #8898aa;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    background-color: #fff;
    background-clip: padding-box;
    box-shadow: 0 3px 2px rgba(233, 236, 239, .05);
}

.input-group-text
{
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;

    display: flex;

    margin-bottom: 0;
    padding: .625rem .75rem;

    text-align: center;
    white-space: nowrap;

    color: #adb5bd;
    border: 1px solid #dee2e6;
    border-radius: .25rem; 
    background-color: #fff;

    align-items: center;
}
  </style>

</head>

<body>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <x-navbar-component></x-navbar-component>
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('template')}}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
    </div>
    <div class="container-fluid" style="margin-top: @yield('martop')">
        @yield('content')
    </div>
    @yield('content2')
  </div>
  <x-footer-component></x-footer-component>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('admin.layouts.feet')
  <script src="/js/script.js"></script>
</body>
</html>