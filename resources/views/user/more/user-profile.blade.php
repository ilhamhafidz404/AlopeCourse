@extends('user.more-master')

@section('title', 'Profile')
@section('martop', '-420px')

@section('content')
  <div class="row my-5">
    <div class="col-lg-7 col-md-8 mt-4">
      <h1 class="display-5 text-white text-uppercase">
        {{$user->name}}
      </h1>
      <p class="text-white mt-0 mb-3" style="white-text: nowrap">
        {{$user->biodata->job}}
        @if($user->biodata->from)
        yang berasal dari {{$user->biodata->from}}
        @endif
      </p>
      <ul class="d-flex">
        @if($user->biodata->twitter)
          <li>
            <a href="https://twitter.com/{{$user->biodata->twitter}}" class="btn me-1 text-white" target="_blank" style="background-color:#00acee ">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
        @endif
        @if($user->biodata->instagram)
        <li>
          <a href="https://instagram.com/{{$user->biodata->instagram}}" class="btn me-1 text-white" target="_blank" style="
            background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);
            ">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
        @endif
        @if($user->biodata->github)
        <li>
          <a href="https://github.com/{{$user->biodata->github}}" class="btn btn-light me-1" target="_blank" style="color: #171515">
            <i class="fab fa-github"></i>
          </a>
        </li>
        @endif
        @if($user->biodata->facebook)
        <li>
          <a href="" class="btn me-1 text-white" style="background-color: #4267B2">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
        @endif
        @if($user->biodata->website)
          <li>
            <a href="" class="btn btn-dark me-1">
              <i class="fas fa-link"></i>
            </a>
          </li>
        @endif
      </ul>
      <p class="text-white mb-5 mt-4">
        {{$user->biodata->about}}
      </p>
      <p class="invisible">
        Kita tidak tau banyak tentang {{$user->name}}, tpi percayalah dia pasti orang yang luar biasa.
      </p>
    </div>
    <div class="col-md-4 col-lg-3">
      <img src="{{asset('storage/profile/'.$user->profile)}}" alt="Profile {{$user->username}}" width="100%" class="img-thumbnail d-md-block d-none" style="max-height: 280px">
    </div>
    <div class="col-md-1"></div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--4">
    <div class="row">
      <div class="col-xl-5">
        <x-user-card-component></x-user-card-component>
      </div>
      <div class="col-xl-7">
        {{-- <x-mini-nav-component></x-mini-nav-component> --}}
        <div class="card p-3" style="height: calc(100% - 30px)">
          <h3>Reedem Token</h3>
          <form action="" class="mt-4">
            <div class="form-group">
              <label for="" class="form-control-label">Kode Redeem</label>
              <input type="text" class="form-control">
            </div>
            <div class="text-center">
              <button class="btn btn-primary px-5 text-white">
                <i class="fas fa-rocket me-3"></i>
                Submit
              </button>
            </div>
            <a href="" class="text-center d-block mt-3">Bara cara mendapatkan kode redeem</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
  </form>
@endsection