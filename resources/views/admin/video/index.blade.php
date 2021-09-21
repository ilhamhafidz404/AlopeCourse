@extends('admin.master')

@section('title', 'Video')


@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('video.index')}}">Video</a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Video</li>
@endsection

@section('header-button')
<div class="btn-group">
  <a type="button" class="btn btn-neutral me-2 btn-sm" href="{{route('video.create')}}">
    Tambah Video
  </a>
  <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
    Filter Blog
  </button>
  <ul class="dropdown-menu">
    <form action="" method="GET">
      <li>
        <a class="btn btn-transparent w-100" href="">Semua</a>
      </li>
      <li>
        <button value="upload" name="status" class="btn btn-transparent w-100">Upload</button>
      </li>
      <li>
        <button value="draff" name="status" class="btn btn-transparent w-100">Draff</button>
      </li>
      <li>
        <button value="banned" name="status" class="btn btn-transparent w-100">Banned</button>
      </li>
    </form>
  </ul>
</div>
@endsection

@section('content')
<div class="row">
  @foreach($videos as $video)
  <div class="col-md-6">
    <div class="card overflow-hidden">
      <div class="card-image" style="height: 200px; width: 100%; background-image: url({{asset('storage/'.$video->thumbnail)}}); background-position: center; background-size: cover;">
      </div>
      <div class="card-body d-flex justify-content-between">
        <div>
          <h4 class="mb-0">{{$video->title}}</h4>
          <small class="text-muted">{{$video->category->nama}}</small>
        </div>
        <div>
          <a href="{{route('video.edit', $video->slug)}}" class="btn btn-primary btn-sm">
            <i class="fas fa-pen"></i>
          </button>
          <a href="{{route('video.show', $video->slug)}}" class="btn btn-sm px-3 btn-danger">
            <i class="fas fa-play"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection