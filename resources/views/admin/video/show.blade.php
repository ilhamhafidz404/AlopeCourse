@extends('admin.master')

@section('title', 'Video Stream')


@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('video.index')}}">Video</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Stream Video</li>
@endsection

@section('content')
<div class="card p-3">
  <iframe width="100%" height="350px" src="{{$video->link}}"></iframe>
</div>
@endsection