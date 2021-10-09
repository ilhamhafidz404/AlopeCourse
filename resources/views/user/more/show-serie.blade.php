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
    <?php $tgl = ($serie->created_at->diff()->days < 1) ? $serie->created_at->diffForHumans() : $serie->created_at->format('F') ?>
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
  <div class="card shadow">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingVideo">
          <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#video">
            Video
          </button>
        </h2>
        <div id="video" class="accordion-collapse collapse show">
          <div class="accordion-body">
            <div class="row">
              @foreach($videos as $video)
              <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="{{route('video.stream', $video->slug)}}">
                  <div class="card border-0 bg-transparent position-relative m-auto mb-4" style="width: 90% !important;">
                    <span class="badge bg-danger position-absolute" style="top-0">
                      Video
                    </span>
                    <div class="rounded video-thumb w-100" style="background-image: url({{asset('storage/thumbnail/video/'.$video->thumbnail)}});"></div>
                    <div class="card-body">
                      <h4 class="card-title my-1 text-dark">
                        {{$video->title}}
                      </h4>
                      <div class="d-flex justify-content-between">
                        <div>
                          <small href="">
                            #{{$video->category->nama}}
                          </small>
                        </div>
                        <div>
                          <span class="badge bg-secondary">
                            Episode {{$video->episode}}
                          </span>
                          <span class="badge bg-secondary">
                            {{$video->duration}}min
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      @if(!$blogs->count() == 0)
      <div class="accordion-item">
        <h2 class="accordion-header" id="headerBlog">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#blog">
            Blog
          </button>
        </h2>
        <div id="blog" class="accordion-collapse collapse">
          <div class="accordion-body">
            <div class="row">
              @foreach($blogs as $blog)
              <div class="col-md-4 mb-4">
                <a href="{{route('blog.read', $blog->slug)}}">
                  <div class="position-relative card shadow-sm">
                    <span class="badge bg-warning text-dark position-absolute" style="top-0">
                      Blog
                    </span>
                    <div class="blog-serie w-100" style="background-image: url({{asset('storage/thumbnail/blog/'.$blog->thumbnail)}})"></div>
                    <div class="card-body pt-1">
                      <h5 class="card-title mb-4 text-dark">
                        {{$blog->judul}}
                      </h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div>
                          <img src="{{asset('storage/profile/'.$blog->user->profile)}}" alt="{{$blog->user->name}}" class="rounded-circle writer-img">
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
      </div>
      @endif
    </div>
  </div>
</div>
@endsection