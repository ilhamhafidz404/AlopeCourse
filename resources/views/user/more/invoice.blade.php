@extends('user.more-master')

@section('title', 'Beli Paket')
@section('martop', '-420px')

@section('content')
  <div class="row mt-5">
    <div class="col-md-8 mt-4">
      <h1 class="fw-bold display-5 text-white text-uppercase">
        ALOPE PREMIUM ACCESS
      </h1>
      <p class="text-white" style="white-text: nowrap; font-size: 15px">
        Silahkan isi bukti kalau anda sudah membayar paket pada kami. Setelah mengirim Form, klik button "Hubungi Admin" untuk mendapat notice dari kami lebih cepat lagi.
      </p>
    </div>
  </div>
@endsection

@section('content2')
  <div class="container-fluid mt-5">
    <div class="card p-3">
      <div class="row">
        <div class="col-md-5 mb-4">
          <div class="alert bg-gradient-success text-white">
            Silahkan 
            <a href="{{route('touch-admin')}}" target="_blank" class="fw-bold hubungiKami position-relative">
              <i class="fab fa-whatsapp ml-1"></i> Hubungi Admin 
            </a> 
            untuk proses yang lebih cepat.
          </div>
          <div class="card mt-4 shadow-sm border-0">
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
          <div class="card shadow-sm border-0 mt-3">
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
          <a href="/" class="btn btn-danger text-white">
            Kembali
          </a>
        </div>
        <div class="col-md-7 px-5">
            <h3 class="mb-4 mt-3">Kirim Bukti Pembayaran</h3>
            <hr>
            <form action="">
                <div class="form-group">
                    <label for="username" class="form-control-label">Username ALOPE anda</label>
                    <input type="text" class="form-control" placeholder="cx: xxhamz_">
                </div>
                <div class="form-group">
                    <label for="username" class="form-control-label">Nama BANK anda</label>
                    <input type="text" class="form-control" placeholder="cx: Ilham Hafidz">
                </div>
                <div class="form-group">
                    <label for="username" class="form-control-label">BANK Anda</label>
                    <input type="text" class="form-control" placeholder="cx: BANK MANDIRI/Go-Pay">
                </div>
                <div class="form-group">
                    <div class="form-control-label">Bank Tujuan</div>
                    <select name="" id="" class="form-select">
                        <option value="" selected hidden>- BANK TUJUAN -</option>
                        <option value="">MANDIRI</option>
                        <option value="">BCA</option>
                        <option value="">OVO</option>
                        <option value="">Go-Pay</option>
                        <option value="">DANA</option>
                        <option value="">LINK AJA</option>
                    </select>
                </div>
                <fieldset>
                    <legend>
                        <small class="form-control-label">Paket mana yang anda pilih?</small>
                    </legend>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group ms-5">
                                <input type="radio" id="silver" class="form-check-input" name="paket" placeholder="cx: BANK MANDIRI">
                                <label for="silver" class="form-check-label">Silver</label>
                            </div>
                            <div class="form-group ms-5">
                                <input type="radio" id="gold" class="form-check-input" name="paket" placeholder="cx: BANK MANDIRI">
                                <label for="gold" class="form-check-label">Gold</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group ms-5">
                                <input type="radio" id="platinum" class="form-check-input" name="paket" placeholder="cx: BANK MANDIRI">
                                <label for="platinum" class="form-check-label">Platinum</label>
                            </div>
                            <div class="form-group ms-5">
                                <input type="radio" id="hemat" class="form-check-input" name="paket" placeholder="cx: BANK MANDIRI">
                                <label for="hemat" class="form-check-label">HEMAT</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="" class="form-control-label">Tanggal Transfer</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label class="form-control-label" for="profile">Bukti Pembayaran</label>
                    <input type="file" id="profile" class="dropify" data-height="200" accept="image/*" name="profileImg"/>
                </div>
                <div class="form-group text-end">
                    <button class="btn text-white btn-primary px-5">
                        <i class="fas fa-rocket me-3"></i>
                        Kirim
                    </button>
                </div>
            </form>
          {{-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdkMcMDIty2z9WjnDyoJE4ijW1E0X6s82sVuFbB4tlxot3TPQ/viewform?embedded=true" height="900" width="100%" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe> --}}
        </div>
      </div>
    </div>
  </div>
@endsection