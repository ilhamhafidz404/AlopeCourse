@extends('dashboard.master')

@section('title', 'List Blog Tag')
@section('content')
<div class="card">
  <div class="card-header bg-transparent">
    <h3 class="mb-0">Icons</h3>
  </div>
  <div class="card-body">
    <div class="row">
      @foreach($tags as $tag)
      <div class="col-md-12">
        <div class="col-md-7">
          <p>
            <button class="btn-icon-clipboard" type="button" data-bs-toggle="collapse" data-bs-target="#{{$tag->slug}}" aria-expanded="false" aria-controls="collapseExample">
              <div>
                <i class="ni ni-active-40"></i>
                <span>{{$tag->nama}}</span>
              </div>
            </button>
          </p>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$tag->nama}}">
                  jj
                </button>
                <form action="{{route('tag.destroy', $tag->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">
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
                        <div class="col-md-6">
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
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection