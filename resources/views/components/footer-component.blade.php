@auth
@if(auth()->user()->hasRole('banned'))
<div></div>
@else
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="{{!request()->is('/')?'footer-svg':''}}"><path fill="#36275D" fill-opacity="1" d="M0,288L1440,160L1440,320L0,320Z"></path></svg>
<footer class="text-muted py-5">
  <div class="container-fluid">
    <div class="row text-white">
      <div class="col-md-4">
        <h5 class="">Alope</h5>
        <small class="mt-5"> &copy; Copyright by Ilham Hafidz</small>
      </div>
      <div class="col-md-6">
      </div>
      <div class="col-md-2">
        <h5> Sosial Media</h5>
        <div class="d-flex align-items-center justify-content-around">
          <a href="" class="me-3">
            <i class="fab fa-instagram">  </i>
          </a>
          <a href="" class="me-3">
            <i class="fab fa-facebook">  </i>
          </a>
          <a href="" class="me-3">
            <i class="fab fa-twitter">  </i>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
@endif
@else
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#36275D" fill-opacity="1" d="M0,288L1440,160L1440,320L0,320Z"></path></svg>
<footer class="text-muted py-5">
  <div class="container-fluid">
    <div class="row text-white">
      <div class="col-md-4">
        <h5 class="">Alope</h5>
        <small class="mt-5"> &copy; Copyright by Ilham Hafidz</small>
      </div>
      <div class="col-md-6">
      </div>
      <div class="col-md-2">
        <h5> Sosial Media</h5>
        <div class="d-flex align-items-center justify-content-around">
          <a href="" class="me-3">
            <i class="fab fa-instagram">  </i>
          </a>
          <a href="" class="me-3">
            <i class="fab fa-facebook">  </i>
          </a>
          <a href="" class="me-3">
            <i class="fab fa-twitter">  </i>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
@endauth