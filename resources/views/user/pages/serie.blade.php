@extends('user.pages-master')

@section('title', 'Alope - Serie')

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
    <span class="fw-bold serie-name position-relative">Explore Serie</span>
  </h1>

  <small class="lead text-white mt-5">
    Ikuti tutorial khusus mengenai suatu serie/pembahasan tertentu.Jika anda kebingungan karena merasa video yang anda tonton serasa kurang nyambung/acak. Ini bisa membuat anda lebih mudah mengikuti alur pengerjaannya secara bertahap.
  </small>
@endsection
@section('header-card')
  <x-premium-card-component></x-premium-card-component>
@endsection

@section('card-content')
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

    @php
      $curl= curl_init();
      curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/playlists?key=AIzaSyBSLmlOfBhdZXTucXCXx17WmcaQWRkX0Tc&channelId=UCR0Gz3-3zuqQuuePqNq9-JA&part=snippet&order=date');
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
              {{-- {{dd($items)}} --}}
                <div class="col-sm-12 col-md-6 col-lg-4">
                  <a href={{ "https://www.youtube.com/playlist?list=".$item['id'] }} target="_blank">
                    <div class="card border-0 bg-transparent position-relative m-auto mb-4" style="width: 90% !important;">
                      <div class="rounded video-thumb w-100" style="background-image: url({{ $item['snippet']['thumbnails']['high']['url'] }})"></div>
                      <div class="card-body">
                        <h5 class="card-title my-1 text-dark">
                          {{ $item['snippet']['title'] }}
                          {{-- {{ dd($item) }} --}}
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
                  {{-- @if ($item['id']['kind'] == 'youtube#video')
                  @endif --}}
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection