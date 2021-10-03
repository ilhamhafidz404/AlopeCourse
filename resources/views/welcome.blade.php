@extends('user.master')

@section('content')
<main class="mt-5">
  <div class="album py-5 bg-light">
    <div class="container-fluid">
      <h3 class="mb-4 text-center text-uppercase">Serie</h3>
      <div class="row">
        @foreach($series as $serie)
        <div class="col-md-6 col-lg-4">
          <a href="{{route('serie.show', $serie->slug)}}">
            <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
              <img src="{{asset('storage/'.$serie->thumbnail)}}" class="card-img-rounded" width="100%">
              <div class="card-body">
                @foreach($serie->tag as $tag)
                <span class="badge" style="background-color:{{$tag->badge}}">
                  {{$tag->nama}}
                </span>
                @endforeach
                <h4 class="card-title my-2 text-dark">
                  {{$serie->nama}}
                </h4>
                <div class="card-text d-flex justify-content-between">
                  <small class="text-muted">
                    <?php $tgl = ($serie->created_at->diff()->days < 1) ? $serie->created_at->diffForHumans() : $serie->created_at->format('M, Y') ?>
                    {{$tgl}}
                  </small>
                  @if($serie->status == 'complete')
                  <small class="text-secondary">Serie<span class="text-success fw-bold">Complete</span></small>
                  @elseif($serie->status == 'development')
                  <small class="text-secondary">Serie<span class="text-warning fw-bold">Development</span></small>
                  @else
                  <small class="text-secondary">Serie<span class="text-danger fw-bold">Stuck</span></small>
                  @endif
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="latest-blog py-3 mt-5">
    <div class="container-fluid">
      <div class="m-auto latest-blog-title rounded shadow text-center py-1 mb-4">
        <h3 class="text-uppercase text-white m-0">Blog Terbaru</h3>
      </div>
      <div data-name="Multiple Item" class="glider-contain multiple">
        <div class="gradient-border-bottom">
          <div class="gradient-border">
            <div class="glider" id="blog-series">
              @foreach($blogs as $blog)
              <div class="mx-2">
                <a href="{{route('blog.read', $blog->slug)}}">
                  <div class="card shadow-sm">
                    <div class="blog-serie w-100" style="background-image: url({{asset('storage/'.$blog->thumbnail)}})"></div>
                    <div class="card-body pt-1">
                      <small class="text-muted">
                        {{$blog->category->nama}}
                      </small>
                      <h5 class="card-title mb-4 text-dark mt-0">
                        {{$blog->judul}}
                      </h5>
                      <div class="d-flex align-items-center justify-content-between">
                        <div>
                          <img src="{{asset('storage/'.$blog->user->profile)}}" alt="{{$blog->user->name}}" class="rounded-circle writer-img">
                          <small class="text-muted ms-2">
                            {{$blog->user->name}}
                          </small>
                        </div>
                        <small class="text-muted">
                          <?php $tgl = ($blog->created_at->diff()->days < 1) ? $blog->created_at->diffForHumans() : $blog->created_at->format('M, Y') ?>
                          {{$tgl}}
                        </small>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <button role="button" aria-label="Previous" class="glider-prev" id="glider-prev-2"><i class="fa fa-chevron-left text-white"></i></button>
        <button role="button" aria-label="Next" class="glider-next" id="glider-next-2"><i class="fa fa-chevron-right text-white"></i></button>
        <div id="dots2"></div>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-200px"><path fill="#36275D" fill-opacity="1" d="M0,288L1440,160L1440,320L0,320Z"></path></svg>
  <div id="testi" class="pt-1 position-relative">
    <section class="container">
      <div class="title text-center">
        <h3 class="text-white mt-5">TESTIMONI</h3>
        <p class="text-white text-muted">
          Apa kata mereka?
        </p>
      </div>
      <div class="slider2">
        <div class="slide slide-1">
          <div class="slide-text">
            <p class="testimonial-text">
              “
              sblm masuk alope citra blank bgt tentang pemrogramman. dan setelah gabung dengan alope trnyata seru juga belajar pemrograman, pusing cuma nagih wkwk.Karna alope citra jdi ngerti gimana bikin web HTML. Btw aku lebih paham d ajarin ps alope tntang html,dripada ps lagi luring di kelas:"”
            </p>
            <p class="author-text">
              Citra Perlita Apriliana Ayu
              <span>Siswi SMK PERTIWI KUNINGAN</span>
            </p>
          </div>
          <div class="slide-img">
            <img src="{{asset('image/testi/citra.jpg')}}" alt="img">
          </div>
        </div>
        <div class="slide slide-2">
          <div class="slide-text">
            <p class="testimonial-text">
              “
              Sebelumnya aku gatau programming itu apa,
              Kaya bingung, cmn taunya bikin aplikasi gitu².
              Terus kirain pas alope bakalan bosen,ternyata asik juga🗿🤙🏼
              Jadi tauu mana yg awal nya gatauu,yaa pokonya seruu dahh,apalagi klo pas lagi pada pusing,beuhhh☺️”
            </p>
            <p class="author-text">
              Ratu Jasmine Nawang Putri
              <span>Siswi SMK PERTIWI KUNINGAN</span>
            </p>
          </div>
          <div class="slide-img">
            <img src="{{asset('image/testi/jasmine.jpg')}}" alt="img">
          </div>
        </div>
        <div class="slide slide-3">
          <div class="slide-text">
            <p class="testimonial-text">
              “ Setelah masuk alope saya jadi ngerti coding dengan pemahaman-pemahaman yg jelas,dan dapat dimengerti. ternyata  mengasyikan juga belajar web,dan menjadi point plus bisa ngerti coding duluan dibanding temen yg lain,yg tidak ikut komunitas ini🤟
              Menggokil🤟😎 ”
            </p>
            <p class="author-text">
              Masnun Muhaemin
              <span>Siswa SMK PERTIWI</span>
            </p>
          </div>
          <div class="slide-img">
            <img src="{{asset('image/testi/masnun.jpg')}}" alt="img">
          </div>
        </div>
        <div class="slide slide-4">
          <div class="slide-text">
            <p class="testimonial-text">
              “ Ketika masuk alope diajarkan mengenai detail membuat web sederhana, awal awal pusing juga tapi sedikit demi sedikit jadi ngerti, lama lama asik juga ikut alope. diajarin sedikit demi sedikit jadi udah bisa ngebuat web sendiri, dan semoga alope terus ada biar orang tau betapa susahnya programming ✌️🤘 ”
            </p>
            <p class="author-text">
              Naufal Nabil Nabawi
              <span>Siswa SMK PERTIWI KUNINGAN</span>
            </p>
          </div>
          <div class="slide-img">
            <img src="{{asset('image/testi/naufal.jpg')}}" alt="testi-naufal">
          </div>
        </div>
        <div class="buttons">
          <div class="next"></div>
          <div class="prev"></div>
        </div>
      </div>
    </section>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -10px"><path fill="#36275D" fill-opacity="1" d="M0,288L1440,160L1440,0L0,0Z"></path></svg>




  <div id="pricing" class="m-auto" style="width: 95%;">
    <h3 class="text-center fw-bold">ALOPE PREMIUM ACCESS</h3>
    <p class="text-center m-auto text-muted" style="width: 60%;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum quisquam molestiae ipsa aliquid consectetur dolor nobis quasi iure est,
    </p>
    <div class="row align-items-center mt-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 text-center gold mb-3">
          <h5>Gold</h5>
          <h3 class=" mt-4">
            <sup>Rp.</sup>
            <span class="fw-bold" style="font-size: 50px">
              45
            </span>
            <sub class="fw-bold mb-2">
              .000
            </sub>
          </h3>
          <ul class="mt-4 mb-2">
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Akses Alope Journey
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Berbagi Cerita di Alope Journey
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Premium selama 3 Bulan
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Buat Post di Alope Circle
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Source Code Gratis
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Claim Ebook Alope secara Gratis
            </li>
          </ul>
          <a href="" class="btn btn-primary text-white mt-4 btn_price">
            Beli Akses
          </a>
        </div>
      </div>
      <div class="col-md-4 p-0 mb-3">
        <div class="card border-0 shadow-sm p-3 text-center platinum py-5 text-white">
          <h5>Platinum</h5>
          <h3 class=" mt-4">
            <sup>Rp.</sup>
            <span class="fw-bold" style="font-size: 50px">
              45
            </span>
            <sub class="fw-bold mb-2">
              .000
            </sub>
          </h3>
          <ul class="mt-4 mb-2">
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Akses Alope Journey
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Berbagi cerita di Alope Journey
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Premium selama 6 bulan
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Buat Post di Alope Circle
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Source Code
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Latihan tambahan
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Claim Ebook Alope secara Gratis
            </li>
          </ul>
          <a href="" class="btn btn-primary text-white mt-4 btn_price">
            Beli Akses
          </a>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm p-3 text-center silver">
          <h5>Silver</h5>
          <h3 class=" mt-4">
            <sup>Rp.</sup>
            <span class="fw-bold" style="font-size: 50px">
              45
            </span>
            <sub class="fw-bold mb-2">
              .000
            </sub>
          </h3>
          <ul class="mt-4 mb-2">
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Akses Alope Journey
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Premium selama 1 bulan
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Buat Post di Alope Cicle
            </li>
            <li class="mb-2">
              <i class="fas fa-check me-2 text-success"></i>
              Source Code Gratis
            </li>
          </ul>
          <a href="" class="btn btn-primary text-white mt-4 btn_price">
            Beli Akses
          </a>
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <div id="faq" class="mt-5">
    <div class="container-fluid">
      <h3 class="text-center fw-bold mb-0">FAQ</h3>
      <p class="text-center text-muted">
        Yang sering ditanyakan tentang ALOPE
      </p>
      <div class="qna row mt-5">
        <div class="col-md-6 mb-3">
          <div>
            <p class="fw-bold" style="color: #36275D">
              <i class="fas fa-question me-2"></i>
              Apa yang sering Ditanyakan??
            </p>
            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero consectetur asperiores laborum eaaerat sint.
            </p>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div>
            <p class="fw-bold" style="color: #36275D">
              <i class="fas fa-question me-2"></i>
              Apa yang sering Ditanyakan??
            </p>
            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero consectetur asperiores laborum eaaerat sint.
            </p>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div>
            <p class="fw-bold" style="color: #36275D">
              <i class="fas fa-question me-2"></i>
              Apa yang sering Ditanyakan??
            </p>
            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero consectetur asperiores laborum eaaerat sint.
            </p>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div>
            <p class="fw-bold" style="color: #36275D">
              <i class="fas fa-question me-2"></i>
              Apa yang sering Ditanyakan??
            </p>
            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero consectetur asperiores laborum eaaerat sint.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- GROUP -->
  <div id="group" class="mt-5">
    <div class="container-fluid">
      <h3 class="mb-0">Gabung dengan ALOPE</h3>
      <span>Jadi bagian dari Team??</span>
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="facebook d-flex align-items-center sosmed justify-content-between">
            <div class="i">
              <i class="fs-1 fab fa-facebook-f"></i>
            </div>
            <div class="text">
              <h5>Facebook</h5>
              <p class="text-muted">
                Sukai Halaman Facebook kami untuk mendapatkan update terbaru
              </p>
            </div>
          </div>
          <div class="twitter  d-flex align-items-center sosmed">
            <div class="i">
              <i class="fs-1 fab fa-twitter"></i>
            </div>
            <div class="text">
              <h5>Twitter</h5>
              <p class="text-muted">
                Ikuti Twitter kami untuk mendapatkan update terbaru
              </p>
            </div>
          </div>
          <div class="instagram  d-flex align-items-center sosmed">
            <div class="i">
              <i class="fs-1 fab fa-instagram"></i>
            </div>
            <div class="text">
              <h5>Instagram</h5>
              <p class="text-muted">
                Ikuti Instagram kami untuk mendapatkan update terbaru seputar event-event dan aktifitas kami
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="discord  d-flex align-items-center sosmed">
            <div class="i">
              <i class="fs-1 fab fa-discord"></i>
            </div>
            <div class="text">
              <h5>Discord</h5>
              <p class="text-muted">
                Gabung dengan grup Discord kami untuk mendapatkan solusi koding dari mentor resmi Alope
              </p>
            </div>
          </div>
          <div class="youtube  d-flex align-items-center sosmed">
            <div class="i">
              <i class="fs-1 fab fa-youtube"></i>
            </div>
            <div class="text">
              <h5>Youtube</h5>
              <p class="text-muted">
                Ikuti Youtube supaya tidak ketinggalan video tutorial dari kami
              </p>
            </div>
          </div>
          <div class="telegram d-flex align-items-center sosmed">
            <div class="i">
              <i class="fs-1 fab fa-telegram"></i>
            </div>
            <div class="text">
              <h5>Telegram</h5>
              <p class="text-muted">
                Gabung dengan grup Telegram kami untuk Mengobrol dengan team Alope yang lain
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<div id="app" class="container py-2">
  <div class="py-2">
    <div class="modal" id="notif">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>
              Modal body text goes here.
            </p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>      <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection