@extends("beranda.premium.master")

@section('title', 'Tambah Post')
@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">Post</li>
<li class="breadcrumb-item active" aria-current="page">Tambah Post</li>
@endsection
@section('header_button')
<a href="{{route('post.create')}}" class="btn btn-sm btn-neutral">Buat Post Baru</a>
<a href="#" class="btn btn-sm btn-neutral">Filters</a>
@endsection

@section("content")
<div class="col-md-12">
  <div class="card p-3">
    <form action="{{route('post.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label for="judul" class="form-control-label">Judul Post</label>
            <input type="text" class="form-control form-control-alternative" placeholder="Judul Post yang dibuat" id="judul" name="title" value='{{old("title")}}'>
          </div>
        </div>
        <div class="col-md-12">
          <textarea name="content" id=rows="8" cols="40"></textarea>
        </div>
        <div class="col-md-12">
          <button class="btn btn-primary">Upload</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection