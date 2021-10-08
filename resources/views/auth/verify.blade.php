@extends('auth.master')

@section('form')
@if (session('resent'))
<div class="alert alert-success" role="alert">
  {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif

{{ __('Sebelum melanjutkan ke halaman lain, silahkan verifikasikan terlebih dahulu akun anda dengan cara klik link yang sudah saya kirim lewat email terdaftar and.') }}
<br>
{{ __('Jika tidak kunjung mendapat email,') }},
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
  @csrf
  <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik untuk mendapatkan link verifikasi') }}</button>.
</form>

@endsection