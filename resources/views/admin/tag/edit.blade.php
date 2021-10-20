@extends('admin.master')

@section('title', 'Edit Tag')

@section('breadcrumb')
  <li class="breadcrumb-item" aria-current="page">
    <a href="{{route('tag.index')}}">Tag</a>
  </li>
  <li class="breadcrumb-item active" aria-current="page">Edit Blog Tag</li>
@endsection


@section('content')
  <div class="card p-3">
    <h3>Edit Tag {{$tag->slug}}</h3>
    <form action="{{route('tag.update', $tag->id)}}" class="mt-3" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6 pb-3">
          <div class="form-group mb-3">
            <label for="nama" class="form-control-label">Nama Tag</label>
            <input type="text" class="form-control form-control-alternative @error('judul') is-invalid @enderror" placeholder="Nama series baru" id="nama" name="nama" value='{{$tag->nama}}'>
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
            <input type="color" class="form-control form-control-alternative @error('judul') is-invalid @enderror" placeholder="Warna badge" id="badge" name="badge" value='{{$tag->badge}}'>
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
              <option value="code">Default</option>
              <option value="html5">HTML</option>
              <option value="css3-alt">CSS</option>
              <option value="bootstrap">BOOTSTRAP</option>
              <option value="js">Javascript</option>
              <option value="php">PHP</option>
              <option value="node-js">Node Js</option>
              <option value="laravel">Laravel</option>
              <option value="git-alt">Git</option>
              <option value="react">React</option>
              <option value="sass">SASS</option>
              <option value="vuejs">Vue JS</option>
              <option value="unity">Unity</option>
              <option value="python">Python</option>
              <option value="java">Java</option>
              <option value="hotjar">Code Igniter</option>
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="description" class="form-control-label">Content</label>
            <textarea class="form-control" id="editor" name="description">
              {{$tag->description}}
            </textarea>
            @error('description')
              <div class="form-text text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="modal-footer p-0">
        <a type="button" href="{{route('tag.index')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary px-4">
          <i class="fas fa-save me-2"></i>
          Edit Tag
        </button>
      </div>
    </form>
  </div>
@endsection