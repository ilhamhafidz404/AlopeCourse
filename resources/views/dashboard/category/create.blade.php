@extends('dashboard.master')

@section('title', 'Tambah Series')
@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Tambah Serie/Kategori</h3>
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
          <input type="text" class="form-control form-control-alternative @error('judul') is-invalid @enderror" placeholder="Warna badge" id="badge" name="badge" value='{{old("badge")}}'>
          @error('nama')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
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
      <div class="col-md-12">
        <div class="form-group mt-3">
          <button class="btn btn-primary">
            tagg
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection