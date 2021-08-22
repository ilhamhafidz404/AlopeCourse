@extends("dashboard.master")

@section('title', 'Blog Serie')
@section("content")
<div class="card p-4">
  <form action="{{route('blog.index')}}">
    <div class="row">
      @foreach($categories as $category)
      <div class="col-md-4">
        <div class="card bg-dark text-white" style="height: 100px">
          <img src="{{asset('storage/'.$category->thumbnail)}}" class="card-img w-100" alt="...">
          <div class="card-img-overlay">
            <button name="serie" value="{{$category->slug}}">{{$category->nama}}</button>
            <form action="{{route('series.destroy', $category->id)}}" method="POST" class="ms-2">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">
                <i class="fas fa-trash"></i>
              </button>
            </form>
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              {{$category->description}}
            </p>
            <p class="card-text">
              Last updated 3 mins ago
            </p>
          </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$category->slug}}">
          Launch demo modal
        </button>

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