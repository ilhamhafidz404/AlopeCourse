@extends('layouts._auth')

@section('form')
<form role="form" method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group mb-3">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
      </div>
      <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
      </div>
      <input class="form-control" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    </div>
  </div>
  <div class="custom-control custom-control-alternative custom-checkbox">
    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
    <label class="custom-control-label" for=" customCheckLogin">
      <span class="text-muted">Remember me</span>
    </label>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary my-4">Sign in</button>
  </div>
</form>
@endsection