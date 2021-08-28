@extends("dashboard.master")

@section('title', 'Blog Serie')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('blog.index')}}">Blog</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Blog Series</li>

@endsection

@section("content")
<div class="card p-4">
  <form action="{{route('blog.index')}}">
    <div class="row">
      @foreach($categories as $category)
      <div class="col-md-4">
        <div class="card bg-dark text-white" style="max-height: 150px; overflow: hidden">
          <img src="{{asset('storage/'.$category->thumbnail)}}" class="card-img w-100" alt="thumbnail-kategori{{$category->slug}}">
          <div class="card-img-overlay">
            <div class="position-absolute bottom-0 end-0 start-0 d-flex justify-content-between p-2">
              <div>
                <form action="{{route('blog.index')}}">
                  <button name="serie" class="btn btn-success text-white btn-sm" value="{{$category->slug}}">
                    <i class="fas fa-filter"></i>
                  </button>
                </form>
              </div>
              <div class="d-flex">
                <form action="{{route('series.destroy', $category->id)}}" method="POST" class="ms-2">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit">
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{$category->nama}}
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
    </div>
  </form>
</div>
@endsection