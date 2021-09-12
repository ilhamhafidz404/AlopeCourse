@extends('admin.master')

@section('title', 'Edit Series')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item">
  <a href="{{route('series.index')}}">Series</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Edit Series</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Edit Serie {{$category->nama}}</h3>
  <form action="{{route('series.update', $category->id)}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" id="thumbnail" class="dropify" data-height="500" accept="image/*" name="thumbnail" value="{{$category->thumbnail}}" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="nama" class="form-control-label">Nama Series</label>
          <input type="text" class="form-control form-control-alternative @error('judul') is-invalid @enderror" placeholder="Nama series baru" id="nama" name="nama" value='{{$category->nama}}'>
          @error('nama')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="description" class="form-control-label">Content</label>
          <textarea class="form-control" id="editor" name="description">
            {{$category->description}}
          </textarea>
          @error('description')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mt-3">
          <a href="{{route('series.index')}}" class="btn btn-danger">
            <i class="fas fa-door-open me-2">
              Kembali
            </i>
          </a>
          <button class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            Tambah Serie
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection