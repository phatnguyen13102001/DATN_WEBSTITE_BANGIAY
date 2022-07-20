$(document).ready(function() {
    /* Modal Delete*/
    $(document).on('click', '.deleteBtn', function() {
        var id = $(this).val();
        $('#deleteModal').modal({
            show: true
        });
        $('#deleteting_id').val(id);
    });

    /* Modal Insert*/
    $(document).on('click', '.insertBtn', function() {
        $('#insertModal').modal({
            show: true
        });
    });

    /* Modal Update*/
    $(document).on('click', '.updateBtn', function() {
        var id_update = $(this).val();
        $('#updateModal').modal({
            show: true
        });
        $.ajax({
            type: "GET",
            url: "/admin/product/stock/edit/" + id_update,
            success: function(data) {
                $('#id_size').html(data.size);
                var soluong = parseInt(data.quantity);
                $('#quantity').val(soluong);
            }
        });
        $('#updateting_id').val(id_update);
    });

    /* Modal View*/
    $(document).on('click', '.viewBtn', function() {
        var id_user = $(this).val();
        $('#ViewModal').modal({
            show: true
        });
        $.ajax({
            type: "GET",
            url: "/admin/account/edit/" + id_user,
            success: function(data) {
                $('#name').html(data.user.name);
                $('#birthday').html(data.user.birthday);
                $('#phone').html(data.user.phone);
                $('#email').html(data.user.email);
                $('#gender').html(data.user.gender);
                $('#address').html(data.user.address);
                if ((data.user.block) == 1) {
                    $('#block').attr('checked', true);
                } else if ((data.user.block) == 0) {
                    $('#block').removeAttr('checked', false);
                }
            }
        });
        $('#updateting_id').val(id_user);
    });


    /* Img Preview */
    const input = document.getElementById("file-zone");
    const image = document.getElementById("photoUpload-preview");


    /* Pagination */
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getDataSize(page);
    });

    function getDataSize(page) {
        $.ajax({
            url: location + "/?page=" + page,
            success: function(data) {
                $('#table_data').html(data);
            }
        });
    }

    /*Search Ajax*/
    $('#keywordsize').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchsize",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })

    $('#keywordcolor').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchsize",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keywordmanufacturer').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchmanufacturer",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keywordnews').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchnews",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })

    $('#keywordpolicy').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchpolicy",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keywordslideshow').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchslideshow",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keywordsocial').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchsocial",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keywordproduct').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchproduct",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keywordproductindex').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchproductindex",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keyworduser').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchuser",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })
    $('#keywordpayment').on('keyup', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: "/searchpayment",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $('#table_data').html(data);
                if (data.status == 'Không có dữ liệu') {
                    $('#table_data').html(' <div class="card card-primary card-outline text-sm mb-0"><div class="card-body table-responsive p-0"><table class="table table-hover"><tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody></table></div></div>');
                }
            }
        });
    })

    $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });

    /* CKEditor */
    CKEDITOR.replace('desc_cke');
    CKEDITOR.replace('content');

    /* Format Price */
    $(".format-price").priceFormat({
        limit: 13,
        prefix: '',
        centsLimit: 0
    });

    $(".regular_price, .sale_price").keyup(function() {
        var regular_price = $('.regular_price').val();
        var sale_price = ($('.sale_price').length) ? $('.sale_price').val() : 0;
        var discount = 0;

        if (regular_price == '' || regular_price == '0' || sale_price == '' || sale_price == '0') {
            discount = 0;
        } else {
            regular_price = regular_price.replace(/,/g, "");
            sale_price = (sale_price) ? sale_price.replace(/,/g, "") : 0;
            regular_price = parseInt(regular_price);
            sale_price = parseInt(sale_price);

            if (sale_price < regular_price) {
                discount = 100 - ((sale_price * 100) / regular_price);
                discount = roundNumber(discount, 0);
            } else {
                $('.regular_price, .sale_price').val(0);
                if ($(".discount").length) {
                    discount = 0;
                    $('.sale_price').val(0);
                }
            }
        }

        if ($(".discount").length) {
            $('.discount').val(discount);
        }
    });

    /* Datetimepicker */
    $('#datepicker').datepicker();
    if (input) {
        input.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
    }

    // thống kê 

    // thống kê số lượng sản phẩm, đơn hàng
    // thống kê tiền
    var chart = Morris.Area({
        element: 'mychart',
        data: [0, 0],
        lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
        pointFillColors: ['#ffffff'],
        pointStrokeColors: ['black'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        parseTime: false,
        xkey: 'created_at',
        ykeys: ['total'],

        behaveLikeLine: true,
        labels: ['Tổng tiền', 'Mã đơn hàng']
    });
    // 
    $('#btn-dashboard-filter').click(function() {
        var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker1').val();
        $.ajax({
            url: "/filter-by-date",
            method: "POST",
            dataType: "JSON",
            data: { from_date: from_date, to_date: to_date, _token: _token },
            success: function(data) {
                chart.setData(data);
            }
        });

    });
    $("#datepicker").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
    });
    $("#datepicker1").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
    });
    // end thống kê

});