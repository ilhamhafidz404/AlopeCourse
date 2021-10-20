@extends('auth.master')


@section('webtitle', 'Verifikasi Akun')
@section('title', 'Verifikasi Akun')
@section('subtitle')
  Sebelum anda melihat content ini, silahkan verifikasikan terlebih dahulu Email anda.
@endsection
@section('form')
  <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline w-100 text-center">{{ __('Klik untuk mendapatkan link verifikasi') }}</button>.
  </form>
@endsection