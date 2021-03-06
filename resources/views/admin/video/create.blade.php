@extends('admin.master')

@section('title', 'Tambah Video')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('video.index')}}">Video</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tambah Video</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="card-title text-uppercase">
    Tambah Tutorial Video
  </h3>

  @if(session()->has('thumb_error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>{{session()->get('thumb_error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif


  <form action="{{route('video.store')}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" id="thumbnail" class="dropify" data-height="230" accept="image/*" name="thumbnail" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="title" class="form-control-label">Judul Video</label>
          <input type="text" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="Judul Video yang dibuat" id="title" name="title">
          @error('title')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="category" class="form-control-label">
            Kategori Video
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
      <div class="col-md-3">
        <div class="form-group mb-3">
          <label for="episode" class="form-control-label">Episode</label>
          <input type="number" class="form-control form-control-alternative @error('episode') is-invalid @enderror" placeholder="Episode pada Serie ini..." id="episode" name="episode">
          @error('episode')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>

      </div>
      <div class="col-md-3">
        <div class="form-group mb-3">
          <label for="duration" class="form-control-label">Durasi</label>
          <div class="input-group">
            <input type="number" class="form-control @error('duration') is-invalid @enderror" placeholder="Durasi" id="duration" name="duration">
            <span class="input-group-text">Menit</span>
          </div>
          @error('duration')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
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
          <textarea class="form-control" id="editor" rows="4" name="description">
          </textarea>
          @error('description')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="premium" id="premium">
          <label class="form-check-label" for="premium">Upload sebagai tutorial Premium</label>
        </div>
      </div>
      <div class="col-md-12 text-end">
        <a href="{{route('video.index')}}" class="btn btn-danger me-3">
          <i class="fas fa-door-open me-2"></i>
          Kembali
        </a>
        <button class="btn btn-primary">
          <i class="fas fa-upload me-2"></i>  Update Video
        </button>
      </div>
    </div>
  </form>
</div>
@endsection