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
  </div>
</div>
@endsection