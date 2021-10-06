@extends('auth.master')

@section('webtitle', 'Login')
@section('title', 'Login Account')
@section('subtitle')
Pastikan Email dan Password yang anda masukan sudah terdaftar di ALOPE.
@endsection
@section('form')
<form role="form" method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group mb-3">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
      </div>
      <input class="form-control" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
    </div>
    @error('email')
    <small class="text-danger">
      {{$message}}
    </small>
    @enderror
  </div>
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
      </div>
      <input class="form-control" id="password" type="password" class="form-control" name="password" required placeholder="Password">
    </div>
    @error('password')
    <small class="text-danger">
      {{$message}}
    </small>
    @enderror
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="custom-control custom-control-alternative custom-checkbox">
        <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
        <label class="custom-control-label" for=" customCheckLogin">
          <span class="text-muted">Remember me</span>
        </label>
      </div>
    </div>
    <div class="col-md-6 text-right">
      <small class="ms-auto">
        <a href="{{route('register')}}">Daftar Akun</a>
      </small>
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary my-4 px-5">Masuk</button>
  </div>
</form>
@endsection