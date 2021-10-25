<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Edit Biodata</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">

  <link rel="stylesheet" href="{{asset('dist/css/dropify.min.css')}}">
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="/css/app.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('template/')}}/assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="/css/mystyle.css">
  <style>
    body{
      font-family: 'Poppins', sans-serif;
    }
    @media only screen and (max-width: 1363px) {
      svg.footer-svg {
        margin-top: -350px !important;
      }
      footer {
        margin-top: -57px !important;
      }
    }
    @media only screen and (max-width: 1139px) {
      svg.footer-svg {
        margin-top: -300px !important;
      }
    }
    @media only screen and (max-width: 917px) {
      svg.footer-svg {
        margin-top: -250px !important;
      }
    }
    @media only screen and (max-width: 688px) {
      svg.footer-svg {
        margin-top: -200px !important;
      }
    }
    @media only screen and (max-width: 455px) {
      svg.footer-svg {
        display: none;
      }
    }
  </style>

</head>

<body>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <x-navbar-component></x-navbar-component>
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('template')}}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
    </div>
    <div class="container-fluid" style="margin-top: -200px">
      <div class="card mt-5">
          <div class="card-header">
              Ganti Password
          </div>
        <div class="card-body">
          <form action="{{route('password.change')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="old_password" class="form-label">Password Lama</label>
                <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror">
                @error('old_password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary ms-auto d-block mt-5 px-5">
                <i class="fas fa-save mr-2"></i>
                Simpan Perubahan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <x-footer-component></x-footer-component>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('admin.layouts.feet')
  <script src="/js/script.js"></script>
</body>
</html>