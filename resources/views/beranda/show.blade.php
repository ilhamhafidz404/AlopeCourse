@extends('beranda.master')


@section('content')
<div class="container">
  <header class="blog-header py-3">
    <img src="{{asset('storage/'.$blog->thumbnail)}}" width="100%" class="rounded">
  </header>
</div>

<main class="container">
  <div class="row g-5">
    <div class="col-md-8">
      <article class="blog-post">
        <h2 class="blog-post-title">
          {{$blog->judul}}
        </h2>
        <p class="blog-post-meta">
          {{$blog->created_at->format('D, M Y')}}
        </p>
        <p>
          <code class="language-css">
            p{
            list-style: none;
            }
          </code>
        </p>
        <div class="blog-text">
          {{$blog->content}}
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

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-2">
    @foreach($blogs as $blog)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2"style="color: {{$blog->category->badge}}">
            {{$blog->category->nama}}
          </strong>
          <h3 class="mb-0">{{$blog->judul}}</h3>
          <div class="mb-1 text-muted">
            {{$blog->created_at->format('M Y')}}
          </div>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
      </div>
    </div>
    @endforeach
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">
            Nov 11
          </div>
          <p class="mb-auto">
            This is a wider card with supporting text below as a natural lead-in to additional content.
          </p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

        </div>
      </div>
    </div>
  </div>

</main>

@endsection