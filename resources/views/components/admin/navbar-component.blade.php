<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Search form -->
      <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
          </div>
        </div>
        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </form>
      <!-- Navbar links -->
      <ul class="navbar-nav align-items-center  ml-md-auto ">
        <li class="nav-item d-xl-none">
          <!-- Sidenav toggler -->
          <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </li>
        <li class="nav-item d-sm-none">
          <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
            <i class="ni ni-zoom-split-in"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link position-relative" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
            <div style="width: 7px; height: 7px; top:5px; right:16px" class="bg-danger rounded-circle position-absolute">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
            <!-- Dropdown header -->
            <div class="px-3 py-3">
              <h6 class="text-sm text-muted m-0">Kamu punya <strong class="text-primary">{{$notifications->count()}}</strong> pemberitahuan.</h6>
            </div>
            <!-- List group -->
            <div class="list-group list-group-flush" style="max-height: 350px; overflow: auto">
              @foreach($notifications as $notification)
              <a href="#!" class="list-group-item list-group-item-action">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <!-- Avatar -->
                    <img alt="Image placeholder" src="{{asset('storage/profile/'.$notification->user->profile)}}" class="avatar rounded-circle">
                  </div>
                  <div class="col ml--2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="mb-0 text-sm">{{$notification->subject}}</h4>
                      </div>
                      <div class="text-right text-muted">
                        <small>{{$notification->created_at->diffForHumans()}}</small>
                      </div>
                    </div>
                    <p class="text-sm mb-0">
                      <span class="text-primary fw-bold">
                        {{$notification->user->username}}
                      </span> :
                      {{$notification->message}}
                    </p>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
            <!-- View all -->
            <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-ungroup"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right py-4">
            <div class="row shortcuts px-4">
              <a href="{{route('dashboard.admin')}}" class="col-4 shortcut-item text-center mb-4">
                <span class="shortcut-media avatar rounded-circle bg-gradient-primary">
                  <i class="ni ni-tv-2"></i>
                </span>
                <small class="text-white">Dashboard</small>
              </a>
              <a href="#!" class="col-4 shortcut-item text-center mb-4">
                <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                  <i class="ni ni-button-play"></i>
                </span>
                <small class="text-white">Youtube</small>
              </a>
              <a href="#!" class="col-4 shortcut-item text-center mb-4">
                <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                  <i class="ni ni-credit-card"></i>
                </span>
                <small class="text-white">Payments</small>
              </a>
              <a href="{{route('beranda')}}" class="col-4 shortcut-item text-center">
                <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                  <i class="ni ni-spaceship"></i>
                </span>
                <small class="text-white">Beranda</small>
              </a>
              <a href="#!" class="col-4 shortcut-item">
                <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                  <i class="ni ni-pin-3"></i>
                </span>
                <small>Maps</small>
              </a>
              <a href="#!" class="col-4 shortcut-item">
                <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                  <i class="ni ni-basket"></i>
                </span>
                <small>Shop</small>
              </a>
            </div>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{asset('storage/profile/'.auth()->user()->profile)}}">
              </span>
              <div class="media-body  ml-2  d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu  dropdown-menu-right ">
            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="{{route('beranda')}}" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Beranda</span>
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>