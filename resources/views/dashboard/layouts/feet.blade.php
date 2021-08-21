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
<script src="{{asset('dist/js/multi-input.js')}}"></script>
<script src="{{asset('dist/js/dropify.min.js')}}"></script>
<script>
  $(document).ready(function() {
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
      messages: {
        default: 'Glissez-déposez un fichier ici ou cliquez',
          replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
          remove: 'Supprimer',
          error: 'Désolé, le fichier trop volumineux'
        }
      });

      // Used events
      var drEvent = $('#input-file-events').dropify();

      drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete\"" + element.file.name + "\" ?");
      });

      drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
      });

      drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
      });

      var drDestroy = $('#input-file-to-destroy').dropify();
      drDestroy = drDestroy.data('dropify')
      $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
          drDestroy.destroy();
        } else {
          drDestroy.init();
        }
      })
    });
    //var myDropzone = new Dropzone(div#dropzone);
    ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
  </script>
  @include('sweetalert::alert')