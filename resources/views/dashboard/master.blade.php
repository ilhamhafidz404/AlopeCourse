<!DOCTYPE html>
<html>

@include('dashboard.layouts.head')

<body>
  <!-- Sidenav -->
  @include('dashboard.layouts.sidebar')
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('dashboard.layouts.navbar')

    <!-- Header -->
    @include('dashboard.layouts.header')

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        @yield('content')
      </div>

      <!-- Footer -->
      @include('dashboard.layouts.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  @include('dashboard.layouts.feet')
</body>

</html>