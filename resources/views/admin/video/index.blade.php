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
  <button type="button" class="btn btn-neutral me-2 btn-sm" data-bs-toggle="modal" data-bs-target="#createVideo">
    Tambah Video
  </button>
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

<div class="modal fade" id="createVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Video Tutorial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('video.store')}}" class="mt-3" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="custom-file mb-3">
                <input type="file" id="thumbnail" class="dropify" data-height="500" accept="image/*" name="thumbnail" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="title" class="form-control-label">Judul Video</label>
                <input type="text" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="Judul Blog yang dibuat" id="title" name="title" value='{{old("judul")}}'>
                @error('title')
                <div class="form-text invalid-feedback text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="category" class="form-control-label">
                  Kategori Blog
                </label>
                <select class="form-control" id="category" name="category">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">
                    {{$category->nama}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="link" class="form-control-label">Link Video</label>
                <textarea class="form-control" rows="2" name="link"></textarea>
                @error('link')
                <div class="form-text text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="editor" class="form-control-label">Deskripsi</label>
                <textarea class="form-control" id="editor" rows="4" name="description"></textarea>
                @error('description')
                <div class="form-text text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 text-end">
              <div class="form-group mt-3">
                <button class="btn btn-primary">
                  <i class="fas fa-upload me-2"></i>  Upload Video
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection