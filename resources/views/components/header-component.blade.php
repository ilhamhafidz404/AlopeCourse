<section class="py-5 text-start header text-white position-relative">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <br><br>
        <a class="py-1 px-3 mt-5 header-hot d-flex justify-content-between align-items-center text-white mb-4">
          <div>
            <span class="badge bg-danger me-2">
              <i class="fas fa-fire me-1"></i> HOT
            </span>
            <small>
              Berbagi Cerita di Alope Journey
            </small>
          </div>
          <i class="fas fa-chevron-right"></i>
        </a>

        <h1 class="fw-light text-uppercase mt-3">
          Tempat Belajar <b>Programming </b> yang Menyenangkan
          <span id="typed" class="fs-6"></span>
        </h1>
        <br>
        <small class="lead text-white mt-5">
          Belajar pemrograman web, web design & mobile app lengkap dari dasar untuk pemula sampai mahir, tersedia tutorial dengan studi kasus.
        </small>

        <div class="header-path p-3 position-absolute start-0 end-0 mx-5 rounded shadow">
          <ul class="d-flex align-items-center justify-content-center">
            @foreach($tags as $tag)
            <li class="ms-3">
              <a href="" class="badge" style="background-color: {{$tag->badge}}">
                <i class="fab fa-{{$tag->icon}} me-2"></i>
                {{$tag->nama}}
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-6 circle-container mt-5">
        <div class="d-flex align-items-center justify-content-center">
          <div class="circle circle1 position-absolute d-flex align-items-center justify-content-center rounded-circle">
            <span class="html position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="HTML">
              <i class="fab fa-html5"></i>
            </span>
            <span class="css position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="CSS">
              <i class="fab fa-css3-alt"></i>
            </span>
          </div>
          <div class="circle circle2 position-absolute d-flex align-items-center justify-content-center rounded-circle">
            <span class="js position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Javascript">
              <i class="fab fa-js"></i>
            </span>
            <span class="php position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="PHP">
              <i class="fab fa-php position-absolute d-flex align-items-center justify-content-center rounded-circle"></i>
            </span>
            <span class="sass position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Sass">
              <i class="fab fa-sass"></i>
            </span>
          </div>
          <div class="circle circle3 position-absolute d-flex align-items-center justify-content-center rounded-circle">
            <span class="laravel position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Laravel">
              <i class="fab fa-laravel"></i>
            </span>
            <span class="vue position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="VueJs">
              <i class="fab fa-vuejs"></i>
            </span>
            <span class="react position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="ReactJs">
              <i class="fab fa-react"></i>
            </span>
            <span class="node position-absolute d-flex align-items-center justify-content-center rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="NodeJs">
              <i class="fab fa-node-js"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>