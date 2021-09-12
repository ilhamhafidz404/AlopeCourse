@extends('user.more.master-serie')

@section('header')
<a class="py-1 px-3 mt-5 header-hot d-flex justify-content-between align-items-center text-white">
  <div>
    <span class="badge bg-danger me-2">
      <i class="fas fa-fire me-1"></i> HOT
    </span>
    <small>
      Berbagi Cerita di Alope Journey
    </small>
  </div>
  <i class="fas fa-chevron-right"></i>
</a>

<h1 class="fw-light text-uppercase mt-3">
  <span class="fw-bold serie-name position-relative">Explore Serie</span>
</h1>

<small class="lead text-white mt-5">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus voluptatum, ex illum deserunt eligendi tempore ullam quas illo aspernatur culpa esse accusamus, vitae expedita molestias dolorum voluptatem voluptate excepturi assumenda.
</small>
@endsection

@section('card-content')
<div class="container-fluid series-content">
  <div class="card p-4 shadow">
    <div class="row">
      @foreach($series as $serie)
      <div class="col-sm-12 col-md-6 col-lg-4">
        <a href="{{route('serie.show', $serie->slug)}}">
          <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
            <img src="{{asset('storage/'.$serie->thumbnail)}}" class="card-img-rounded" width="100%">
            <div class="card-body p-0 mt-1">
              @foreach($serie->tag as $tag)
              <span class="badge" style="background-color:{{$tag->badge}}">
                {{$tag->nama}}
              </span>
              @endforeach
              <h4 class="card-title my-2 text-dark">
                {{$serie->nama}}
              </h4>
              <div class="card-text d-flex justify-content-between">
                <small class="text-muted">
                  {{$serie->created_at->diffForHumans()}}
                </small>
                <small class="text-secondary">Serie
                  @if($serie->status == 'complete')
                  <span class="text-success fw-bold">Complete</span>
                  @elseif($serie->status == "development")
                  <span class="text-warning fw-bold">Development</span>
                  @else
                  <span class="text-danger fw-bold">Stuck</span>
                  @endif
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