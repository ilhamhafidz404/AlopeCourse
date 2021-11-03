<div class="card card-profile">
    <div class="row justify-content-center">
      <div class="col-lg-4 order-lg-2">
        <div class="card-profile-image">
          <a href="#">
            {{-- <img src="{{asset('storage/profile/'.$user->profile)}}" class="rounded-circle"> --}}
            <div class="rounded-circle position-absolute shadow-sm" style="width: 100px; height: 100px; background-image: url({{asset('storage/profile/'.$user->profile)}}); top: -30px; left: 50%; background-size: cover; background-position: center; transform: translateX(-50%)"></div>
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
        <h5 class="">
          {{$user->username}}
          @if($user->hasRole('premium'))
            <i class="fas fa-crown text-yellow ms-2"></i>
          @endif
        </h5>
        <div class="font-weight-300">
          Bergabung pada {{$user->created_at->format('M Y')}}
        </div>
        <div class="mt-4 text-muted">
          <i class="ni business_briefcase-24 mr-2"></i>{{$user->biodata->job}} - {{$user->biodata->from}}
        </div>
        <div>
          {{-- <i class="ni education_hat mr-2"></i>University of Computer Science --}}
        </div>
      </div>
    </div>
</div>