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
                <a href="{{route('dashboard.main')}}">
                  <i class="fas fa-home"></i>
                </a>
              </li>
              <li class="breadcrumb-item"><a href="{{route('dashboard.main')}}">Dashboard</a></li>

              {{-- index blog --}}
              @if(request()->is('dashboard/blog'))
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">List Blog</li>

              @elseif(request()->is('dashboard/trash'))
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blog Trash</li>

              {{-- create blog --}}
              @elseif(request()->is('edit'))
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>

              {{-- Serie blog --}}
              @elseif(request()->is('dashboard/series'))
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blog Series</li>

              {{-- Serie blog --}}
              @elseif(request()->is('dashboard/series/create'))
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add Blog Series</li>

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
          @if(request()->is('dashboard/blog'))
          <div class="btn-group">
            <a href="{{route('blog.create')}}" class="btn btn-sm btn-neutral me-2">Tambah Blog</a>
            <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
              Filter Blog
            </button>
            <ul class="dropdown-menu">
              @foreach($draffBlog as $blog)
              <li>
                <a class="dropdown-item" href="">{{$blog->judul}}</a>
              </li>
              @endforeach
            </ul>
          </div>
          @elseif(request()->is('dashboard/series'))
          <div class="btn-group">
            <a href="{{route('series.create')}}" class="btn btn-sm btn-neutral me-2">
              Tambah Serie
            </a>
            <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
              Filter Blog
            </button>
          </div>

          @elseif(request()->is('dashboard/series/create'))
          <a href="{{route('series.index')}}" class="btn btn-sm btn-danger">
            kembali
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>