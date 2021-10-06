<!-- Core -->
<script src="{{asset('template')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{asset('template')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="{{asset('template')}}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{asset('template')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('template')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS
<script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

<!-- Argon JS -->
<script src="{{asset('template')}}/assets/js/argon.js?v=1.2.0"></script>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

<script src="{{asset('dist/js/prism.js')}}"></script>
<script src="{{asset('dist/js/dropify.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.2/datatables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });

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
      var myModal = document.getElementById('myModal')
      var myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
      })

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

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    var blogChart = document.getElementById('blogChart');
    var blogChart = new Chart(blogChart, {
      type: 'bar',
      data: {
        labels: _ydataBlog,
        datasets: [{
          label: 'Grafik Blog',
          data: _xdataBlog,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    var serieChart = document.getElementById('videoChart');
    var serieChart = new Chart(serieChart, {
      type: 'bar',
      data: {
        labels: _ydataSerie,
        datasets: [{
          label: 'Grafik Video',
          data: _xdataSerie,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
    });

  </script>
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])