
jQuery(document).ready(function($) {

    $('#etalage').etalage({
        thumb_image_width: 360,
        thumb_image_height: 360,
        source_image_width: 900,
        source_image_height: 900,
        show_hint: true,
        click_callback: function(image_anchor, instance_id) {
            alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
        }
    });
    // from right to left

});

$(document).ready(function () {
    /* Modal Add To Cart*/
    $(document).on('click', '.BtnAddToCart', function () {
        $('#AddCartModal').modal({
            show: true
        });
    });

    /* Quantity */
    $('.quantity-plus-pro-detail').click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity-pro-detail').find('.qty-pro').val();
        var value = parseInt(incre_value);
        value = isNaN(value) ? 0 : value;
        value++;
        $(this).parents('.quantity-pro-detail').find('.qty-pro').val(value);
    });

    $('.quantity-minus-pro-detail').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity-pro-detail').find('.qty-pro').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).parents('.quantity-pro-detail').find('.qty-pro').val(value);
        }
    });

    /* Dynamic Address */
    $('#city').change(function () {
        var cityID = $(this).val();
        if (cityID) {
            $.ajax({
                type: "get",
                url: "getdistrict?id_city=" + cityID,
                success: function (res) {
                    if (res) {
                        $("#district").empty();
                        $("#district").append('<option>Quận/huyện</option>');
                        $.each(res, function (key, value) {
                            $("#district").append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $("#district").empty();
                    }
                }
            });
        } else {
            $("#district").empty();
            $("#ward").empty();
        }
    });

    // when state dropdown changes
    $('#district').on('change', function () {
        var districtID = $(this).val();
        if (districtID) {
            $.ajax({
                type: "get",
                url: "getward?id_district=" + districtID,
                success: function (res) {
                    if (res) {
                        $("#ward").empty();
                        $("#ward").append('<option>Phường/xã</option>');
                        $.each(res, function (key, value) {
                            $("#ward").append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $("#ward").empty();
                    }
                }
            });
        } else {
            $("#ward").empty();
        }
    });

    // Delete Item Cart Ajax
    $('.del-procart').click(function (e) {

        var $removeBtn = $(this);
        var id = $removeBtn.data('id');

        $.ajax({
            type: "get",
            url: "/delete-to-cart/" + id,
            success: function (data) {
                location.reload();
            }
        });

        return false;
    });

    
    // Update Quantity Cart
    $('.update_procart').click(function (e) {

        var $updateBtn = $(this);
        var id = $updateBtn.data('id');
        var qty = $('#quantity_' + id).val();
        $.ajax({
            type: "get",
            url: "/update-to-cart/" + id + "/" + qty,
            success: function (data) {
                location.reload();
            }
        });

        return false;
    });

    $(".payments-label").click(function () {
        var payments = $(this).data("payments");
        $(".payments-cart .payments-label, .payments-info").removeClass("active");
        $(this).addClass("active");
        $(".payments-info-" + payments).addClass("active");
    });

    //Search Ajax
    $('#keywords').keyup(function () {
        var query = $(this).val();

        if (query != '') {
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "/autocomplete-ajax",
                method: "POST",
                data: { query: query, _token: _token },
                success: function (data) {
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });
        } else {
            $('#search_ajax').fadeOut();
        }
    });
    $(document).on('click', '.li_search_ajax', function () {
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    });

    /*Owl Carousel*/
    $('#news .owl-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav: false,
        autoplay: true,
        rewind:1,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })

    $('#slider .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        items: 1,
    })

    //Sort
    $('#sort').on('change', function () {
        
        var url = $(this).val();
        if (url) {
            window.location = url;
        }
        return false;
    });

    var api = $(".sss").peShiner({
        api: true,
        paused: true,
        reverse: true,
        repeat: 1,
        color: 'fireHL'
    }); //mã màu đặc biệt: monoHL, oceanHL, fireHL
    api.resume();

    //Rating
    function remove_background(product_id)
    {
        for (var count = 1; count <= 5; count++)
        {
            $('#' + product_id + '-' + count).css('color', '#ccc');
        }
    }

    $(document).on('mouseenter', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product-id');

        remove_background(product_id);

        for (var count = 1; count <= index; count++)
        {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });

    $(document).on('mouseleave', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product-id');
        var rating = $(this).data("rating");
        remove_background(product_id);

        for (var count = 1; count <= rating; count++) {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });

    $(document).on('click', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product-id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "/insert-rating",
            method: "POST",
            data: { index: index, product_id: product_id, _token: _token },
            success: function (data) {
                if (data == 'done') {
                    alert("Bạn đã đánh giá " + index + " trên 5 sao");
                    location.reload();
                }
                else {
                    alert("Lỗi đánh giá");
                }
            }
        })
    });

    /* Scroll top top */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $('#topBtn').fadeIn();
        }
        else {
            $('#topBtn').fadeOut();
        }
    });

    $("#topBtn").click(function () {
        $('html,body').animate({ scrollTop: 0 }, 800);
    });

    $('.BtnAddToCart').click(function () {
        $('.alert_success').removeClass("hiden");
        $('.alert_success').addClass("show");
        $('.alert_success').addClass("showAlert");
        // setTimeout(function () {
        //     $('.alert').addClass("hiden");
        //     $('.alert').removeClass("show");
        // },5000)
    });
    $('.close-btn').click(function () {
        $('.alert_success').addClass("hiden");
        $('.alert_success').removeClass("show");
    });

});
