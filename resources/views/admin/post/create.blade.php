@extends('admin.master')

@section('title', 'Community Post')
@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Community Post</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tambah Post</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Tambah Community Post</h3>
  @if(session()->has('banner_error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>{{session()->get('banner_error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form action="{{route('community-post.store')}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" id="thumbnail" class="dropify" data-height="500" accept="image/*" name="banner" />
        </div>
        @error('banner')
        <div class="form-text text-danger">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="judul" class="form-control-label">Judul Post</label>
          <input type="text" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="Judul Blog yang dibuat" id="judul" name="title" value='{{old("title")}}'>
          @error('title')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="content" class="form-control-label">Pengumuman</label>
          <textarea class="form-control" id="editor" rows="4" name="content">
            {{old('content')}}
          </textarea>
          @error('content')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12 text-end">
        <a href="{{route('community-post.index')}}" class="btn btn-danger">
          <i class="fas fa-door-open me-2"></i> Kembali
        </a>
        <button class="btn btn-primary" name="status" value="upload">
          <i class="fas fa-upload me-2"></i>  Upload Post
        </button>
      </div>
    </div>
  </form>
</div>
@endsection