@extends('auth.master')


@section('webtitle', 'Registrasi')
@section('title', 'Create an Account')
@section('subtitle')
Daftarkan akun anda untuk menjadi member di ALOPE dan dapatkan tutorial Gratis setiapharinya.
@endsection


@section('form')
<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
      </div>
      <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name" type="text">
      @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
      </div>
      <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" name="email" required value="{{old('email')}}">
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
      </div>
      <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" required name="password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
      </div>
      <input class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password" type="password" required name="password_confirmation">
      @error('password_confirmation')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="text-muted font-italic">
    <small>password strength: <span class="text-success font-weight-700">strong</span></small>
  </div>
  <div class="row my-4">
    <div class="col-12">
      <div class="custom-control custom-control-alternative custom-checkbox">
        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
        <label class="custom-control-label" for="customCheckRegister">
          <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
        </label>
      </div>
    </div>
  </div>
  <div class="text-center mb-4">
    <button type="submit" class="btn btn-primary mt-4 px-5">
      Daftar
    </button>
  </div>
  <div class="text-center">
    <small>
      Sudah punya Akun? <a href="{{route('login')}}">Login</a>
    </small>
  </div>
</form>
@endsection