@extends('beranda.master')

@section('content')
<main>
  <div class="album py-5 bg-light">
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($series as $serie)
        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="{{route('topic.show', $serie->slug)}}">
            <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
              <img src="{{asset('storage/'.$serie->thumbnail)}}" class="card-img-rounded" width="100%">
              <div class="card-body">
                @foreach($serie->tag as $tag)
                <span class="badge" style="background-color:{{$tag->badge}}">
                  {{$tag->nama}}
                </span>
                @endforeach
                <h4 class="card-title my-2 text-dark">
                  {{$serie->nama}}
                </h4>
                <div class="card-text d-flex justify-content-between">
                  <small class="text-muted">
                    {{$serie->created_at->diffForHumans()}}
                  </small>
                  <small class="text-secondary">Serie <Span class="text-success fw-bold">Complete</Span></small>
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