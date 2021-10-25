@extends('user.more-master')

@section('title', 'Profile')
@section('martop', '-420px')

@section('content')
  <div class="row my-5">
    <div class="col-lg-7 col-md-8 mt-4">
      <h1 class="display-2 text-white text-uppercase">
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
            <a href="https://twitter.com/{{$user->biodata->twitter}}" class="btn btn-sm  me-1 text-white" target="_blank" style="background-color:#00acee ">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
        @endif
        @if($user->biodata->instagram)
        <li>
          <a href="https://instagram.com/{{$user->biodata->instagram}}" class="btn btn-sm me-1 text-white" target="_blank" style="
            background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);
            ">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
        @endif
        @if($user->biodata->github)
        <li>
          <a href="https://github.com/{{$user->biodata->github}}" class="btn btn-sm btn-neutral me-1" target="_blank" style="color: #171515">
            <i class="fab fa-github"></i>
          </a>
        </li>
        @endif
        @if($user->biodata->facebook)
        <li>
          <a href="" class="btn btn-sm me-1 text-white" style="background-color: #4267B2">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
        @endif
        @if($user->biodata->website)
        <li>
          <a href="" class="btn btn-sm btn-primary me-1">
            <i class="fas fa-link"></i>
          </a>
        </li>
        @endif
      </ul>
      <p class="text-white mt-0 mb-5">
        {{$user->biodata->about}}
      </p>
      <p class="invisible">
        Kita tidak tau banyak tentang {{$user->name}}, tpi percayalah dia pasti orang yang luar biasa.
      </p>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--5">
    <div class="row">
      <div class="col-xl-5">
        <div class="card card-profile">
          <div class="row justify-content-center">
            <div class="col-lg-4 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{asset('storage/profile/'.$user->profile)}}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-body pt-5">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">22</span>
                    <span class="description">Friends</span>
                  </div>
                  <div>
                    <span class="heading">
                      {{$like}}
                    </span>
                    <span class="description">Like</span>
                  </div>
                  <div>
                    <span class="heading">89</span>
                    <span class="description">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3">
                {{$user->username}}
                @if($user->hasRole('premium'))
                <i class="fas fa-crown text-yellow ms-2"></i>
                @endif
              </h5>
              <div class="h5 font-weight-300">
                Bergabung pada {{$user->created_at->format('M Y')}}
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>University of Computer Science
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-7">
        <x-mini-nav-component></x-mini-nav-component>
      </div>
    </div>
  </div>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
  </form>
@endsection