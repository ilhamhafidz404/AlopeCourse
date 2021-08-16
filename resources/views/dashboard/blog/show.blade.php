@extends('dashboard.master')

@section('content')
<div class="col-md-6">
  <div class="card">
    <h1>{{$blog->judul}}</h1>
    <a href="{{route('blog.edit', $blog->slug)}}" class="btn btn-success"></a>
  </div>
</div>
@endsection