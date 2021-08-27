<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
      .jumbotron{
  background-color: backnd: #013470;
background: -webkit-linear-gradient(bottom right, #013470, #0F182A);
background: -moz-linear-gradient(bottom right, #013470, #0F182A);
background: linear-gradient(to top left, #013470, #0F182A); !important;
}
nav a{
  color: #ffffff !important;
}
h2{
  color: #1A79E9;
}

h2 span.series{
  color: #fff !important;
  position: relative;
}
h2 span.series::after{
  content: "";
  width: 120px;
  height: 7px;
  background-color: rgba(255, 255, 255, 0.5);
  display: block;
  position: absolute;
  left: 0;
  bottom: 10px;
}
ul{
  list-style: none;
}
i.fa-laravel{
  color: #f72c1f;
}
i.fa-vuejs{
  color: #3da87b;
}
i.fa-react{
  color: #5ed3f3;
}
i.fa-js{
  color: #efd81d;
}
i.fa-css3-alt{
  color: #2862e9;
}
i.fa-html5{
  color: #f05500;
}
button.btn.btn-transparent{
  border: 1px solid #0c4a6e;
  width: 82px;
  height: 64px;
}
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
    
    
    <div class="jumbotron pb-3 text-white">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent mb-5">
      <div class="container">
        <a class="navbar-brand" href="#">ALOPE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Series</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
     <div class="container">  
         <div class="row">  
            <div class="col-md-7">  
                <h2 class="display-4 fw-bold">Explore By Topic <span class="series">Laravel</span></h2>
         <hr class="my-4">
         <p>Ini adalah panduan yang direkomendasikan melalui Parsinta untuk keterampilan yang diberikan.</p>
         <p>Setiap bagian memberikan tips dan teknik baru yang dibangun berdasarkan apa yang telah Anda pelajari, dan jangan ragu untuk terus memperbarui kemampuan sesuai keinginan Anda.</p>
      <form action="" class="mt-5">
          <ul class="d-flex">  
          <li class="me-2">  
             <button class="btn btn-transparent btn-lg d-flex align-items-center justify-content-center" value="" style="border-color: #f72c1f !important;">
               <i class="fab fa-laravel"></i>
              </button>
          </li>
          <li class="me-2">  
             <button class="btn btn-transparent btn-lg d-flex align-items-center justify-content-center" value="" style="border-color: #3da87b !important;">
               <i class="fab fa-vuejs"></i>
              </button>
          </li>
          <li class="me-2">  
             <button class="btn btn-transparent btn-lg d-flex align-items-center justify-content-center" value="" style="border-color: #5ed3f3 !important;">
               <i class="fab fa-react"></i>
              </button>
          </li>
          <li class="me-2">  
             <button class="btn btn-transparent btn-lg d-flex align-items-center justify-content-center" value="" style="border-color: #efd81d !important;">
               <i class="fab fa-js"></i>
             </button>
          </li>
          <li class="me-2">  
             <button class="btn btn-transparent btn-lg d-flex align-items-center justify-content-center" value="" style="border-color: #2862e9 !important;">
               <i class="fab fa-css3-alt"></i>
              </button>
          </li>
          <li class="me-2">  
             <button class="btn btn-transparent btn-lg d-flex align-items-center justify-content-center" value="" style="border-color: #f05500 !important;">
               <i class="fab fa-html5"></i>
              </button>
          </li>
        </ul>
      </form>
           </div>
          </div>
      </div>
    </div>
    
    <div class="container mt-5"> 
      <div class="row">
        @foreach($series as $serie)
        <div class="col-sm-12 col-md-6 col-lg-4">
          <a href="{{route('beranda.show', $serie->slug)}}">
            <div class="card border-0 bg-transparent m-auto mb-4" style="width: 90% !important;">
              <img src="{{asset('storage/'.$serie->thumbnail)}}" class="card-img-rounded" width="100%">
              <div class="card-body">
                <ul class="p-0 d-flex my-0">
                  @foreach($serie->tag as $tag)
                  <li class="me-2">
                    <a href=""><small>{{$tag->nama}}</small></a>
                  </li>
                  @endforeach
                </ul>
                <h4 class="card-title mb-2 text-dark">
                  {{$serie->nama}}
                </h4>
                <div class="card-text d-flex justify-content-between">
                  @foreach($serie->tag as $tag)
                  <span class="badge" style="background-color:{{$tag->badge}}">
                    {{$tag->nama}}
                  </span>
                  @endforeach
                  <small class="text-muted">
                    {{-- {{$serie->created_at->diffForHumans()}} --}}
                  </small>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>