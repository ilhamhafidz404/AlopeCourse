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
  <main class="container-fluid mt-5">
    <div class="p-4 p-md-5 mb-4 text-white rounded blog-thumb-header" style="background-image:url({{asset('storage/'.$blog->thumbnail)}})">
    </div>

    <div class="row g-5">
      <div class="col-md-8">
        <div class="card shadow-sm border-0 bg-white p-4">
          <article class="blog-post">
            <h2 class="blog-post-title">
              {{$blog->judul}}
            </h2>
            <ul class="p-0 d-flex">
              @foreach($serie->tag as $tag)
              <li class="me-2">
                <span class="badge" style="background-color:{{$tag->badge}}">
                  <i class="fab fa-{{$tag->icon}} me-1"></i>
                  {{$tag->nama}}
                </span>
              </li>
              @endforeach
            </ul>
            <hr>
            {!!$blog->content!!}
            <br><br>
            @if($ilike)
            <a href="{{route('like.blog', $blog->id)}}" class="text-danger fs-5">
              <i class="fas fa-heart me-1"></i>
              {{$likes}}
            </a>
            @else
            <a href="{{route('like.blog', $blog->id)}}" class="text-danger fs-5">
              <i class="far fa-heart me-1"></i>
              {{$likes}}
            </a>
            @endif
            <a href="{{$next}}">a</a>
            <hr>
            <div class="article-footer">
              <div class="row">
                <div class="col-md-2">
                  <img src="{{asset('storage/'.$blog->user->profile)}}" alt="{{$blog->user->name}} Profile" class="w-100 rounded-circle mt-2">
                </div>
                <div class="col-md-10">
                  <h5 class="mb-1">{{$blog->user->name}}</h6>
                  <small class="text-muted">
                    Tentang penulis Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore sequi similique consectetur pariat
                  </small>
                  <ul class="d-flex mb-0 p-0 mt-3">
                    <li class="me-3">
                      <a href="">
                        <small>
                          Profile Penulis
                        </small>
                      </a>
                    </li>
                    <li class="me-3">
                      <a href="">
                        <small>
                          Karya Lainnya
                        </small>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </article>
          <hr>
          <div id="disqus_thread" class="mt-4"></div>
          <script>
            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
            /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
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
      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
          <div class="p-3 mb-3 shadow-sm rounded text-white serie-blog-info">
            <h4 class="fst-italic">{{$blog->category->nama}}</h4>
            <p class="mb-0">
              {{$blog->category->description}}
            </p>
          </div>

          <div class="p-3">
            <h4 class="fst-italic">
              Blog Serupa
            </h4>
            <ol class="list-unstyled mb-0">
              <li>
                <a href="#">March 2021</a>
              </li>
              <li>
                <a href="#">February 2021</a>
              </li>
              <li>
                <a href="#">January 2021</a>
              </li>
              <li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </main>

    <x-footer-component></x-footer-component>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="{{asset('dist/js/prism.js')}}"></script>
    <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    @include('sweetalert::alert')
  </body>
</html>