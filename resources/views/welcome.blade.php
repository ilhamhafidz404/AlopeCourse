@extends('user.master')

@section('content')
<main class="mt-5">
  <div class="album py-5 bg-light">
    <div class="container-fluid">
      <h3 class="mb-4 text-center text-uppercase">Serie Blog</h3>
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


  <div class="latest-blog py-3">
    <div class="container-fluid">
      <div class="m-auto latest-blog-title rounded shadow text-center py-1 mb-4">
        <h3 class="text-uppercase text-white m-0">Blog Terbaru</h3>
      </div>
      <div data-name="Multiple Item" class="glider-contain multiple">
        <div class="gradient-border-bottom">
          <div class="gradient-border">
            <div class="glider" id="blog-series">
              @foreach($blogs as $blog)
              <div>
                <a href="">
                  <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
                    <img src="{{asset('storage/default.jpg')}}" class="card-img-rounded" width="100%">
                    <div class="card-body pt-1 px-0">
                      <small class="card-title text-white">
                        {{$blog->judul}}
                      </small>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <button role="button" aria-label="Previous" class="glider-prev" id="glider-prev-2"><i class="fa fa-chevron-left text-white"></i></i></button>
      <button role="button" aria-label="Next" class="glider-next" id="glider-next-2"><i class="fa fa-chevron-right text-white"></i></i></button>
    <div id="dots2"></div>
  </div>
</div>
</div>

</main>
@endsection