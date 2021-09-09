@extends('dashboard.master')

@section('title', 'List Blog Tag')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Blog Tag</li>
@endsection

@section('content')
<div class="card">
  <div class="card-header bg-transparent">
    <div class="row">
      <div class="col-md-5">
        <h3 class="mb-0">Tag List</h3>
      </div>
      <div class="col-md-7">
        <h3 class="mb-0">Detail Tag</h3>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      @foreach($tags as $tag)
      <div class="col-md-5">
        <p>
          <button class="btn-icon-clipboard d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#{{$tag->slug}}" aria-expanded="false" aria-controls="collapseExample">
            <div>
              <i class="fab fa-{{$tag->icon}}" style="color: {{$tag->badge}}"></i>
              <span>{{$tag->nama}}</span>
            </div>
            <i class="fas fa-chevron-right" style="color: rgba(0, 0, 0, 0.2)"></i>
          </button>
        </p>
      </div>

      <div class="col-md-7">
        <div class="collapse" id="{{$tag->slug}}">
          <div class="card">
            <div class="card-header py-2 d-flex justify-content-between">
              <h5>
                {{$tag->nama}}
              </h5>
              <div>
                <span class="badge" style="background-color: {{$tag->badge}}">
                  <i class="fab fa-{{$tag->icon}} me-1"></i>
                  {{$tag->slug}}
                </span>
              </div>
            </div>
            <div class="card-body">
              {!!$tag->description!!}
              <hr class="my-3">
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#{{$tag->nama}}">
                <i class="fas fa-pen"></i>
              </button>
              <form action="{{route('tag.destroy', $tag->id)}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="modal fade" id="{{$tag->nama}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$tag->nama}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            <option>Default</option>
                            <option value="laravel">Laravel</option>
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        Edit Tag
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{--<hr class="m-auto" style="background-color: rgba(0,0,0,0.3); width: 40%;"> --}}
      @endforeach
    </div>
  </div>
</div>
@endsection