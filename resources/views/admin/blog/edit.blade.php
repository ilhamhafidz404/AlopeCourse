@extends('admin.master')

@section('title', 'Edit Blog')

@section('breadcrumb')

<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
@endsection


@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Edit Blog {{$blog->judul}}</h3>
  @if(session()->has('error_thumb'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>{{session()->get('error_thumb')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="row">
      <div class="col-md-12 mb-3">
        <input type="file" id="thumbnail" class="dropify" data-height="500" accept="image/*" name="thumbnail" />
      </div>
      <div class="col-md-6 mb-3">
        <label for="judul" class="form-control-label">
          Judul
        </label>
        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{$blog->judul}}" name="judul">
        @error('judul')
        <div class="form-text invalid-feedback text-danger">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label for="serie" class="form-control-label">
          Serie
        </label>
        <select name="category" id="serie" class="form-select">
          <option value="{{$blog->category->id}}" hidden selected>{{$blog->category->nama}}</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">
            {{$category->nama}}
          </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-12 mb-5">
        <textarea class="form-control @error('content') is-invalid @enderror" id="editor" rows="4" name="content">
          {{$blog->content}}
        </textarea>
        @error('content')
        <div class="form-text invalid-feedback text-danger">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-md-3">
        <a href="{{route('blog.index')}}" class="btn btn-danger">
          <i class="fas fa-door-open me-2"></i> Kembali
        </a>
      </div>
      <div class="col-md-9 text-end">
        <button class="btn btn-primary" name="status" value="upload">
          <i class="fas fa-save me-2"></i> Ubah dan Upload Data
        </button>
        <button class="btn btn-warning" value="draff">
          <i class="fas fa-clipboard me-2"></i> Simpan sebagai Draff
        </button>
      </div>
    </div>
  </form>
</div>

@endsection