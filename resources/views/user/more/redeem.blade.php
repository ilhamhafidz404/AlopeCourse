@extends('user.more-master')

@section('martop', '-250px')

@section('content')
  <div class="row" style="margin-top: -300px">
    <div class="col-md-8 text-white">
      <h1 class="fs-1 text-white fw-bold">Hello, {{auth()->user()->name}}</h1>
      <p>
        Ayo bergabung dalam ALOPE PREMIUM untuk mendapatkan akses ke semua tutorial dan source code yang ada. <span class="fw-bold text-yellow">
          this is Very Great
        </span>
      </p>
      <br><br><br>
    </div>
  </div>
  <div class="card mt-5">
    <div class="card-body">
      <form action="{{route('getPremium')}}" method="POST" class="row">
        @csrf
        <label for="token" class="form-label">
          Redeem Token
        </label>
        <div class="col-8">
          <input type="text" class="form-control me-3" name="token" id="token" placeholder="Redeem disini...">
        </div>
        <div class="col-4">
          <button class="btn btn-primary text-white">Redeem</button>
        </div>
      </form>
    </div>
  </div>
  <div class="card mt-3 p-md-4">
    <h5 class="p-3 text-center text-md-start">Cara Mendapatkan Kode Redeem Premium</h5>
    <div class="mt-3 px-5">
      <div class="d-flex mb-3">
        <div class="me-4 ">
          <h4 class="fs-2 text-purple">
            1.
          </h4>
        </div>
        <div class="d-flex align-items-center">
          <small>
            Siapkan dan pastikan anda mepunyai akun E-Wallet, baik Go-Pay, OVO ataupun Link Aja. Atau jika kalian tidak punya E-Wallet juga bisa menggunakan Rekening BANK apapun yang bisa transfer ke Rekening BANK saya (Mandiri, BCA dan BRI).
          </small>
        </div>
      </div>
      <div class="d-flex mb-3">
        <div class="me-4">
          <h4 class="fs-2 text-purple">
            2.
          </h4>
        </div>
        <div class="d-flex align-items-center">
          <small>
            Pilih paket yang bakal anda pilih, untuk sekarang anda bisa memilih paket <a href="" class="linkDesc">Silver</a>, <a href="" class="linkDesc">Gold</a>, <a href="" class="linkDesc">Platinum</a>. Paket ini menentukan seberapa lama anda menjadi user Premium dan seberapa banyak fitur yang bisa anda jelajahi.
          </small>
        </div>
      </div>
      <div class="d-flex mb-3">
        <div class="me-4">
          <h4 class="fs-2 text-purple">
            3.
          </h4>
        </div>
        <div class="d-flex align-items-center">
          <small>
            Lakukan pembayaran dengan nominal sesuai paket yang anda pilih. Pembayaran bisa melalui transfer Bank atau E-wallet. Jika sudah melakukan pembayaran silahkan <b>foto bukti pembayaran</b>.
          </small>
        </div>
      </div>
      <div class="d-flex mb-3">
        <div class="me-4">
          <h4 class="fs-2 text-purple">
            4.
          </h4>
        </div>
        <div class="d-flex align-items-center">
          <small>
            Kirimkan foto bukti pembayaran tadi melalui <a href="" class="linkDesc">WhatsApp</a> yang tercantum. Silahkan tunggu beberapa menit untuk mendapatkan voucher token reedemnya dari Customer Service kami.
          </small>
        </div>
      </div>
      <div class="d-flex mb-3">
        <div class="me-4">
          <h4 class="fs-2 text-purple">
            5.
          </h4>
        </div>
        <div class="d-flex align-items-center">
          <small>
            Masukan kode reedem ke <a href="" class="linkDesc">Reedem Token</a>. Dan selamat anda sekarang sudah menjadi ALOPE PREMIUM MEMBER. <span class="text-warning fw-bold">Have Fun</span>.
          </small>
        </div>
      </div>
    </div>
  </div>
@endsection