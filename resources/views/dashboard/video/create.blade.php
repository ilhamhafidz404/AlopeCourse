@extends('dashboard.master')

@section('title', 'Tambah Video')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('video.index')}}">Video</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tambah Video</li>
@endsection

@section('content')
<div class="card">
  <form action="{{route('video.create')}}" class="mt-3" method="POST" enctype="multipart/form-data">
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
          <input type="text" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="Judul Blog yang dibuat" id="title" name="title">
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
          <textarea class="form-control" id="editor" rows="4" name="description">

          </textarea>
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
            <i class="fas fa-upload me-2"></i>  Update Video
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection