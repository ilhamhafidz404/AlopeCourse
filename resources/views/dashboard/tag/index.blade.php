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
                <a href="" class="btn btn-sm btn-primary">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{route('tag.destroy', $tag->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
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