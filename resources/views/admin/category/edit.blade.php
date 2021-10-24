@extends('admin.master')

@section('title', 'Edit Series')

@section('breadcrumb')
<li class="breadcrumb-item">
  <a href="{{route('series.index')}}">Series</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Edit Series</li>
@endsection

@section('content')
<div class="card p-3">
  <h3 class="text-uppercase card-title">Edit Serie {{$category->nama}}</h3>
  <form action="{{route('series.update', $category->id)}}" class="mt-3" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="custom-file mb-3">
          <input type="file" id="thumbnail" class="dropify" data-height="230" accept="image/*" name="thumbnail" />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mb-3">
          <label for="nama" class="form-control-label">Nama Series</label>
          <input type="text" class="form-control form-control-alternative @error('nama') is-invalid @enderror" placeholder="Nama series baru" id="nama" name="nama" value='{{$category->nama}}'>
          @error('nama')
          <div class="form-text invalid-feedback text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label for="status" class="form-control-label">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="{{$category->status}}" hidden selected>
                  {{$category->status}}
                </option>
                <option value="development">
                  Development
                </option>
                <option value="complete">
                  Complete
                </option>
                <option value="stuck">
                  Stuck
                </option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label for="level" class="form-control-label">Level</label>
              <select name="level" id="level" class="form-control">
                <option value="{{$category->level}}" hidden selected>
                  {{$category->level}}
                </option>
                <option value="beginner">
                  Beginner
                </option>
                <option value="intermediate">
                  Intermediate
                </option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="tag" class="form-control-label">
            Tag Blog
          </label>
          <select multiple class="form-control" id="tag" name="tags[]" style="height: 135px">
            @foreach($tags as $tag)
              <option value="{{$tag->id}}"
                @foreach($category->tag as $old_tag)
                  @if($old_tag->id == $tag->id)
                    selected
                  @endif
                @endforeach
                >
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
          <label for="description" class="form-control-label">Deskripsi</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="editor" name="description">
            {{$category->description}}
          </textarea>
          @error('description')
          <div class="text-danger invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mt-3">
          <div class="row">
            <div class="col-6">
              <a href="{{route('series.index')}}" class="btn btn-danger">
                <i class="fas fa-door-open me-2">
                  Kembali
                </i>
              </a>
            </div>
            <div class="col-6 text-end">
              <button class="btn btn-primary px-5">
                <i class="fas fa-save me-2"></i>
                Edit Serie
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection