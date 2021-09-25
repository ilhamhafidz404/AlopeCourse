@extends('admin.master')

@section('title', 'Buat Syntax Blog')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('syntax.index')}}">Blog Syntax</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Buat Syntax Blog</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Buat Syntax Blog {{$blog->judul}}</h3>
  <form action="{{route('syntax.save', $blog->id)}}" class="mt-3" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="content" class="form-control-label">Content</label>
          <textarea class="form-control" rows="10" name="content">
            {{$blog->content}}
          </textarea>
          @error('content')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12 text-end">
        <a href="{{route('syntax.index')}}" class="btn btn-danger">
          <i class="fas fa-door-open me-2"></i> Kembali
        </a>
        <button class="btn btn-primary">
          <i class="fas fa-upload me-2"></i>  Tambah Syntax
        </button>
      </div>
    </div>
  </form>
</div>
@endsection