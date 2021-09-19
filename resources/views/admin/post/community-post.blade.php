@extends('admin.master')

@section('title', 'Community Post')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('posts.index')}}">Post</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Community Post</li>
@endsection

@section('header-button')
<div class="btn-group">
  <a href="{{route('users.create')}}" class="btn btn-sm btn-neutral me-2">Tambah Post</a>
  <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
    Filter Blog
  </button>
  <ul class="dropdown-menu">
    <form action="" method="GET">
      <li>
        <a class="btn btn-transparent w-100" href="{{route('blog.index')}}">Semua</a>
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
<div class="card p-3">
  <div class="row">
    @foreach($posts as $post)
    <div class="col-md-2">
      <div class="sticky-top pb-4">
        <div class="card p-3 bg-gradient-primary mb-2">
          <h4 class="text-white">
            {{$post->created_at->format('d M')}}
          </h4>
          <h3 class="fw-bold text-white">
            {{$post->created_at->format('Y')}}
          </h3>
        </div>
        <div class="card p-3 bg-gradient-warning">
          <h3 class="text-white mb-3 fw-bold">
            Action
          </h3>
          <h4>
            <a href="" class="text-white">
              <i class="fas fa-pencil-alt me-1"></i>
              Edit Post
            </a>
          </h4>
          <h4 class="mt-1">
            <a href="" class="text-white">
              <i class="fas fa-trash-alt me-1"></i>
              Hapus Post
            </a>
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="card bg-white p-3">
        <h2 class="text-center mb-4">{{$post->title}}</h2>
        <div class="post-banner" style="background-image: url({{asset('storage/'.$post->banner)}}); width: 80%; height: 350px; background-position: center; background-size: cover; margin: auto"></div>
        <p class="mt-4">
          {{$post->content}}
        </p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection