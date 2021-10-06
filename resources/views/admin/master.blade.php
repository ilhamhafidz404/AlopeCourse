<!DOCTYPE html>
<html>

@include('admin.layouts.head')

<body>
  <!-- Sidenav -->
  @include('admin.layouts.sidebar')
  <div class="main-content" id="panel">

    <x-admin.navbar-component></x-admin.navbar-component>

    <!-- Header -->
    @include('admin.layouts.header')

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        @yield('content')
      </div>

      <!-- Footer -->
      @include('admin.layouts.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  @include('admin.layouts.feet')
</body>

</html>