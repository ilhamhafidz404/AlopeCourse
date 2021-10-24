<nav class="navbar navbar-expand-md navbar-dark bg-transparent fixed-top p-3">
  <div class="container">
    <a class="navbar-brand" href="/">ALOPE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item">
            <a class="nav-link {{request()->is('/')?'active fw-bold':''}}" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('blog*')?'active fw-bold':''}}" href="{{route('blog.list')}}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('video*')?'active fw-bold':''}}" href="{{route('list.video.tutor')}}">Video</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('serie*')?'active fw-bold':''}}" href="{{route('serie.index')}}">Serie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('topic*')?'active fw-bold':''}}" href="{{route('topic')}}">Topic</a>
          </li>
          <li class="nav-item dropdown ms-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="{{route('profile.index', auth()->user()->username)}}">
                  <img src="{{asset('storage/profile/'.auth()->user()->profile)}}" alt="foto-profile" class="rounded-circle me-3" width="30px">
                  Profil
                </a>
              </li>
              @if(auth()->user()->hasRole('admin'))
                <li>
                  <a class="dropdown-item" href="{{route('dashboard.admin')}}">Dashboard</a>
                </li>
              @endif
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{route('profile.edit', auth()->user()->username)}}">
                  <i class="fas fa-cog me-4"></i>
                  Edit Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('changepassword')}}">
                  <i class="fas fa-unlock-alt me-4"></i>
                  Ganti Password
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('invoice')}}">
                  <i class="fas fa-rocket me-4"></i>
                  Beli Token
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('redeem')}}">
                  <i class="fas fa-ticket-alt me-4"></i>
                  Reedem Token
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('message')}}">
                  <i class="fas fa-inbox me-4"></i>
                  Message
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt me-4"></i>
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>