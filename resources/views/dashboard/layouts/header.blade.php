<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">
            @yield('title')
          </h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item">
                <a href="{{route('dashboard.admin')}}">
                  <i class="fas fa-home"></i>
                </a>
              </li>
              <li class="breadcrumb-item"><a href="{{route('dashboard.admin')}}">Dashboard</a></li>

              @yield('breadcrumb')

              @if(request()->is('dashboard/trash'))
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blog Trash</li>
              {{-- Trash blog --}}
              @elseif(request()->is('dashboard/trash'))
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blog Trash</li>
              @endif
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          @yield('header-button')

          @if(request()->is('dashboard/tag'))
          <div class="btn-group">
            <a href="{{route('tag.create')}}" class="btn btn-sm btn-neutral me-2">
              Tambah Tag
            </a>
            <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
              Filter Blog
            </button>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>