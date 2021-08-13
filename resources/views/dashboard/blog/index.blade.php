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
                <a href="">
                  <span class="badge bg-primary">
                    {{$tag->nama}}
                  </span>
                </a>
              </li>
          @endforeach
        </ul>
        <br>
        {{-- <div class="position-absolute end-0 start-0 bottom-0 d-flex align-items-center justify-content-between px-3">
          <a href="" class="btn btn-info btn-sm">
            <i class="fas fa-download"></i>
          </a>
          <div class="keputusan">
            <a href="" class="btn btn-success">
              <i class="fas fa-check"></i>
            </a>
            <a href="" class="btn btn-danger">
              <i class="fas fa-exclamation-triangle"></i>
            </a>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</div>
  @endforeach
  {{$blogs->links()}}
@endsection