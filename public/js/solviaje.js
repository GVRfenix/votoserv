$(document).ready(function () {
	
	
	
	if(!$('#vehi').is(':checked')){
		$('#vehiculo').prop('disabled', true).css('visibility', 'hidden');
		$('#kiloi').prop('disabled', true).css('visibility', 'hidden').css('width', 0).css('height',0);
	}
	
	if(!$('#chof').is(':checked')){
		$('#chofer').prop('disabled', true).css('visibility', 'hidden');
	}
	
	if(!$('#combus').is(':checked')){
		$('#litros').prop('disabled', true).css('visibility', 'hidden');
	}
	
	$("#fecsal").datepicker({changeMonth: true, changeYear: true, maxDate: null, minDate: null});
    
	$('#resp').autocomplete({
        minLength: 3,
        source: function( request, response ) {
            $.ajax({
				type: "POST",
                url : '/datos',
                dataType: "json",
                data: {
					_token: $('#token').val(),
                    dat: request.term,
                    tipo: 'ci'
                },
                success: function( data ) {
					response( $.map( data, function( item ) {
					    return {
                            label: item.value,
                            value: item.val,
                            id: item.id,
							/*label: item.func_nom+' '+item.func_ape,
                            value: item.func_nom+' '+item.func_ape,
                            id: item.func_id,*/
                        };
                    }));
                }
            });
        },
        select: function(event,ui){
            //console.log(ui.item.id);
            $('#idresp').val(ui.item.id);
        }
    });
	
	$('#unid').autocomplete({
        minLength: 3,
        source: function( request, response ) {
            $.ajax({
				type: "POST",
                url : '/datos',
                dataType: "json",
                data: {
					_token: $('#token').val(),
                    dat: request.term,
                    tipo: 'unidad'
                },
                success: function( data ) {
                    response( $.map( data, function( item ) {
                        return {
                            label: item.value,
                            value: item.val,
                            id: item.id,
                        };
                    }));
                }
            });
        },
        select: function(event,ui){
            //console.log(ui.item.id);
            $('#idUni').val(ui.item.id);
		}
    });
	
	
	$('#vehiculo').autocomplete({
        minLength: 3,
        source: function( request, response ) {
			
            $.ajax({
				
				type: "POST",
                url : '/datos',
                dataType: "json",
                data: {
					_token: $('#token').val(),
                    dat: request.term,
                    tipo: 'vehic'
                },
                success: function( data ) {
                    response( $.map( data, function( item ) {
                        return {
                            label: item.value,
                            value: item.value,
                            id: item.id,
                        };
                    }));
                }
            });
        },
        select: function(event,ui){
            //console.log(ui.item.id);
            $('#idveh').val(ui.item.id);
		}
    });
	
	$('#chofer').autocomplete({
        minLength: 3,
        source: function( request, response ) {
            $.ajax({
				type: "POST",
                url : '/datos',
                dataType: "json",
                data: {
					_token: $('#token').val(),
                    dat: request.term,
                    tipo: 'chofer'
                },
                success: function( data ) {
                    response( $.map( data, function( item ) {
                        return {
                            label: item.value,
                            value: item.val,
                            id: item.id,
                        };
                    }));
                }
            });
        },
        select: function(event,ui){
            //console.log(ui.item.id);
            $('#idcho').val(ui.item.id);
        }
    });
	
	$('#vehi').on('change', function(){
		if($('#vehi').is(':checked')){
			$('#vehiculo').removeAttr('disabled').removeAttr('style');
			$('#kiloi').removeAttr('disabled').removeAttr('style');
		} else {
			$('#vehiculo').prop('disabled', true).css('visibility', 'hidden');
			$('#kiloi').prop('disabled', true).css('visibility', 'hidden').css('width', 0).css('height',0);
		}
	})
	
	$('#chof').on('change', function(){
		if($('#chof').is(':checked')){
			$('#chofer').removeAttr('disabled').removeAttr('style');
		} else {
			$('#chofer').prop('disabled', true).css('visibility', 'hidden');
		}
	})
	
	$('#combus').on('change', function(){
		if($('#combus').is(':checked')){
			$('#litros').removeAttr('disabled').removeAttr('style');
		} else {
			$('#litros').prop('disabled', true).css('visibility', 'hidden');
		}
	})
});