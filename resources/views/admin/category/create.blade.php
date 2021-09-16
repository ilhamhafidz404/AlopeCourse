@extends('admin.master')

@section('title', 'Tambah Series')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item">
  <a href="{{route('series.index')}}">Series</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tambah Series</li>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Add Blog Series</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Tambah Serie/Kategori</h3>
  @if(session()->has('error_thumb'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>{{session()->get('error_thumb')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form action="{{route('series.store')}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" id="thumbnail" class="dropify" data-height="500" accept="image/*" name="thumbnail" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="nama" class="form-control-label">Nama Series</label>
          <input type="text" class="form-control form-control-alternative @error('nama') is-invalid @enderror" placeholder="Nama series baru" id="nama" name="nama" value='{{old("nama")}}'>
          @error('nama')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="tag" class="form-control-label">
            Tag Blog
          </label>
          <select multiple class="form-control" id="tag" name="tags[]">
            <option hidden selected>Pilih Tag</option>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">
              {{$tag->nama}}
            </option>
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
        <div class="form-group">
          <label for="description" class="form-control-label">
            Deskrisi
          </label>
          <textarea class="form-control" id="editor" name="description">
            {{old('description')}}
          </textarea>
          @error('description')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mt-3">
          <a href="{{route('series.index')}}" class="btn btn-danger">
            <i class="fas fa-door-open me-2"></i> Kembali
          </a>
          <button class="btn btn-primary">
            <i class="fas fa-save me-2"></i> Tambahkan Serie
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection