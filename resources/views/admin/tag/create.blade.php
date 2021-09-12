@extends('admin.master')

@section('title', 'Tambah Tag')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('tag.index')}}">Tag</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Tambah Blog Tag</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Tambah Tag</h3>
  <form action="{{route('tag.store')}}" class="mt-3" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="nama" class="form-control-label">Nama Tag</label>
          <input type="text" class="form-control form-control-alternative @error('judul') is-invalid @enderror" placeholder="Nama series baru" id="nama" name="nama" value='{{old("nama")}}'>
          @error('nama')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="badge" class="form-control-label">Warna Badge</label>
          <input type="color" class="form-control form-control-alternative @error('judul') is-invalid @enderror" placeholder="Warna badge" id="badge" name="badge" value='{{old("badge")}}'>
          @error('nama')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="icon" class="form-control-label">Icon</label>
          <select name="icon" id="icon" class="form-control">
            <option>Default</option>
            <option value="laravel">Laravel</option>
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="description" class="form-control-label">Content</label>
          <textarea class="form-control" id="editor" name="description"></textarea>
          @error('description')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12 ">
        <div class="form-group mt-3">
          <a href="{{route('tag.index')}}" class="btn btn-danger me-3">
            <i class="fas fa-door-open me-2"></i>
            Kembali
          </a>
          <button class="btn btn-primary">
            <i class="fas fa-upload me-2"></i>
            Tambah Tag
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection