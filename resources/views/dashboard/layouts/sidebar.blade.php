<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{asset('template')}}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/dashboard')?'active':''}}" href="{{route('dashboard.main')}}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('users*')?'active':''}}" href="{{route('users.index')}}">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Management User</span>
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Blog Post</span>
        </h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/blog*')?'active':''}}" href="{{route('blog.index')}}">
              <i class="ni ni-book-bookmark text-primary"></i>
              <span class="nav-link-text">Blog Post</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/series*')?'active':''}}" href="{{route('series.index')}}">
              <i class="ni ni-folder-17 text-yellow"></i>
              <span class="nav-link-text">Blog Serie</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/tag*')?'active':''}}" href="{{route('tag.index')}}">
              <i class="ni ni-tag text-success"></i>
              <span class="nav-link-text">Blog Tag</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('dashboard/trash')?'active':''}}" href="{{route('trash.index')}}">
              <i class="fas fa-trash-alt text-danger"></i>
              <span class="nav-link-text">Blog Trash</span>
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Video Tutorial</span>
        </h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{request()->is('dashboard/video')?'active':''}}" href="{{route('video.index')}}">
              <i class="fab fa-youtube text-danger"></i>
              <span class="nav-link-text">Video</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/map.html">
              <i class="ni ni-pin-3 text-primary"></i>
              <span class="nav-link-text">Google</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/icons.html">
              <i class="ni ni-planet text-orange"></i>
              <span class="nav-link-text">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/map.html">
              <i class="ni ni-pin-3 text-primary"></i>
              <span class="nav-link-text">Google</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/tables.html">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/login.html">
              <i class="ni ni-key-25 text-info"></i>
              <span class="nav-link-text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/register.html">
              <i class="ni ni-circle-08 text-pink"></i>
              <span class="nav-link-text">Register</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/upgrade.html">
              <i class="ni ni-send text-dark"></i>
              <span class="nav-link-text">Upgrade</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Documentation</span>
        </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Getting started</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
              <i class="ni ni-palette"></i>
              <span class="nav-link-text">Foundation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
              <i class="ni ni-ui-04"></i>
              <span class="nav-link-text">Components</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
              <i class="ni ni-chart-pie-35"></i>
              <span class="nav-link-text">Plugins</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>