@extends('user.pages-master')

@section('title', 'Alope - Video')

@section('header')
<br>
<a class="py-1 px-3 mt-5 header-hot d-flex justify-content-between align-items-center text-white" href="{{route('invoice')}}">
  <div>
    <span class="badge bg-danger me-2">
      <i class="fas fa-fire me-1"></i> HOT
    </span>
    <small>
      Reedem untuk membuka seluruh tutorial
    </small>
  </div>
  <i class="fas fa-chevron-right"></i>
</a>
<h1 class="fw-light text-uppercase mt-3">
  <span class="fw-bold serie-name position-relative">Video Tutorial</span>
</h1>

<small class="lead text-white mt-5">
  Tutorial dalam bentuk video yang akan membuat anda lebih mengerti tentang solusi dari permasalahan yang ada. Dengan penjelasan yang singkat dan mudah dimengerti pasti akan membuat anda mudah memahami.
</small>
@endsection

@section('header-card')
    <x-youtube-card-component></x-youtube-card-component>
@endsection

@section('card-content')
<div class="container-fluid series-content">
  <div class="card p-4 shadow position-relative">
    {{-- <div class="header-card position-absolute rounded shadow-sm">
      <h4 class="text-uppercase text-white">List Video</h4>
    </div> --}}
    <div class="row mt-4">
      @foreach($videos as $video)
      <div class="col-sm-12 col-md-6 col-lg-4">
        <a href="{{route('video.stream', $video->slug)}}">
          <div class="card border-0 bg-transparent position-relative m-0 mb-4">
            <div class="rounded video-thumb w-100" style="background-image: url({{asset('storage/thumbnail/video/'.$video->thumbnail)}});"></div>
            @if ($video->isPremium)
              <span class="badge bg-white position-absolute end-0 m-3 py-2 px-1 shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="CSS">
                <i class="fas fa-crown text-warning"></i>
              </span>
            @endif
            <div class="card-body">
              <h4 class="card-title my-1 text-dark">
                {{$video->title}}
              </h4>
              <div class="d-flex justify-content-between">
                <div>
                  <small href="">
                    #{{$video->category->nama}}
                  </small>
                </div>
                <div>
                  <span class="badge bg-secondary">
                    Episode {{$video->episode}}
                  </span>
                  <span class="badge bg-secondary">
                    25 Menit
                  </span>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
      {{$videos->links()}}
    </div>

    @php
      $curl= curl_init();
      curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBSLmlOfBhdZXTucXCXx17WmcaQWRkX0Tc&channelId=UCR0Gz3-3zuqQuuePqNq9-JA&part=snippet&order=date');
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $result= curl_exec($curl);
      curl_close($curl);

      $result= json_decode($result, true);
      $items= $result['items']
    @endphp
    <div class="accordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headerYoutube">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#youtube">
            Youtube
          </button>
        </h2>
        <div id="youtube" class="accordion-collapse collapse">
          <div class="accordion-body">
            <div class="row">
              @foreach ($items as $item)
                  @if ($item['id']['kind'] == 'youtube#video')
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <a href={{"https://www.youtube.com/watch?v=".$item['id']['videoId']}} target="_blank">
                        <div class="card border-0 bg-transparent position-relative m-auto mb-4" style="width: 90% !important;">
                          <div class="rounded video-thumb w-100" style="background-image: url({{$item['snippet']['thumbnails']['high']['url']}})"></div>
                          <div class="card-body">
                            <h5 class="card-title my-1 text-dark">
                              {{ $item['snippet']['title'] }}
                            </h5>
                            <div class="d-flex justify-content-between">
                              <div>
                                <small href="">
                                  #category
                                </small>
                              </div>
                              <div>
                                <span class="badge bg-secondary">
                                  Episode
                                </span>
                                <span class="badge bg-secondary">
                                  min
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection