@extends('admin.master')

@section('title', 'Blog Syntax')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Blog Syntax</li>
@endsection

@section('content')
@if(!$blogs->count() == 0)
@foreach ($blogs as $blog)
<div class="col-md-6">
  <div class="card p-3">
    <div class="row">
      <div class="col-sm-5 d-flex align-items-center">
        <img src="{{asset('storage/'.$blog->thumbnail )}}" width="100%" class="rounded">
      </div>
      <div class="col-sm-7 p-3 position-relative">
        <h4 class="my-0 text-uppercase">
          {{$blog->judul}}
        </h4>
        <small class="text-muted ms-2">
          <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="{{$blog->category->nama}}" data-bs-content="{{$blog->category->description}}">
            {{$blog->category->nama}}
          </a>
        </small>
        @if($blog->status == 'upload')
        <span class="badge bg-success position-absolute end-0" style="top: -23px">
          {{$blog->status}}
        </span>
        @elseif($blog->status == 'draff')
        <span class="badge bg-warning position-absolute end-0" style="top: -23px">
          {{$blog->status}}
        </span>
        @elseif($blog->status == 'banned')
        <span class="badge bg-danger position-absolute end-0" style="top: -23px">
          {{$blog->status}}
        </span>
        @endif
        <div class="d-flex justify-content-end">
          <a href="{{route('syntax.add', $blog->slug)}}" class="btn btn-sm btn-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Syntax">
            <i class="fas fa-code"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<div class="card p-3">
  <h4 class="text-center">Belum ada blog yang diupload</h4>
</div>
@endif
@endsection