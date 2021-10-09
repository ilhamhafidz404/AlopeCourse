@extends("admin.master")

@section('title', 'Blog Serie')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item">
  <a href="{{route('series.index')}}">Series</a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Blog Series</li>
@endsection

@section('header-button')
<div class="btn-group">
  <a href="{{route('series.create')}}" class="btn btn-sm btn-neutral me-2">
    Tambah Serie
  </a>
  <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
    Filter Serie
  </button>
  <ul class="dropdown-menu">
    <form action="" method="GET">
      <li>
        <a class="btn btn-transparent w-100" href="{{route('series.index')}}">Semua</a>
      </li>
      <li>
        <button value="development" name="status" class="btn btn-transparent w-100">
          Development
        </button>
      </li>
      <li>
        <button value="complete" name="status" class="btn btn-transparent w-100">
          Complete
        </button>
      </li>
      <li>
        <button value="stuck" name="status" class="btn btn-transparent w-100">
          Stuck
        </button>
      </li>
    </form>
  </ul>
</div>
@endsection

@section("content")
<div class="card p-4">
  <form action="{{route('blog.index')}}">
    <div class="row">
      @foreach($categories as $category)
      <div class="col-md-4">
        <div class="card bg-dark text-white" style="max-height: 150px; overflow: hidden">
          @if($category->status == 'complete')
          <span class="badge bg-success position-absolute start-0">
            {{$category->status}}
          </span>
          @elseif($category->status == 'development')
          <span class="badge bg-warning position-absolute start-0">
            {{$category->status}}
          </span>
          @elseif($category->status == 'stuck')
          <span class="badge bg-danger position-absolute start-0">
            {{$category->status}}
          </span>
          @endif
          <img src="{{asset('storage/thumbnail/serie/'.$category->thumbnail)}}" class="card-img w-100" alt="thumbnail-kategori{{$category->slug}}">
          <div class="card-img-overlay">
            <div class="position-absolute bottom-0 end-0 start-0 d-flex justify-content-between p-2">
              <div>
                <form action="{{route('blog.index')}}">
                  <button name="serie" class="btn btn-neutral text-dark btn-sm" value="{{$category->slug}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Filter">
                    <i class="fas fa-filter"></i>
                  </button>
                </form>
              </div>
              <div class="d-flex">
                <form action="{{route('series.destroy', $category->id)}}" method="POST" class="ms-2">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="return confirm('Yakin? menghapus serie akan membuat blog dengan serie tersebut ikut terhapus')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
                <button type="button" class="btn btn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#{{$category->slug}}">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="{{$category->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$category->nama}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="{{asset('storage/'.$category->thumbnail)}}" alt="{{$category->slug}} thumbnail" class="w-100 img-thumbnail">
                <hr>
                <b class="mb-2">Deskripsi</b>
                <p>
                  {!!$category->description!!}
                </p>
                <b class="mb-2 mt-4">Tag</b>
                <ul class="mt-3 p-0 d-flex">
                  @foreach($category->tag as $tag)
                  <li class="me-2">
                    <span class="badge" style="background-color: {{$tag->badge}}">
                      {{$tag->nama}}
                    </span>
                  </li>
                  @endforeach
                </ul>
                <br>
                <b>Serie is</b>
                @if($category->status == 'development')
                <span class="text-warning">
                  {{$category->status}}
                </span>
                @elseif($category->status == 'complete')
                <span class="text-success">
                  {{$category->status}}
                  @else
                  <span class="text-danger">
                    {{$category->status}}
                    @endif
                  </span>
                </span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{route('series.edit', $category->slug)}}" class="btn btn-primary">Edit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @if($categories->count() == 0)
      <h3 class="text-center">Serie dengan status {{request("status")}} tidak tersedia</h3>
      @endif
    </div>
  </form>
</div>
@endsection