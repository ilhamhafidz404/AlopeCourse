@extends('admin.master')

@section('title', 'List Blog')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Blog</li>
@endsection

@section('header-button')
<div class="btn-group">
  <a href="{{route('blog.create')}}" class="btn btn-sm btn-neutral me-2">Tambah Blog</a>
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
@if(!$blogs->count() == 0)
  @foreach ($blogs as $blog)
    <div class="col-md-6">
      <div class="card p-3">
        <div class="row">
          <div class="col-sm-5 d-flex align-items-center">
            <img src="{{asset('storage/thumbnail/blog/'.$blog->thumbnail )}}" width="100%" class="rounded">
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
              @if($blog->status === "upload")
                <form action="{{route('blog.banned', $blog->id)}}" method="POST">
                  @csrf
                  @method("PUT")
                  <button class="btn btn-warning btn-sm" name="status" data-bs-toggle="tooltip" data-bs-placement="top" title="Banned">
                    <i class="fas fa-ban"></i>
                  </button>
                </form>
              @elseif($blog->status === 'draff')
                <a href="{{route('blog.edit', $blog->slug)}}" class="btn btn-sm me-0 btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                  <i class="fas fa-pencil-alt"></i>
                </a>
              @elseif($blog->status === 'banned')
                <form action="{{route('blog.destroy', $blog->id)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-sm  btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="return confirm('Yakin ingin menghapus Blog ini secara permanent?')" type="submit">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              @endif
              <a href="{{route('blog.show', $blog->slug)}}" class="btn btn-sm btn-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                <i class="fas fa-eye"></i>
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

{{$blogs->links()}}
@endsection