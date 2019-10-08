$(document).ready(function () {
    $("#listado tbody tr, #listado-modi tbody tr").on('click', function(event){
        if($(this).children().first().html()!=='vacio'){
            console.log($(this).children().first().html() );
            $("#id_usado").val( $(this).children().first().html() );
            $("#listado tbody tr").each(function (index, element){
                $(element).removeClass('linea-marcada');
            });
            $(this).addClass('linea-marcada');
            $('#editar').removeAttr('disabled').removeAttr('style').attr('class','jaction');
            $('#formul').removeAttr('disabled').removeAttr('style').attr('class','jaction');
            $('#activo').removeAttr('disabled').removeAttr('style').attr('class','jaction');
            $('#baja').removeAttr('disabled').removeAttr('style').attr('class','jaction');
            $('#reporte').removeAttr('disabled').removeAttr('style').attr('class','jaction');
        }
    });
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