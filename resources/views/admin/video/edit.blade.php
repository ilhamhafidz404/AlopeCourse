@extends('admin.master')

@section('title', 'Edit Video')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('video.index')}}">Video</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Edit Video</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="card-title text-uppercase">
    Edit Video {{$video->title}}
  </h3>
  <form action="{{route('video.update', $video->id)}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" id="thumbnail" class="dropify" data-height="230" accept="image/*" name="thumbnail" value="{{$video->thumbnail}}" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="title" class="form-control-label">Judul Video</label>
          <input type="text" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="Judul Blog yang dibuat" id="title" name="title" value='{{$video->title}}'>
          @error('title')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="category" class="form-control-label">
            Kategori Video
          </label>
          <select class="form-control" id="category" name="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">
              {{$category->nama}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group mb-3">
          <label for="episodd" class="form-control-label">Episode</label>
          <input type="number" class="form-control form-control-alternative @error('episode') is-invalid @enderror" placeholder="Episode pada Serie ini..." id="episode" name="episode" value="{{$video->episode}}">
          @error('episode')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group mb-3">
          <label for="duration" class="form-control-label">Durasi (menit)</label>
          <div class="input-group">
            <input type="number" class="form-control @error('duration') is-invalid @enderror" placeholder="Durasi" id="duration" name="duration" value="{{$video->duration}}">
            <span class="input-group-text">Menit</span>
          </div>
          @error('duration')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="link" class="form-control-label">Link Video</label>
          <textarea class="form-control" rows="2" name="link">{{$video->link}}</textarea>
          @error('link')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="editor" class="form-control-label">Deskripsi</label>
          <textarea class="form-control" id="editor" rows="4" name="description">
            {{$video->description}}
          </textarea>
          @error('description')
          <div class="form-text text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12 text-end">
        <div class="form-group mt-3">
          <a href="{{route('video.index')}}" class="btn btn-danger">
            <i class="fas fa-door-open me-2"></i>
            Kembali
          </a>
          <button class="btn btn-primary px-5">
            <i class="fas fa-upload me-2"></i>  Update Video
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection