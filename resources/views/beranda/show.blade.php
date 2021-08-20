@extends('beranda.master')


@section('content')
<div class="container">

</div>


<main class="container mt-5">
  <div class="breadcrumb mb-0">
    <ul class="p-0 d-flex">
      <li class="me-1">
        <a href="{{route('beranda.index')}}">Home</a>
      </li>
      <li class="me-3">
        >>
      </li>
      <li class="me-1">
        <a href="{{route('beranda.index')}}">{{$blog->category->nama}}</a>
      </li>
      <li class="me-3">
        >>
      </li>
      <li class="me-1">
        <a href="" class="text-dark">{{$blog->judul}}</a>
      </li>
    </ul>
  </div>
  <div class="row g-5">
    <div class="col-md-8 bg-white rounded shadow-sm pb-5">
      <header class="blog-header py-3 text-center">
        <div class="text-start p-3 mx-3 pb-0">
          <small style="color: #008fff" class="fw-bold">{{$blog->category->nama}}</small>
          <h2 class="blog-post-title">
            {{$blog->judul}}
          </h2>
          <hr class="mb-4">
        </div>
        <img src="{{asset('storage/'.$blog->thumbnail)}}" width="100%" class="rounded" style="max-width: 800px">
      </header>
      <article class="blog-post p-3 py-0">
        <div class="d-flex justify-content-between align-items-center px-2 mb-4">
          <p class="blog-post-meta">
            {{$blog->created_at->format('D, M Y')}}
          </p>
          <ul class="p-0">
            @foreach ($blog->tag as $tag)
            <li>
              <a href="">{{$tag->nama}}</a>
            </li>
            @endforeach
          </ul>
        </div>
        <p>
          <code class="language-css">
            p{
            list-style: none;
            }
          </code>
        </p>
        <div class="blog-text">
          {!!$blog->content!!}
        </div>


        <div class="article-footer">

        </div>
      </article>
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">
            {{$blog->category->keterangan}}
          </p>
        </div>

        <x-list-series-component></x-list-series-component>
      </div>
    </div>
  </div>

</main>
<div class="container mt-5">
  <h3 class="mb-3 text-uppercase ms-3">Tutorial Menarik Lainnya</h3>
  <div class="row">
    @foreach($blogs as $blog)
    <div class="col-sm-12 col-md-6 col-lg-4">
      <a href="{{route('beranda.show', $blog->slug)}}">
        <div class="card border-0 bg-white shadow-sm rounded m-auto mb-4" style="width: 90% !important;">
          <img src="{{asset('storage/'.$blog->thumbnail)}}" width="100%">
          <div class="card-body">
            <ul class="p-0 d-flex my-0">
              @foreach($blog->tag as $tag)
              <li class="me-2">
                <a href=""><small>{{$tag->nama}}</small></a>
              </li>
              @endforeach
            </ul>
            <h4 class="card-title mb-2 text-dark">
              {{$blog->judul}}
            </h4>
            <div class="card-text d-flex justify-content-between">
              <span class="badge" style="background-color:{{$blog->category->badge}}">
                {{$blog->category->nama}}
              </span>
              <small class="text-muted">
                {{$blog->created_at->diffForHumans()}}
              </small>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>

@endsection