<!DOCTYPE html>
  <html lang="en">
  @include('user.layoutuser.head')
  <body>
    @include('user.layoutuser.header')
    @yield('content')
    @include('user.layoutuser.footer')
    @include('user.layoutuser.cartview')
    @include('user.layoutuser.js')
  </body>
  </html>