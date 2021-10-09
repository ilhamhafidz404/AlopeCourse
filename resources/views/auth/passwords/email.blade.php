@extends('auth.master')


@section('webtitle', 'Forgot Password')
@section('title', 'Lupa Password')
@section('subtitle')
Masukan Email terdaftar anda untuk mendapatkan link ganti password akun.
@endsection
@section('form')
@if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
  @csrf

  <div class="form-group mb-4">
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
  <div class="form-group row mb-0">
    <button type="submit" class="btn btn-primary w-100 mx-3">
      Kirim Link Reset Password
    </button>
  </div>
</form>
@endsection