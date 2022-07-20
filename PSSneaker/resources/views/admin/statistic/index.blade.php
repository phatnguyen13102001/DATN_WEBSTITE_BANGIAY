  @extends('admin.index')
  @section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h5 class="m-0">Thống kê</h5>
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
              <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <a class="my-info-box info-box"  title="Tổng sản phẩm">
                      <span class="my-info-box-icon info-box-icon bg-primary"><i class="fab fa-product-hunt"></i></span>
                      <div class="info-box-content text-dark">
                          <span class="info-box-text text-capitalize">Tổng sản phẩm</span>
                          <span class="info-box-number">{{$countproduct}}</span>
                      </div>
                  </a>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <a class="my-info-box info-box"    title="Tổng đơn hàng mới đặt">
                      <span class="my-info-box-icon info-box-icon bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg></span>
                      <div class="info-box-content text-dark">
                          <span class="info-box-text text-capitalize">Tổng đơn hàng mới đặt</span>
                          <span class="info-box-number">{{$lstorder1}}</span>
                          <p class="info-box-text text-sm mb-0">Tổng tiền: <span class="text-danger font-weight-bold">{{$lstordersum1 == null ? '0₫' : number_format($lstordersum1->total1).'₫' }}</span></p>
                          
                      </div>
                  </a>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <a class="my-info-box info-box"  title="Tổng đơn hàng đã xác nhận">
                      <span class="my-info-box-icon info-box-icon bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg></span>
                      <div class="info-box-content text-dark">
                          <span class="info-box-text text-capitalize">Tổng đơn hàng đã xác nhận</span>
                          <span class="info-box-number">{{$lstorder2}}</span>
                          <p class="info-box-text text-sm mb-0">Tổng tiền: <span class="text-danger font-weight-bold">{{$lstordersum2 == null ? '0₫' : number_format($lstordersum2->total2).'₫' }}</span></p>
                      </div>
                  </a>
              </div>
              <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <a class="my-info-box info-box"  title="Tổng đơn hàng đã giao">
                      <span class="my-info-box-icon info-box-icon bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg></span>
                      <div class="info-box-content text-dark">
                          <span class="info-box-text text-capitalize">Tổng đơn hàng đã giao</span>
                          <span class="info-box-number">{{$lstorder3}}</span>
                          <p class="info-box-text text-sm mb-0">Tổng tiền: <span class="text-danger font-weight-bold">{{$lstordersum3 == null ? '0₫' : number_format($lstordersum3->total3).'₫' }}</span></p>
                      </div>
                  </a>
              </div>
              <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <a class="my-info-box info-box"  title="Tổng đơn hàng đã hủy">
                      <span class="my-info-box-icon info-box-icon bg-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg></span>
                      <div class="info-box-content text-dark">
                          <span class="info-box-text text-capitalize">Tổng đơn hàng đã hủy</span>
                          <span class="info-box-number">{{$lstorder4}}</span>
                          <p class="info-box-text text-sm mb-0">Tổng tiền: <span class="text-danger font-weight-bold">{{$lstordersum4 == null ? '0₫' : number_format($lstordersum4->total4).'₫' }}</span></p>
                      </div>
                  </a>
              </div>
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="col-sm-6">
                  <h5 class="m-0">Thống kê doanh thu</h5>
              </div><!-- /.col -->
          <div class="rowtk">
              <form autocomplete="off">
                  @csrf
                  <div class="flex_tk">
                      <div class="col-md-4 datetime_tungay">
                          <p>Từ ngày <input type="text" id="datepicker"></p>
                          <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kêt quả" />
                      </div>
                      <div class="col-md-4">
                          <p>Đến ngày <input type="text" id="datepicker1"></p>
                      </div>
                      <div class="col-md-4">
                          <p>
                              Lọc theo:
                              <select class="dashboard-filter form-control">
                                  <option>--Chọn--</option>
                                  <option value="7ngay">7 Ngày qua</option>
                                  <option value="thangtruoc">Tháng trước</option>
                                  <option value="thangnay">Tháng này</option>
                                  <option value="365ngay">365 ngày qua</option>
                              </select>
                          </p>
                      </div>
                  </div>
              </form>
              <div class="col-md-12">
                  <div id="mychart" style="height: 250px;"></div>
              </div>
              <div class="col-md-12">
                  <div id="chart_donut" style="height: 250px;"></div>
                 
              </div>
          </div>
          <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
  </section>
  @endsection
  <script>
      Morris.Donut({
              element: 'chart_donut',
              data: [{
                      label: 'Đã hoàn thành',
                      value: <?php echo $lstorder1 ?>
                  },
                  {
                      label: 'Đã xử lí',
                      value: <?php echo $lstorder2 ?>
                  },
                  {
                      label: 'Hoàn thành',
                      value: <?php echo $lstorder3 ?>
                  },
                  {
                      label: 'Đã hủy',
                      value: <?php echo $lstorder4 ?>
                  },
                  {
                      label: 'Tổng sản phẩm',
                      value: <?php echo $lstorder4 ?>
                  },
              ]
          }).on('click', function(i, row){
  console.log(i, row);
});
  </script>