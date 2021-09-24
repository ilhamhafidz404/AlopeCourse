@extends('user.master')

@section('content')
<main class="mt-5">
  <div class="album py-5 bg-light">
    <div class="container-fluid">
      <h3 class="mb-4 text-center text-uppercase">Serie</h3>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($series as $serie)
        <div class="col-sm-12 col-md-6 col-lg-4">
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
                  <small class="text-secondary">Serie
                    @if($serie->status == 'complete')
                    <span class="text-success fw-bold">Complete</span>
                  </small>
                  @elseif($serie->status == 'development')
                  <span class="text-warning fw-bold">Development</span>
                </small>
                @else
                <span class="text-danger fw-bold">Stuck</span>
              </small>
              @endif
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
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
            <div>
              <a href="{{route('blog.read', $blog->slug)}}">
                <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
                  <img src="{{asset('storage/default.jpg')}}" class="card-img-rounded" width="100%">
                  <div class="card-body pt-1 px-0">
                    <small class="card-title text-white">
                      {{$blog->judul}}
                    </small>
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

<br><br><br>
<div id="community-post" class="mt-5 bg-transparent position-relative" style="overflow-x: hiddenn; width: 100%">
  <div class="container-fluid">
    <div class="card p-3  border-0 shadow position-relative">
      <div class="position-absolute px-5 py-2 text-white c_post_banner start-0">
        <h3 class="text-center">Community Post</h3>
      </div>
      <h2 class="text-center mb-3 text uppercase mt-5">{{$c_post->title}}</h2>
      <div class="post-banner rounded shadow mb-4" style="background-image: url({{asset('storage/community-post/'.$c_post->banner)}}); width: 70%; height: 250px; background-position: center; background-size: cover; margin: auto; overflow:hidden"></div>
      <p>
        {!! $c_post->content !!}
      </p>
    </div>
  </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-200px"><path fill="#36275D" fill-opacity="1" d="M0,288L1440,160L1440,320L0,320Z"></path></svg>
<div id="testi" class="pt-1">
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
  <h3 class="text-center fw-bolda">ALOPE PREMIUM ACCESS</h3>
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
        <a href="" class="btn btn-primary text-white mt-4">
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
        <a href="" class="btn btn-primary text-white mt-4">
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
        <a href="" class="btn btn-primary text-white mt-4">
          Beli Akses
        </a>
      </div>
    </div>
  </div>
</div>
</main>
@endsection