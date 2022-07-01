          @extends('admin.index')
          @section('content')
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h5 class="m-0">Bảng điều khiển</h5>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <section class="content">
              <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <a class="my-info-box info-box" href="{{route('setting.index')}}" title="Cấu hình website">
                              <span class="my-info-box-icon info-box-icon bg-primary"><i class="fas fa-cogs"></i></span>
                              <div class="info-box-content text-dark">
                                  <span class="info-box-text text-capitalize">Cấu hình website</span>
                                  <span class="info-box-number">View more</span>
                              </div>
                          </a>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <a class="my-info-box info-box" href="#" title="Tài khoản">
                              <span class="my-info-box-icon info-box-icon bg-danger"><i class="fas fa-user-cog"></i></span>
                              <div class="info-box-content text-dark">
                                  <span class="info-box-text text-capitalize">Tài khoản</span>
                                  <span class="info-box-number">View more</span>
                              </div>
                          </a>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <a class="my-info-box info-box" href="#" title="Đổi mật khẩu">
                              <span class="my-info-box-icon info-box-icon bg-success"><i class="fas fa-key"></i></span>
                              <div class="info-box-content text-dark">
                                  <span class="info-box-text text-capitalize">Đổi mật khẩu</span>
                                  <span class="info-box-number">View more</span>
                              </div>
                          </a>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <a class="my-info-box info-box" href="#" title="Thư liên hệ">
                              <span class="my-info-box-icon info-box-icon bg-info"><i class="fas fa-address-book"></i></span>
                              <div class="info-box-content text-dark">
                                  <span class="info-box-text text-capitalize">Thư liên hệ</span>
                                  <span class="info-box-number">View more</span>
                              </div>
                          </a>
                      </div>
                      <!-- ./col -->
                  </div>
                  <!-- /.row -->
                  <!-- Main row -->
                  <div class="row">
                  </div>
                  <!-- /.row (main row) -->
              </div><!-- /.container-fluid -->
          </section>
          @endsection