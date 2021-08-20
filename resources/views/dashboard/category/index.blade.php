@extends("dashboard.master")

@section('title', 'Blog Serie')
@section("content")
<div class="card p-4">
  <form action="{{route('blog.index')}}">
    <div class="row">
      @foreach($categories as $category)
      <div class="col-md-4">
        <div class="card bg-dark text-white">
          <img src="{{asset('storage/default.jpg')}}" class="card-img" alt="...">
          <div class="card-img-overlay">
            <button name="serie" value="{{$category->slug}}">{{$category->nama}}</button>
            <h5 class="card-title">Card title</h5>
            <p class="card-text">{{$category->keterangan}}</p>
            <p class="card-text">Last updated 3 mins ago</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </form>
</div>
@endsection