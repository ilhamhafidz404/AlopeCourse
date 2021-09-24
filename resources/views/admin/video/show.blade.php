@extends('admin.master')

@section('title', 'Video Stream')


@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('video.index')}}">Video</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Stream Video</li>
@endsection

@section('content')
<div class="card p-3">
  <iframe width="100%" height="350px" src="{{$video->link}}"></iframe>
  <br>
  <div class="row">
    <div class="col-md-7">
      <div class="card p-3">
        <div id="disqus_thread" class="mt-4"></div>
        <script>
          (function() {
            // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://alope-com.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
          })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card shadow-sm p-0">
        <div class="list-group p-0">
          @foreach($videos as $listvideo)
          @if($listvideo->slug == video->slug)
          <a href="#" class="list-group-item list-group-item-action active d-flex justify-content-between" aria-current="true">
            <div style="width:15%" class="d-flex align-items-center justify-content-center">
              <div class="border rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height:30px">
                {{$listvideo->episode}}
              </div>
            </div>
            <div class="ms-2" style="width:85%">
              <h6 class="mb-1">
                {{$listvideo->title}}
              </h6>
              <small>
                <i class="fas fa-play me-1"></i>
                <span class="fw-bold">
                  Diputar
                </span>
              </span>
            </small>
          </div>
        </a>
        @else
        <a href="{{route('video.stream', $listVideo->slug)}}" class="list-group-item list-group-item-action d-flex justify-content-between" aria-current="true">
          <div style="width:15%" class="d-flex justify-content-center align-items-center">
            <div class="border rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height:30px">
              {{$listVideo->episode}}
            </div>
          </div>
          <div class="ms-2" style="width:85%">
            <h6 class="mb-1">
              {{$listVideo->title}}
            </h6>
            <small>26 Min</small>
          </div>
        </a>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>

@endsection