<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('template')}}/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/css/argon.css?v=1.2.0" type="text/css">

  @yield('style')

  <link rel="stylesheet" href="{{asset('dist/css/prism.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/dropify.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.css" />
  <style>
    ul {
      list-style: none
    }
    #giveUser {
      display: none;
    }

    #giveUser.show {
      display: block !important;
    }
    .card-img{
      background-position: center
    }
    .tokenList.show{
      display: block !important;
    }
    .tokenList{
      display: none;
    }
    .youtubeCard::after{
      width: 100px;
      height: 200px;
      position: absolute;
      background: linear-gradient(87deg, #f5365c 0, #f56036 100%) !important;
      content: '';
      left: -20px;
      bottom: -100px;
      transform: rotate(-45deg)
    }
  </style>
</head>