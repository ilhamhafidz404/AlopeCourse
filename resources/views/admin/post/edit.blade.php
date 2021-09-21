@extends('admin.master')

@section('title', 'Edit Community Post')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Community Post</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Edit Post</li>
@endsection


@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Edit Post {{$post->title}}</h3>
  @if(session()->has('banner_error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>{{session()->get('banner_error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form action="{{route('community-post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="row">
      <div class="col-md-12 mb-3">
        <input type="file" id="thumbnail" class="dropify" data-height="500" accept="image/*" name="banner" />
      </div>
      <div class="col-md-12 mb-3">
        <label for="title" class="form-control-label">
          Judul
        </label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$post->title}}" name="title">
        @error('title')
        <div class="form-text invalid-feedback text-danger">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-md-12 mb-5">
        <textarea class="form-control @error('content') is-invalid @enderror" id="editor" rows="4" name="content">
          {{$post->content}}
        </textarea>
        @error('content')
        <div class="form-text invalid-feedback text-danger">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-md-12 text-end">
        <a href="{{route('community-post.index')}}" class="btn btn-danger">
          <i class="fas fa-door-open me-2"></i> Kembali
        </a>
        <button class="btn btn-primary" name="status" value="upload">
          <i class="fas fa-save me-2"></i> Edit Community Post
        </button>
      </div>
    </div>
  </form>
</div>
@endsection