@extends("dashboard.master")

@section('title', 'Blog Trash')
@section("content")
@foreach($blogs as $blog)
<div class="card">
  <h1>{{$blog->judul}}</h1>
</div>
@endforeach

<div class="card">
  <form action="{{route('trash.destroy')}}" method="POST">
    @csrf
    @method("DELETE")
    <button class="btn btn-danger">hapus</button>
  </form>
</div>
@endsection