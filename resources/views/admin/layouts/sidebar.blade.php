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
            <a class="nav-link {{request()->is('admin/dashboard')?'active':''}}" href="{{route('dashboard.admin')}}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/users*')?'active':''}}" href="{{route('users.index')}}">
              <i class="ni ni-circle-08 text-yellow"></i>
              <span class="nav-link-text">Management User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/token*')?'active':''}}" href="{{route('token.index')}}">
              <i class="ni ni-diamond text-info"></i>
              <span class="nav-link-text">
                Token Premium
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/invoice*')?'active':''}}" href="{{route('admin.invoice')}}">
              <i class="fas fa-receipt text-purple"></i>
              <span class="nav-link-text">
                Invoice
              </span>
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">
            Tutorial
          </span>
        </h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/blog*')?'active':''}}" href="{{route('blog.index')}}">
              <i class="ni ni-book-bookmark text-primary"></i>
              <span class="nav-link-text">Blog Post</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/blsyntax')?'active':''}}" href="{{route('syntax.index')}}">
              <i class="fas fa-code text-dark"></i>
              <span class="nav-link-text">Blog Syntax</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/series*')?'active':''}}" href="{{route('series.index')}}">
              <i class="ni ni-folder-17 text-yellow"></i>
              <span class="nav-link-text">Serie</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/tag*')?'active':''}}" href="{{route('tag.index')}}">
              <i class="ni ni-tag text-orange"></i>
              <span class="nav-link-text">Serie Tag</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('admin/video*')?'active':''}}" href="{{route('video.index')}}">
              <i class="fab fa-youtube text-danger"></i>
              <span class="nav-link-text">Video</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>