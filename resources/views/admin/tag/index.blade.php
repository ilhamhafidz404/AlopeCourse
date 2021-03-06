@extends('admin.master')

@section('title', 'Tag')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('tag.index')}}">Tag</a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Blog Tag</li>
@endsection

@section('header-button')
<div class="btn-group">
  <a href="{{route('tag.create')}}" class="btn btn-sm btn-neutral me-2">Tambah Tag</a>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-header bg-transparent">
    <h2>List Blog Tag</h2>
  </div>
  <div class="card-body">
    <div class="row">
      @foreach($tags as $tag)
      <div class="col-md-4">
        <p>
          <button class="btn-icon-clipboard d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#{{$tag->slug}}" aria-expanded="false" aria-controls="collapseExample">
            <div>
              <i class="fab fa-{{$tag->icon}}" style="color: {{$tag->badge}}"></i>
              <span>{{$tag->nama}}</span>
            </div>
            <i class="fas fa-chevron-right" style="color: rgba(0, 0, 0, 0.2)"></i>
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
              <hr class="my-3">
              <a type="button" class="btn btn-primary btn-sm" href="{{route('tag.edit', $tag->slug)}}">
                <i class="fas fa-pen"></i>
              </a>
              <form action="{{route('tag.destroy', $tag->id)}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection