@extends('beranda.master')

@section('content')
<main>
  <div class="album py-5 bg-light">
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($blogs as $blog)
        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="{{route('beranda.show', $blog->slug)}}">
            <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
              <img src="{{asset('storage/'.$blog->thumbnail)}}" class="card-img-rounded" width="100%">
              <div class="card-body">
                <ul class="p-0 d-flex my-0">
                   @foreach($blog->tag as $tag)
                     <li class="me-2">
                       <a href=""><small>{{$tag->nama}}</small></a>
                     </li>
                   @endforeach
                </ul>
                <h4 class="card-title mb-2 text-dark">
                  {{$blog->judul}}
                </h4>
                <div class="card-text d-flex justify-content-between">
                  <span class="badge" style="background-color:{{$blog->category->badge}}">
                    {{$blog->category->nama}}
                  </span>
                  <small class="text-muted">
                    {{$blog->created_at->diffForHumans()}}
                  </small>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</main>
@endsection