@extends('admin.master')

@section('title', 'Video Stream')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('video.index')}}">Video</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Stream Video</li>
@endsection

@section('content')
<div class="card p-3">
  <iframe width="100%" height="350px" src="{{$video->link}}"></iframe>
  <br>
</div>

<div class="row">
  <div class="col-md-7">
    <div class="card mb-3 p-3 position-relative">
      <div class="text-center">
        <small>Serie Pembelajaran</small>
        <h3 class="fw-bold mt-0">{{$video->category->nama}}</h3>
        <div class="d-flex align-items-center justify-content-center rounded py-4 bg-gradient-primary top-50 position-absolute" style="width:25px; height:30px; right:-10px; transform: translateY(-50%)">
          <a href="{{$next}}" class="text-white">
            <i class="fas fa-chevron-right"></i>
          </a>
        </div>
        <div class="d-flex align-items-center justify-content-center rounded py-4 bg-gradient-primary top-50 position-absolute" style="width:25px; height:30px; left:-10px; transform: translateY(-50%)">
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
  </div>
  <div class="col-md-5">
    <div class="card shadow-sm p-0">
      <div class="list-group p-0">
        @foreach($videos as $listVideo)
        @if($video->slug == $listVideo->slug)
        <a href="#" class="list-group-item list-group-item-action bg-gradient-primary d-flex justify-content-between text-white" aria-current="true">
          <div style="width:15%" class="d-flex align-items-center justify-content-center">
            <div class="border rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height:30px">
              {{$listVideo->episode}}
            </div>
          </div>
          <div class="ms-2" style="width:85%">
            <h6 class="mb-1 text-white">
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
        <a href="{{route('video.show', $listVideo->slug)}}" class="list-group-item list-group-item-action d-flex justify-content-between" aria-current="true">
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
@endsection