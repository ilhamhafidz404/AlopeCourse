@extends('dashboard.master')

@section('title', 'List Blog')
@section('content')
<div class="col-xl-8">
  @foreach ($blogs as $blog)
  <div class="card p-2">
    <div class="row">
      <div class="col-sm-3 d-flex align-items-center">
        <img src="{{asset('storage/'.$blog->thumbnail )}}" width="100%" class="rounded">
      </div>
      <div class="col-sm-9 p-3 pb-5 position-relative">
        <h4 class="my-0 text-uppercase d-inline">
          {{$blog->judul}}
        </h4>
        <small class="text-muted ms-2">
          {{$blog->category->nama}}
        </small>
        <br>
        <span class="badge bg-warning">
          <i class="fas fa-info-circle me-1"></i>
          Dokumen minta Perizinan
        </span>
        <div class="my-3">
          <p class="text-muted my-0">
            Meminta Perizinan Pada : 06-12-2020
          </p>
          <p class="text-muted mt-0 mb-3">
            Direspon Pada : <i>Belum Direspon</i>
          </p>
          <p>
          </p>
        </div>
        <div class="position-absolute end-0 start-0 bottom-0 d-flex align-items-center justify-content-between px-3">
          <a href="" class="btn btn-info">
            <i class="fas fa-download"></i>
          </a>
          <div class="keputusan">
            <a href="" class="btn btn-success">
              <i class="fas fa-check"></i>
            </a>
            <a href="" class="btn btn-danger">
              <i class="fas fa-exclamation-triangle"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  {{$blogs->links()}}
</div>
@endsection