@extends('auth.master')

@section('webtitle', 'Forgot Password')
@section('title', 'Lupa Password')
@section('subtitle')
Masukan password baru. Ingat jangan sampai lupa lagi dengan password barumu.
@endsection
@section('form')
<form method="POST" action="{{ route('password.update') }}">
  @csrf

  <input type="hidden" name="token" value="{{ $token }}">


  <div class="form-group mb-3">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
      </div>
      <input class="form-control" id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
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
      <input class="form-control" id="password" type="password" class="form-control" name="password" required placeholder="Password Baru">
    </div>
    @error('password')
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
      <input class="form-control" id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi Password Baru">
    </div>
    @error('password_confirmation')
    <small class="text-danger">
      {{$message}}
    </small>
    @enderror
  </div>
  <div class="form-group row mb-0 ">
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-primary px-5">
        {{ __('Reset Password') }}
      </button>
    </div>
  </div>
</form>

@endsection