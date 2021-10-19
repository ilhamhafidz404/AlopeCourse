@extends('admin.master')

@section('title', 'Tambah Blog')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tambah Blog</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Tambah Pembelajaran Blog Alope Book</h3>
  @if(session()->has('error_thumb'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>{{session()->get('error_thumb')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form action="{{route('blog.store')}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="judul" class="form-control-label">Judul Blog</label>
          <input type="text" class="form-control form-control-alternative @error('judul') is-invalid @enderror" placeholder="Judul Blog yang dibuat" id="judul" name="judul" value='{{old("judul")}}'>
          @error('judul')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="category" class="form-control-label">
            Kategori Blog
          </label>
          <select class="form-control" id="category" name="category">
            <option hidden selected>Pilih Kategori</option>
            @foreach($categories as $category)
            @if (old('category') == $category->id)    
              <option value="{{$category->id}}" selected>
                {{$category->nama}}
              </option>
            @else     
              <option value="{{$category->id}}">
                {{$category->nama}}
              </option>
            @endif
            @endforeach
          </select>
          @error('category')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" id="thumbnail" class="dropify" data-height="320" accept="image/*" name="thumbnail" />
        </div>
        @error('thumbnail')
        <div class="form-text text-danger">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="content" class="form-control-label">Content</label>
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
      <div class="col-md-6">
        <a href="{{route('blog.index')}}" class="btn btn-danger">
          <i class="fas fa-door-open me-2"></i> Kembali
        </a>
      </div>
      <div class="col-md-6 text-end">
        <div class="form-group mt-3">
          <button class="btn btn-warning" name="status" value="draff">
            <i class="fas fa-clipboard me-2"></i>  Simpan sebagai Draff
          </button>
          <button class="btn btn-primary" name="status" value="upload">
            <i class="fas fa-upload me-2"></i>  Upload Blog
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection