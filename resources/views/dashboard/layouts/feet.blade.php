<!-- Core -->
<script src="{{asset('template')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{asset('template')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="{{asset('template')}}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{asset('template')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('template')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="{{asset('template')}}/assets/js/argon.js?v=1.2.0"></script>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

<script src="{{asset('dist/js/prism.js')}}"></script>
<script>
  ClassicEditor
  .create(document.querySelector('#editor'))
  .catch(error => {
    console.error(error);
  });
</script>
@include('sweetalert::alert')