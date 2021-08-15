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
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              @if(request()->is('dashboard/blog'))
              <li class="breadcrumb-item" aria-current="page">Blog</li>
              <li class="breadcrumb-item active" aria-current="page">List Blog</li>
              @elseif(request()->is('dashboard/blog/create'))
              <li class="breadcrumb-item" aria-current="page">Blog</li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Blog</li>
              @endif
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          @if(request()->is('dashboard/blog'))
          <a href="{{route('blog.create')}}" class="btn btn-sm btn-neutral">Tambah Blog</a>
          <div class="btn-group">
            <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
              Filter Blog
            </button>
            <ul class="dropdown-menu">
              @foreach($tags as $tag)
              <li>
                <a class="dropdown-item" href="">{{$tag->nama}}</a>
              </li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>