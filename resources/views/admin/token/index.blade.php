@extends('admin.master')

@section('content')
<div class="card p-3">
  <div class="row">
    @foreach($tokens as $token)
    <div class="col-md-4">
      <div class="card p-3">
        {{$token->token}}
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection