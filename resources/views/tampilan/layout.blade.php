<!DOCTYPE html>
<html lang="en">
@include('tampilan.header')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style="height: 170px"></div>
      @include('tampilan.navbar')
      @include('tampilan.sidebar')

      <!-- Main Content -->
      @include('sweetalert::alert')
    <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      @include('tampilan.footer')
    </div>
  </div>

  @include('tampilan.js')
  
</body>
</html>