/*price range*/

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
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
        if(value>1){
            value--;
            $(this).parents('.quantity-pro-detail').find('.qty-pro').val(value);
        }
    });

});
$(document).ready(function() {
    $(function() {
        const slideOutPanel = $('#slide-out-panel').SlideOutPanel({});
        $('body').on('click', '#test1', () => {
            slideOutPanel.open();
        });
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