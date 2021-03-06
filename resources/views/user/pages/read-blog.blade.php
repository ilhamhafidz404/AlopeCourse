@extends('user.pages-master')

@section('title', 'Alope - Read Blog')

@section('header')
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
@endsection
@section('card-content')
<div class="container-fluid position-relative" style="width: 90%; margin-top: -270px">
  <div class="p-4 p-md-5 mb-4 text-white rounded blog-thumb-header" style="background-image:url({{asset('storage/thumbnail/blog/'.$blog->thumbnail)}})">
  </div>
  <div class="row g-5 mt-4">
    <div class="col-md-8">
      <div class="card shadow-sm border-0 bg-white p-4">
        <article class="blog-post">
          <div class="d-flex justify-content-between">
            <div>
              <h2 class="blog-post-title">
                {{$blog->judul}}
              </h2>
            </div>
            <div>
              <i class="fas fa-share text-muted me-3"></i>
              @if($ilike)
              <a href="{{route('like.blog', $blog->id)}}" class="text-danger fs-6">
                <i class="fas fa-heart"></i>
                {{$likes}}
              </a>
              @else
              <a href="{{route('like.blog', $blog->id)}}" class="text-danger fs-6">
                <i class="far fa-heart"></i>
                {{$likes}}
              </a>
              @endif
            </div>
          </div>
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
          <hr>
          <div class="article-footer">
            <div class="row">
              <div class="col-md-2">
                <img src="{{asset('storage/profile/'.$blog->user->profile)}}" alt="{{$blog->user->name}} Profile" class="w-100 rounded-circle mt-2">
              </div>
              <div class="col-md-10">
                <h5 class="mb-1">{{$blog->user->name}}</h6>
                <small class="text-muted">
                  Tentang penulis Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore sequi similique consectetur pariat
                </small>
                <ul class="d-flex mb-0 p-0 mt-3">
                  <li class="me-3">
                    <a href="{{route('profile.index', $blog->user->username)}}">
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
            {!!$blog->category->description!!}
          </p>
        </div>
  
        <div class="mt-4">
          <h4 class="fst-italic">
            Blog Serupa
          </h4>
          <div class="list-group mt-3">
            @foreach($similiar_blogs as $similiar_blog)
            @if($similiar_blog->slug == $blog->slug)
            <a href="#" class="list-group-item list-group-item-action active" style=" background: linear-gradient(-45deg, #821FC8, #23ADD1 );">
              <h5 class="mb-1">{{Str::limit($similiar_blog->judul, 20)}}</h5>
            </a>
            @else
            <a href="{{route('blog.read', $similiar_blog->slug)}}" class="list-group-item list-group-item-action">
              <h5 class="mb-1">{{Str::limit($similiar_blog->judul, 20)}}</h5>
            </a>
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- <html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{asset('dist/css/prism.css')}}">

  <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>Hello, world!</title>
  <style>
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

@media only screen and (max-width: 1363px) {
      svg.footer-svg {
        margin-top: -350px !important;
      }
      footer {
        margin-top: -57px !important;
      }
    }
@media only screen and (max-width: 1139px) {
      svg.footer-svg {
        margin-top: -300px !important;
      }
    }
@media only screen and (max-width: 917px) {
      svg.footer-svg {
        margin-top: -250px !important;
      }
    }
@media only screen and (max-width: 688px) {
      svg.footer-svg {
        margin-top: -200px !important;
      }
    }
@media only screen and (max-width: 455px) {
      svg.footer-svg {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-light">
  <x-navbar-component></x-navbar-component>
  <div class="svg-head"></div>
  <br><br><br>
  <main class="container-fluid mt-5">
    <div class="p-4 p-md-5 mb-4 text-white rounded blog-thumb-header" style="background-image:url({{asset('storage/thumbnail/blog/'.$blog->thumbnail)}})">
    </div>

    <div class="row g-5">
      <div class="col-md-8">
        <div class="card shadow-sm border-0 bg-white p-4">
          <article class="blog-post">
            <div class="d-flex justify-content-between">
              <div>
                <h2 class="blog-post-title">
                  {{$blog->judul}}
                </h2>
              </div>
              <div>
                <i class="fas fa-share text-muted me-3"></i>
                @if($ilike)
                <a href="{{route('like.blog', $blog->id)}}" class="text-danger fs-6">
                  <i class="fas fa-heart"></i>
                  {{$likes}}
                </a>
                @else
                <a href="{{route('like.blog', $blog->id)}}" class="text-danger fs-6">
                  <i class="far fa-heart"></i>
                  {{$likes}}
                </a>
                @endif
              </div>
            </div>
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
            <hr>
            <div class="article-footer">
              <div class="row">
                <div class="col-md-2">
                  <img src="{{asset('storage/profile/'.$blog->user->profile)}}" alt="{{$blog->user->name}} Profile" class="w-100 rounded-circle mt-2">
                </div>
                <div class="col-md-10">
                  <h5 class="mb-1">{{$blog->user->name}}</h6>
                  <small class="text-muted">
                    Tentang penulis Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore sequi similique consectetur pariat
                  </small>
                  <ul class="d-flex mb-0 p-0 mt-3">
                    <li class="me-3">
                      <a href="{{route('profile.index', $blog->user->username)}}">
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
              {!!$blog->category->description!!}
            </p>
          </div>

          <div class="mt-4">
            <h4 class="fst-italic">
              Blog Serupa
            </h4>
            <div class="list-group mt-3">
              @foreach($similiar_blogs as $similiar_blog)
              @if($similiar_blog->slug == $blog->slug)
              <a href="#" class="list-group-item list-group-item-action active" style=" background: linear-gradient(-45deg, #821FC8, #23ADD1 );">
                <h5 class="mb-1">{{Str::limit($similiar_blog->judul, 20)}}</h5>
              </a>
              @else
              <a href="{{route('blog.read', $similiar_blog->slug)}}" class="list-group-item list-group-item-action">
                <h5 class="mb-1">{{Str::limit($similiar_blog->judul, 20)}}</h5>
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
  <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>
  <script src="/js/script.js"></script>
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
</html> --}}