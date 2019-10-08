$(document).ready(function () {
    var top = $('#jfloat').offset().top - parseFloat($('#jfloat').css('marginTop').replace(/auto/, 0));
    $(window).scroll(function (event) {
        var y = $(this).scrollTop();
        if (y >= (top)) {
            $('#jfloat').addClass('fixed');
        } else {
            $('#jfloat').removeClass('fixed');
        }
    });
});