<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <title>Hello, world!</title>

  <style>
    a {
      text-decoration: none;
    }
    body {
      color: #1e205a !important;
      font-family: 'Poppins', sans-serif;
    }
    .faq {
      border-left: 5px solid transparent
    }
    .faq.active {
      border-left: 5px solid rgba(0, 0, 0, 0.5);
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
    .search {
      border-radius: 20px !important;
      overflow: hidden
    }
    input.search {
      border-radius: 20px 0 0 20px !important;
    }
    .input-group-text.search {
      border-radius: 0 20px 20px 0 !important;
    }
    a:hover > .fa-arrow-right {
      margin-left: 20px !important;
    }
    .fas.fa-arrow-right {
      transition: 0.3s;
    }

    .card-title, .card-time {
      color: #1e205a;
    }

@media only screen and (max-width: 991px) {
      .sidebarrrr {
        order: 2 !important;
      }
      .blogListrrr {
        order: 1 !important
      }
      .ytdesk {
        width: 100% !important;
        position: relative !important;
        bottom: 0 !important;
      }
    }
    .https://themeforest.net/item/sada-a-psd-template-for-blog-shop/screenshots/22396921?index=1
  </style>
</head>
<body class="bg-light">
  <nav class="navbar navbar-dark bg-transparent navbar-expand-md fixed-top p-3">
    <div class="container-fluid">
      <a class="navbar-brand text-uppercase fw-bold" href="#">
        Ilham
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="https://themeforest.net/item/sada-a-psd-template-for-blog-shop/screenshots/22396921?index=1">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Topic</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Video</a>
          </li>
          <li class="nav-item dropdown ms-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if(auth()->user()->hasRole('admin'))
              <li><a class="dropdown-item" href="{{route('dashboard.admin')}}">Dashboard</a></li>
              @elseif(auth()->user()->hasRole('premium'))
              <li><a class="dropdown-item" href="{{route('dashboard.premium')}}">Dashboard</a></li>
              @endif
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  <div class="jumbotron shadow mb-5 pt-5 position-relative" style="background-image: url(https://images.unsplash.com/photo-1630343710506-89f8b9f21d31?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80); background-size: cover; background-position: center; min-height: 500px">
    <div class="container-fluid">
      <div class="card p-4 py-2 mt-5 position-absolute border-0 rounded-start mt-4" style="max-width: 500px;">
        <div class="card-body">
          <h5 class="card-title jumbotron-title">ALOPE</h5>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text jumbotron-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam rerum ratione placeat qui quasi voluptas ea, aperiam accusantium, possimus eveniet voluptatibus maiores, corrupti nihil aliquid animi facere! Rem, dolore repellendus!
          </p>
        </div>
      </div>
      <div class="card position-absolute end-0 bottom-0 border-0 rounded-start" style="max-width: 500px; min-width: 400px">
        <div class="card-body  p-0">
          <h5 class="card-title p-3">ALOPE FAQ</h5>

          <!--              -->
          <div class="d-flex justify-content-between mb-3 ps-2 active faq" style='cursor: pointer' onClick='swapJumbotron("Alope Merupakan tempat koding online", "Apa Itu ALOPE?")'>
            <div class="d-flex align-items-center me-3 " style="width: 5%">
              <h3 class="fw-bold text-center">1</h3>
            </div>
            <div style="width: 95%">
              <h5 class="mb-0">Apa itu Alope</h5>
            </div>
          </div>
          <div class="d-flex justify-content-between mb-3 ps-2 faq" style='cursor: pointer' onClick='swapJumbotron("Alope menyuguhkan HTML CSS JS dan PHP", "Apa Aja yang Ada di ALOPE?")'>
            <div class="d-flex align-items-center me-3" style="width: 5%">
              <h3 class="fw-bold text-center">2</h3>
            </div>
            <div style="width: 95%">
              <h5 class="mb-0">Apa Aja yang ada di alope</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 sidebar">
        <div class="sticky-top">
          <br>  <br>  <br>
          <div class="row">
            <div class="col-md-12 col-lg-12 mb-3">
              <form action="">
                <div class="input-group search shadow-sm">
                  <input type="text" class="form-control search px-4 py-2 border-end-0" id="autoSizingInputGroup" placeholder="Username">
                  <div class="input-group-text search bg-white border-start-0">
                    <i class="fas fa-search"> </i>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-12 col-md-6">
              <div class="card mb-3 border-0 px-3 py-4 rounded shadow-sm ">
                <h4 class="text-uppercase mb-3"> Categories</h4>
                <ul class="list-group list-group-flush">
                  @foreach($categories as $category)
                  <li class="list-group-item pt-3">
                    {{$category->nama}}
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-lg-12 col-md-6">
              <div class="card px-3 py-4 border-0 shadow-sm">
                <h4 class="mb-4">Blog Terbaru</h4>
                <div class="d-flex justify-content-between mb-3">
                  <div class="d-flex align-items-center me-3" style="width: 5%">
                    <h3 class="fw-bold text-center">1</h3>
                  </div>
                  <div style="width: 95%">
                    <h5 class="mb-0">Judul Blog</h5>
                    <small class="text-muted">Category Blog</small>
                    <small>1 Nov 2021</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                  <div class="d-flex align-items-center me-3" style="width: 5%">
                    <h3 class="fw-bold text-center">2</h3>
                  </div>
                  <div style="width: 95%">
                    <h5 class="mb-0">Judul Blog</h5>
                    <small class="text-muted">Category Blog</small>
                    <small>1 Nov 2021</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                  <div class="d-flex align-items-center me-3" style="width: 5%">
                    <h3 class="fw-bold text-center">3</h3>
                  </div>
                  <div style="width: 95%">
                    <h5 class="mb-0">Judul Blog</h5>
                    <small class="text-muted">Category Blog</small>
                    <small>1 Nov 2021</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                  <div class="d-flex align-items-center me-3" style="width: 5%">
                    <h3 class="fw-bold text-center">4</h3>
                  </div>
                  <div style="width: 95%">
                    <h5 class="mb-0">Judul Blog</h5>
                    <small class="text-muted">Category Blog</small>
                    <small>1 Nov 2021</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                  <div class="d-flex align-items-center me-3" style="width: 5%">
                    <h3 class="fw-bold text-center">5</h3>
                  </div>
                  <div style="width: 95%">
                    <h5 class="mb-0">Judul Blog</h5>
                    <small class="text-muted">Category Blog</small>
                    <small>1 Nov 2021</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 blogList">
        <br>  <br>
        <div class="row">
          @foreach($blogs as $blog)
          <div class="col-md-4 col-sm-6">
            <a href="{{route('blog.show', $blog->slug)}}">
              <div class="card w-100 mb-3">
                <div class="blogThumb" style="width:100%; height: 220px; background-image: url({{asset('storage/'.$blog->thumbnail)}}); background-size: cover; background-position: center;"></div>
                <div class="card-body pt-1">
                  <div class="d-flex justify-content-between align-items-center">
                    @foreach($blog->category->tag as $tag)
                    <span class="badge me-1" style="background-color: {{$tag->badge}}">
                      {{$tag->nama}}
                    </span>
                    @endforeach
                    <small class="mb-2 card-time" style="font-size: 12px">{{$blog->created_at->diffForHumans()}}</small>
                  </div>
                  <h4 class="card-title my-1">{{$blog->judul}}</h4>
                  <h6 class="card-subtitle text-muted d-inline">{{$blog->category->nama}}</h6>
                  <small class="card-text mt-2 text-secondary d-block">
                    {{$blog->category->description}}
                  </small>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid mt-5">
    <h3>Video Tutorial</h3>
    <div class="row mt-4" style="overflow-x">
      @foreach($videos as $video)
      <div class="col-lg-4 col-md-6">
        <div class="position-relative">
          <div class="rounded" style="width: 100%; height: 300px; background-image: url({{asset('storage/'.$video->thumbnail)}}); background-size: cover; background-position: center"></div>
          <div class="card start-50 position-absolute p-3 border-0 shadow-sm" style="width: 90%; bottom:-100px; transform: translateX(-50%)">
            <h3 class="card-title">{{$video->title}}</h3>
            <small class="card-text text-muted">
              {{$video->description}}
            </small>
            <small class="mt-3">
              <a href="{{$video->link}}" target="_blank">
                Lihat Video Youtube <i class="fas fa-arrow-right ms-2"> </i>
              </a>
            </small>
          </div>
        </div>
        <br> <br>  <br>  <br>  <br>
      </div>
      @endforeach
    </div>
  </div>

  <footer class="p-4 bg-white mt-5 shadow-sm">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <h5>  Alope</h5>
          <small class="text-muted mt-5"> &copy; Copyright by Ilham Hafidz</small>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-2">
          <h5> Sosial Media</h5>
          <div class="d-flex align-items-center justify-content-around">
            <a href="">
              <i class="fab fa-instagram">  </i>
            </a>
            <a href="">
              <i class="fab fa-facebook-f">  </i>
            </a>
            <a href="">
              <i class="fab fa-twitter">  </i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src='script.js'>
  </script>
  <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>
  <script>
    const swapJumbotron = (paragraf, title)=> {
      const jumbotronText = document.querySelector('.jumbotron-text');
      const jumbotronTitle = document.querySelector('.jumbotron-title');
      const faqs = document.querySelectorAll('.faq')
      faqs.forEach(faq => {
        faq.addEventListener('click', ()=> {
          faq.classList.add('active')
        })
        faq.classList.remove('active')
      })
      jumbotronText.innerHTML = paragraf
      jumbotronTitle.innerHTML = title
    }

    const navbar = document.querySelector('.navbar')
    window.addEventListener('scroll', function() {
      navbar.classList.toggle('sticky', window.scrollY > 0);
    });
  </script>

</body>
</html>


@include('sweetalert::alert')