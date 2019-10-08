$(document).ready(function () {
    $("#listado tbody tr, #listado-modi tbody tr").on('click', function(event){
        if($(this).children().first().html()!=='vacio'){
            //console.log($(this).children().first().html() );
            $("#id_usado").val( $(this).children().first().html() );
            $("#listado tbody tr").each(function (index, element){
                $(element).removeClass('linea-marcada');
            });
            $(this).addClass('linea-marcada');
            $('#editar').removeAttr('disabled').removeAttr('style').attr('class','jaction');
            $('#resetear').removeAttr('disabled').removeAttr('style').attr('class','jaction');
			if($(this).children().eq(8).html()!= 'no solicitado'){
				$('#vales').removeAttr('disabled').removeAttr('style').attr('class','jaction');
			} else {
				$('#vales').removeAttr('style').prop('disabled', true).css('visibility', 'hidden');;
			}
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
})