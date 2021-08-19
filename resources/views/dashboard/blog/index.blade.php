@extends('dashboard.master')

@section('title', 'List Blog')
@section('content')
@foreach ($blogs as $blog)
<div class="col-md-6">
  <div class="card p-3">
    <div class="row">
      <div class="col-sm-4 d-flex align-items-center">
        <img src="{{asset('storage/'.$blog->thumbnail )}}" width="100%" class="rounded">
      </div>
      <div class="col-sm-8 p-3 position-relative">
        <h4 class="my-0 text-uppercase d-inline">
          {{$blog->judul}}
        </h4>
        <small class="text-muted ms-2">
          {{$blog->category->nama}}
        </small>
        <ul class="d-flex p-0">
          @foreach ($blog->tag as $tag)
          <li class="me-2">
            <a href="" class="text-white me-2">
              <span class="badge bg-primary">
                {{$tag->nama}}
              </span>
            </a>
          </li>
          @endforeach
        </ul>
        <div class="d-flex justify-content-end">
          <form action="{{route('blog.update', $blog->id)}}" method="POST">
            @csrf
            @method("PUT")
            <input type="hidden" name="judul" value="{{$blog->judul}}">
            <input type="hidden" name="category" value="{{$blog->category->id}}">
            <input type="hidden" name="content" value="{{$blog->content}}">
            <input type="hidden" name="thumbnail" value="{{$blog->thumbnail}}">
            <button class="btn btn-danger btn-sm" name="status" value="reject">
              <i class="fas fa-exclamation-triangle"></i>
            </button>
          </form>
          <a href="{{route('blog.show', $blog->slug)}}" class="btn btn-sm btn-primary ms-2">
            <i class="fas fa-eye"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
{{$blogs->links()}}
<h3>List Draff Blog</h3>
@foreach($draffBlog as $blog)
<div class="col-md-6">
  <div class="card p-3">
    <div class="row">
      <div class="col-sm-4 d-flex align-items-center">
        <img src="{{asset('storage/'.$blog->thumbnail )}}" width="100%" class="rounded">
      </div>
      <div class="col-sm-8 p-3 position-relative">
        <h4 class="my-0 text-uppercase d-inline">
          {{$blog->judul}}
        </h4>
        <small class="text-muted ms-2">
          {{$blog->category->nama}}
        </small>
        <ul class="d-flex p-0">
          @foreach ($blog->tag as $tag)
          <li class="me-2">
            <a href="">
              <span class="badge bg-primary">
                {{$tag->nama}}
              </span>
            </a>
          </li>
          @endforeach
        </ul>
        <div class="d-flex justify-content-end">
          <a href="{{route('blog.edit', $blog->slug)}}" class="btn btn-sm btn-info">
            <i class="fas fa-pencil-alt"></i>
          </a>
          <a href="{{route('blog.show', $blog->slug)}}" class="btn btn-sm btn-primary">
            <i class="fas fa-eye"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection