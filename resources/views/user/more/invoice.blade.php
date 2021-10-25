@extends('user.more-master')

@section('title', 'Beli Paket')
@section('martop', '-420px')

@section('content')
  <div class="row mt-5">
    <div class="col-md-8 mt-4">
      <h1 class="display-2 text-white text-uppercase">
        ALOPE PREMIUM
      </h1>
      <p class="text-white mt-0 mb-3" style="white-text: nowrap">
        Silahkan isi bukti kalau anda sudah membayar paket pada kami. Setelah mengirim Form, klik button "Hubungi Admin" untuk mendapat notice dari kami lebih cepat lagi.
      </p>
      <p class="text-white mt-0 mb-5">
        Jika kalian sudah mengirim form pembayaran ini, isi juga form bukti pembelian yang akan tergenerate setelah mengirim formulir.
      </p>
    </div>
  </div>
@endsection

@section('content2')
  <div class="container-fluid mt-4">
    <div class="card p-3">
      <div class="row">
        <div class="col-md-5">
          <div class="alert bg-gradient-success text-white">
            Silahkan 
            <a href="{{route('touch-admin')}}" target="_blank" class="fw-bold hubungiKami position-relative">
              <i class="fab fa-whatsapp ml-1"></i> Hubungi Admin 
            </a> 
            untuk proses yang lebih cepat.
          </div>
          <div class="card mt-4">
            <div class="card-header">
              <i class="fas fa-credit-card me-2 text-muted fs-3"></i>
              <span class="fw-bold">Via Rekening Bank</span>
              <small class="d-block" style="font-size: 10px">Gunakan transfer bank untuk transaksi</small>
            </div>
            <div class="card-body p-2">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                  <div>
                    <img src="{{asset('image/payment/bca.svg')}}" width="50px" class="me-2">
                    BCA
                  </div>
                  <small>
                    norek BCA saya
                  </small>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <div>
                    <img src="{{asset('image/payment/mandiri.svg')}}" width="50px" class="me-2">
                    MANDIRI
                  </div>
                  <small>
                    norek MANDIRI saya
                  </small>
                </li>
              </ul>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-header">
              <i class="fas fa-wallet me-2 text-muted fs-3"></i>
              <span class="fw-bold">Via E-Money Transfer</span>
              <small class="d-block" style="font-size: 10px">Gunakan E-wallet untuk transaksi</small>
            </div>
            <div class="card-body p-2">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                  <div>
                    <img src="{{asset('image/payment/gopay.svg')}}" width="30px" class="me-2">
                    GoPay
                  </div>
                  <small>
                    Nomor Gopay saya
                  </small>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <div>
                    <img src="{{asset('image/payment/dana.svg')}}" width="30px" class="me-2">
                    Dana
                  </div>
                  <small>
                    Nomor Dana saya
                  </small>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <div>
                    <img src="{{asset('image/payment/link-aja-x.svg')}}" width="30px" class="me-2">
                    Link Aja
                  </div>
                  <small>
                    Nomor Link Aja saya
                  </small>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <div>
                    <img src="{{asset('image/payment/ovo.svg')}}" width="30px" class="me-2">
                    OVO
                  </div>
                  <small>
                    Nomor OVO saya
                  </small>
                </li>
              </ul>
            </div>
          </div>
          <a href="/" class="btn btn-danger">
            Kembali
          </a>
        </div>
        <div class="col-md-7">
          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdkMcMDIty2z9WjnDyoJE4ijW1E0X6s82sVuFbB4tlxot3TPQ/viewform?embedded=true" height="900" width="100%" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe>
        </div>
      </div>
    </div>
  </div>
@endsection