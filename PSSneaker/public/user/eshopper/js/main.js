/*price range*/

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    /* Modal Add To Cart*/
	$(document).on('click', '.BtnAddToCart', function () {
        $('#AddCartModal').modal({
            show: true
		});
    });
    
    /* Pagination */
	$(document).on('click','.pagination a',function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getDataSize(page);
	});
	function getDataSize(page)
	{
		$.ajax({
		url: location + "/?page=" + page,
		success:function(data)
		{
			$('#table_data').html(data);
		}
		});
	}
    /* Quantity */
    $('.quantity-plus-pro-detail').click(function(e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity-pro-detail').find('.qty-pro').val();
        var value = parseInt(incre_value);
        value = isNaN(value) ? 0 : value;
        value++;
        $(this).parents('.quantity-pro-detail').find('.qty-pro').val(value);
    });

    $('.quantity-minus-pro-detail').click(function(e) {
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

    $('#city').change(function() {
        var cityID = $(this).val();
            if (cityID) {
                $.ajax({
                    type: "get",
                    url: "getdistrict?id_city=" + cityID,
                    success: function(res) {
                        if (res) {
                            $("#district").empty();
                            $("#district").append('<option>Quận/huyện</option>');
                            $.each(res, function(key, value) {
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
        $('#district').on('change', function() {
            var districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    type: "get",
                    url: "getward?id_district=" + districtID,
                    success: function(res) {
                        if (res) {
                            $("#ward").empty();
                            $("#ward").append('<option>Phường/xã</option>');
                            $.each(res, function(key, value) {
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
            url: "/delete-to-cart/"+id,
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
        var qty = $('#quantity_'+id).val();
        $.ajax({
            type: "get",
            url: "/update-to-cart/"+id+"/"+qty,
            success: function (data) {
                location.reload();
            }               
        });

        return false;
        });
    
    
    $(".payments-label").click(function(){
            var payments = $(this).data("payments");
            $(".payments-cart .payments-label, .payments-info").removeClass("active");
            $(this).addClass("active");
            $(".payments-info-"+payments).addClass("active");
        });

});

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
/* Img Preview */
const input = document.getElementById("file-zone");
const image = document.getElementById("photoUpload-preview");