<nav class="navbar navbar-expand-md navbar-light bg-transparent fixed-top">
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
          <a class="nav-link" class="{{request()->is('path')? 'active' : ''}}" href="{{route('path')}}">Path</a>
        </li>
      </ul>
    </div>
  </div>
</nav>