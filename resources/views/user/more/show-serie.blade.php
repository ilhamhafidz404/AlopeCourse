@extends('user.more.master-serie')

@section('header')
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
    <?php $tgl = ($serie->created_at->diff()->days < 1) ? $serie->created_at->diffForHumans() : $serie->created_at->isoFormat('F') ?>
    {{$tgl}}
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
@endsection

@section('card-content')
<div class="container-fluid series-content">
  <div class="card p-4 shadow">
    <div class="row">
      @foreach($blogs as $blog)
      <div class="col-md-4 mb-4">
        <a href="{{route('blog.read', $blog->slug)}}">
          <div class="card shadow-sm">
            <div class="blog-serie w-100" style="background-image: url({{asset('storage/'.$blog->thumbnail)}})"></div>
            <div class="card-body pt-1">
              <h5 class="card-title mb-4 text-dark">
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
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection