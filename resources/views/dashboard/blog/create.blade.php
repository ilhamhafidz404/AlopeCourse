@extends('dashboard.master')

@section('title', 'Tambah Blog')
@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Tambah Pembelajaran Blog Alope Book</h3>
  <form action="{{route('blog.store')}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="judul" class="form-control-label">Judul Blog</label>
          <input type="text" class="form-control form-control-alternative" placeholder="Judul Blog yang dibuat" id="judul" name="judul">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="category" class="form-control-label">
            Kategori Blog
          </label>
          <select class="form-control" id="category" name="category">
            <option hidden selected>Pilih Kategori</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">
              {{$category->nama}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tag" class="form-control-label">
            Tag Blog
          </label>
          <select multiple class="form-control" id="tag" name="tags[]">
            <option hidden selected>Pilih Tag</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">
              {{$category->nama}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" id="thumbnail" accept="image/*" name="thumbnail">
          <label class="custom-file-label" for="thumbnail">Pilih File</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="content" class="form-control-label">Example textarea</label>
          <textarea class="form-control" id="content" rows="4" name="content"></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mt-3">
          <button class="btn btn-primary">
            Upload Blog
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection