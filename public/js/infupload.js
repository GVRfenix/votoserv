$(document).ready(function() {
            $('#borrar').button().button('disable');
            $('table').footable();

            $('.clear-filter').click(function (e) {
                e.preventDefault();
                $('table').trigger('footable_clear_filter');
            });
            
            $("#tab tbody").delegate ("tr", "click", function(event){
                $('#tab td').each(function(key, val){ 
                      $(val).removeClass('resaltado');  
                });
                selected = $(this).find('td:first').text();
                $(this).find('td').addClass('resaltado');
                $("#borrar").button('enable');
            });
            
            $("#borrar").click(function(event){
                if(selected!=0){
                    location.href = "http://"+location.host+"/informe/borrar?id="+selected+"&cite="+$("#cite").val();
                }else{
                    alert("Debe seleccionar algun registro");
                }
            });
    });