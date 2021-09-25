<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{asset('dist/css/prism.css')}}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>Hello, world!</title>
  <style>
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
    .blog-thumb-header {
      background-position: center;
      background-size: cover;
      height: 320px;
      max-height: 350px;
    }
    footer {
      background-color: #36275D;
      margin-top: -10px;
    }
    .container-fluid {
      width: 90% !important;
    }
    .svg-head {
      background-size: cover;
      background-position: center;
      background: linear-gradient(-45deg, #821FC8, #23ADD1 );
      width: 100%;
      height: 400px;
      position: absolute;
      z-index: -100;
      top: -30px;
    }
    .serie-blog-info {
      background: #36275D
    }
    ul {
      list-style: none;
    }
    .footer-svg {
      margin-top: -190px;
    }
    a {
      text-decoration: none;
    }
  </style>
</head>
<body class="bg-light">
  <x-navbar-component></x-navbar-component>
  <div class="svg-head"></div>
  <br><br><br>
  <main class="mx-auto mt-4" style="width: 97%">
    <div class="card p-2">
      <iframe width="100%" height="350px" src="{{$video->link}}"></iframe>
    </div>
    <div class="mx-auto mt-4" style="width:97%">
      <div class="row">
        <div class="col-md-7">

          <div class="card mb-3 p-3 position-relative">
            <div class="text-center">
              <small>Serie Pembelajaran</small>
              <h3 class="fw-bold mt-0 mb-1">{{$video->category->nama}}</h3>
              <ul class="d-flex justify-content-center p-0">
                @foreach($category->tag as $tag)
                <li>
                  <button class="btn btn-transparent text-primary px-1 py-1" data-bs-toggle="popover" title="{{$tag->nama}}" data-bs-trigger="focus" data-bs-content="{{$tag->description}}">
                    #{{$tag->nama}}
                  </button>
                </li>
                @endforeach
              </ul>
              <div class="d-flex align-items-center justify-content-center rounded py-4 top-50 position-absolute" style="width:25px; height:30px; right:-10px; transform: translateY(-50%); background-color: #36275D">
                <a href="{{$next}}" class="text-white">
                  <i class="fas fa-chevron-right"></i>
                </a>
              </div>
              <div class="d-flex align-items-center justify-content-center rounded py-4 top-50 position-absolute" style="width:25px; height:30px; left:-10px; transform: translateY(-50%); background-color: #36275D">
                <a href="{{$prev}}" class="text-white">
                  <i class="fas fa-chevron-left"></i>
                </a>
              </div>
            </div>
            <p class="text-dark mt-3 mx-auto" style="width: 90%">
              {{$video->category->description}}
            </p>
          </div>

          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#description">
                  Deskripsi
                </button>
              </h2>
              <div id="description" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  {!! $video->description  !!}
                </div>
              </div>
            </div>
          </div>
          <div class="card p-3">
            <div id="disqus_thread" class="mt-4"></div>
            <script>
              (function() {
                // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://alope-com.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
              })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card shadow-sm p-0">
            <div class="list-group p-0">
              @foreach($videos as $listVideo)
              @if($video->slug == $listVideo->slug)
              <a href="#" class="list-group-item list-group-item-action active d-flex justify-content-between" style=" background: linear-gradient(-45deg, #821FC8, #23ADD1 );" aria-current="true">
                <div style="width:15%" class="d-flex align-items-center justify-content-center">
                  <div class="border rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height:30px;">
                    {{$listVideo->episode}}
                  </div>
                </div>
                <div class="ms-2" style="width:85%">
                  <h6 class="mb-1">
                    {{$listVideo->title}}
                  </h6>
                  <small>
                    <i class="fas fa-play me-1"></i>
                    <span class="fw-bold">
                      Diputar
                    </span>
                  </small>
                </div>
              </a>
              @else
              <a href="{{route('video.stream', $listVideo->slug)}}" class="list-group-item list-group-item-action d-flex justify-content-between" aria-current="true">
                <div style="width:15%" class="d-flex justify-content-center align-items-center">
                  <div class="border rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height:30px">
                    {{$listVideo->episode}}
                  </div>
                </div>
                <div class="ms-2" style="width:85%">
                  <h6 class="mb-1">
                    {{$listVideo->title}}
                  </h6>
                  <small>26 Min</small>
                </div>
              </a>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <x-footer-component></x-footer-component>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="{{asset('dist/js/prism.js')}}"></script>
  <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  </script>
  <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>
  <script src="/js/script.js"></script>
  @include('sweetalert::alert')
</body>
</html>