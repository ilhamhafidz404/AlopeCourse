@extends('beranda.master')

@section('content')
<main>
  <div class="album py-5 bg-light">
    <div class="container-fluid">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($blogs as $blog)
        <div class="col-md-6 col-lg-4">
          <a href="{{route('beranda.show', $blog->id)}}">
            <div class="card shadow-sm">
              <img src="{{asset('storage/'.$blog->thumbnail)}}" alt="">
              @foreach($blog->tag as $tag)
              {{$tag->nama}}
              @endforeach
              <div class="card-body">
                <h4 class="card-title mb-0 text-dark">
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