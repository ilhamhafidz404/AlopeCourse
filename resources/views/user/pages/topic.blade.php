@extends('user.pages-master')

@section('title', 'Alope - Topic')

@section('header')
<a class="py-1 px-3 mt-5 header-hot d-flex justify-content-between align-items-center text-white" href="{{route('invoice')}}">
  <div>
    <span class="badge bg-danger me-2">
      <i class="fas fa-fire me-1"></i> HOT
    </span>
    <small>
      Reedem untuk membuka seluruh tutorial
    </small>
  </div>
  <i class="fas fa-chevron-right"></i>
</a>

<h1 class="fw-light text-uppercase mt-3">
  <span class="fw-bold serie-name position-relative">Explore Topic {{request()->tag}}</span>
</h1>

<small class="lead text-white mt-5">
  @if(request()->tag)
    {!!$tag->description!!}
  @else
    Ikuti tutorial dengan topic yang sesuai dengan bahasa pemrogramman/Framework yang sedang ingin anda pelajari. Ini membantu anda supaya anda bisa fokus untuk mempelajari teknologi tertentu secara bertahap.
  @endif
</small>
<form action="" class="mt-5">
  <ul class="d-flex p-0">
    @foreach($tags as $tag)
      <li class="me-2">
        @if(request('tag') == $tag->slug)
          <button class="btn btn-transparent btn-lg px-4 py-3 d-flex align-items-center justify-content-center shadow-sm" value="{{$tag->slug}}" style="background-color: {{$tag->badge}} !important;" name="tag">
            <i class="fab fa-{{$tag->icon}} fs-2 fw-bold text-white"></i>
          </button>
        @else
          <button class="btn btn-transparent btn-lg px-4 py-3 d-flex align-items-center justify-content-center shadow-sm" value="{{$tag->slug}}" style="border-color: {{$tag->badge}} !important; background-color: rgba(54,39,93, 0.3)" name="tag">
            <i class="fab fa-{{$tag->icon}} fs-2" style="color:{{$tag->badge}}"></i>
          </button>
        @endif
      </li>
    @endforeach
  </ul>
</form>
@endsection

@section('card-content')
<div class="container-fluid series-content">
  <div class="card p-4 shadow">
    <div class="row">
      @if ($series->count() > 0)
        @foreach($series as $serie)
          <div class="col-sm-12 col-md-6 col-lg-4">
            <a href="{{route('serie.show', $serie->slug)}}">
              <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
                <img src="{{asset('storage/thumbnail/serie/'.$serie->thumbnail)}}" class="card-img-rounded" width="100%">
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
      @else
          <h5 class="text-center mt-0">Belum tersedia tutorial yang terkait dengan serie ini</h5>
      @endif
    </div>
  </div>
</div>
@endsection