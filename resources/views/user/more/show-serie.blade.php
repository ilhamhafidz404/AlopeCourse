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


    .header-tag {
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
          <div class="py-1 px-3 mt-5 header-tag d-flex justify-content-between align-items-center text-white">
            <ul class="d-flex">
              @foreach($serie->tag as $tag)
              <li class="me-3">
                <span class="badge" style="background-color: {{$tag->badge}}">
                  <i class="fab fa-{{$tag->icon}}"></i>
                  {{$tag->nama}}
                </span>
              </li>
              @endforeach
            </ul>
            <i class="fas fa-chevron-right"></i>
          </div>

          <h1 class="fw-light text-uppercase mt-3">
            Explore Serie <span class="fw-bold serie-name position-relative">{{$serie->nama}}</span>
          </h1>

          <small class="lead text-white mt-4">
            {{$serie->description}}
          </small>

          <ul class="d-flex align-items-center mt-4">
            <li class="me-4">
              <i class="fas fa-clock me-1"></i>
              {{$serie->created_at->diffForHumans()}}
            </li>
            <li class="me-4">
              <i class="fas fa-play me-1"></i>
              {{$blogs->count()}}
              <span class="ms-1">
                Episode
              </span>
            </li>
            <li class="me-4">
              <i class="fas fa-door-open me-1"></i>
              <span class="text-warning text-uppercase fw-bold">
                {{$serie->status}}
              </span>
            </li>
            <li class="me-4">
              <i class="fas fa-users me-1"></i>
              {{$serie->level}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid series-content">
    <div class="card p-4 shadow">
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm">
            <div class="blog-serie w-100" style="background-image: url({{asset('storage/'.$blog->thumbnail)}})"></div>
            <div class="card-body pt-1">
              <h5 class="card-title mb-4">
                {{$blog->judul}}
              </h5>
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <img src="{{asset('storage/'.$blog->user->profile)}}" alt="{{$blog->user->name}}" class="rounded-circle writer-img">
                  <small class="text-muted ms-2">
                    {{$blog->user->name}}
                  </small>
                </div>
                <small class="text-muted">
                  {{$blog->created_at->diffForHumans()}}
                </small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

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