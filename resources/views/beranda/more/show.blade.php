@extends('beranda.master')

@section('content')
<div class="container-fluid">
  <div class="card mt-5">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        The current link item
      </a>
      <a href="#" class="list-group-item list-group-item-action">A second link item</a>
      <a href="#" class="list-group-item list-group-item-action">A third link item</a>
      <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
      <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
    </div>
  </div>
</div>
@endsection