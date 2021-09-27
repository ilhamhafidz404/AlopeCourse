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
</div>
@endsection

@section('content')
<div class="row">
  @foreach($videos as $video)
  <div class="col-md-6">
    <div class="card overflow-hidden position-relative">
      @if($video->isPremium)
      <i class="fas fa-crown text-yellow position-absolute end-0 top-0 bg-white rounded-circle p-2 m-2"></i>
      @endif
      <div class="card-image" style="height: 200px; width: 100%; background-image: url({{asset('storage/'.$video->thumbnail)}}); background-position: center; background-size: cover;">
      </div>
      <div class="card-body d-flex justify-content-between">
        <div>
          <span class="badge bg-gradient-primary">
            Episode {{$video->episode}}
          </span>
          <span class="badge bg-gradient-danger">
            {{$video->duration}} Menit
          </span>
          <h4 class="mb-0 mt-2">{{$video->title}}</h4>
          <small class="text-muted">{{$video->category->nama}}</small>
        </div>
        <div>
          <form action="{{route('video.destroy', $video->id)}}" class="d-inline" method="POST">
            @csrf
            @method("DELETE")
            <button class="btn btn-sm text-white btn-transparent bg-gradient-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="hapus" onclick="return confirm('yakin?')">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
          <a href="{{route('video.edit', $video->slug)}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
            <i class="fas fa-pen"></i>
          </button>
          <a href="{{route('video.show', $video->slug)}}" class="btn btn-sm px-2 btn-danger d-block mt-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Tutorial">
            <i class="fas fa-play"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection