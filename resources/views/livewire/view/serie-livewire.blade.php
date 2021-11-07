<div class="container-fluid series-content">
    <div class="card p-4 shadow">
      <div class="row">
        @foreach($series as $serie)
        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="{{route('serie.show', $serie->slug)}}">
            <div class="card border-0 bg-transparent px-1 m-auto mb-4">
              <img src="{{asset('storage/thumbnail/serie/'.$serie->thumbnail)}}" class="card-img-rounded" width="100%" height="201px">
              <div class="card-body p-0 mt-1">
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
                  <small class="text-secondary">Serie
                    @if($serie->status == 'complete')
                      <span class="text-success fw-bold">Complete</span>
                    @elseif($serie->status == "development")
                      <span class="text-warning fw-bold">Development</span>
                    @else
                      <span class="text-danger fw-bold">Stuck</span>
                    @endif
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
