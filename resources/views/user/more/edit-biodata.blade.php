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
        <div class="card-body">
          <form action="{{route('profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-12 mb-3">
                  <label class="form-control-label" for="profile">Foto Profile</label>
                  <input type="file" id="profile" class="dropify" data-height="300" accept="image/*" name="profile" />
                  @error('profile')
                  <small class="text-danger">
                    {{$message}}
                  </small>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Jhon Doe" name="name" value="{{$user->name}}">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="username">Username</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      alope.com/
                    </div>
                    <input type="text" class="form-control" id="username" placeholder="Jhon Doe" name="username" value="{{$user->username}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="email">Email address</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="email@example.com" value="{{$user->email}}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea rows="4" class="form-control" placeholder="A few words about you ..." name="about">{{$user->biodata->about}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="job">Pekerjaan</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fas fa-briefcase"></i>
                    </div>
                    <input type="text" class="form-control" id="job" placeholder="Software Engineer" value="{{$user->biodata->job}}" name="job">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="from">Dari</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <input type="text" class="form-control" id="from" placeholder="Suatu Tempat" name="from" value="{{$user->biodata->from}}">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="website">Website</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      http://
                    </div>
                    <input type="text" class="form-control" id="website" placeholder="alope.com" name="website" value="{{$user->biodata->website}}">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="github">Github</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fab fa-github"></i>
                    </div>
                    <input type="text" class="form-control" id="github" placeholder="Jhone Doe" name="github" value="{{$user->biodata->github}}">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="twitter">Twitter</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fab fa-twitter"></i>
                    </div>
                    <input type="text" class="form-control" id="twitter" placeholder="Jhone Doe" name="twitter" value="{{$user->biodata->twitter}}">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="Instagram">Instagram</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fab fa-instagram"></i>
                    </div>
                    <input type="text" class="form-control" id="instagram" placeholder="Jhone Doe" name="instagram" value="{{$user->biodata->instagram}}">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="facebook">Facebook</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fab fa-facebook"></i>
                    </div>
                    <input type="text" class="form-control" id="facebook" placeholder="Jhone Doe" name="facebook" value="{{$user->biodata->facebook}}">
                  </div>
                </div>
                <div class="col-md-12 mt-4 text-right">
                  <a href="{{route('profile.index', auth()->user()->username)}}" class="btn btn-neutral">
                    <img src="{{asset('storage/profile/'.auth()->user()->profile)}}" width="25px" height="25px" class="rounded-circle mr-3">
                    Lihat Profile
                  </a>
                  <button class="btn btn-primary px-5">
                    <i class="fas fa-save mr-3"></i>
                    Update Profile
                  </button>
                </div>
              </div>
            </div>
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