@extends('user.more-master')

@section('title', 'Beli Paket')
@section('martop', '-220px')

@section('content2')
  <div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="my-2">
              Ganti Password
            </h4>
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-5">
            <br>
            <x-user-card-component></x-user-card-component>
          </div>
          <div class="col-7">
            <form action="{{route('password.change')}}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                  <label for="old_password" class="form-control-label">Password Lama</label>
                  <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Masukan Password Lama...">
                  @error('old_password')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="password" class="form-control-label">Password Baru</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password Baru...">
                  @error('password')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="password_confirmation" class="form-control-label">Konfirmasi Password Baru</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukan Password Baru(lagi)...">
                  @error('password_confirmation')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <button class="btn btn-primary ms-auto d-block mt-5 px-5 text-white">
                  <i class="fas fa-save mr-2"></i>
                  Simpan Perubahan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection