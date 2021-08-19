@extends("dashboard.master")

@section("content")
<div class="card">
  <form action="{{route('blog.index')}}">
    @foreach($categories as $category)
    <button name="serie" value="{{$category->slug}}">{{$category->nama}}</button>
    @endforeach
  </form>
</div>
@endsection