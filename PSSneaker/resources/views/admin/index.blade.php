  <!DOCTYPE html>
  <html lang="en">
  @include('admin.layout.header')

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      @include('admin.layout.nav')
      @include('admin.layout.sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
    </div>
    @include('admin.layout.footer')
    @include('admin.layout.js')
  </body>

  </html>