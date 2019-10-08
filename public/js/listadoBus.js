var selected = 0;
var fecha = 0;
var params = '';
$(document).ready(function(){
    $("#eliminar").button().button('disable');
    function getSearchParameters() {
        var prmstr = window.location.search.substr(1);
        return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
    }

    function transformToAssocArray( prmstr ) {
        var params = {};
        var prmarr = prmstr.split("&");
        for ( var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split("=");
            params[tmparr[0]] = tmparr[1];
        }
        return params;
    }

    params = getSearchParameters();
    console.log(params['id']);
    
    var oTable = $('#listaBus').dataTable({
        "sPaginationType": "full_numbers",
        "bAutoWidth": false,
        "aoColumns": [
            { "bVisible": false, "sWidth": "5%", "sClass": "center"},
            { "sWidth": "18%"},
            { "sWidth": "35%"},
            { "sWidth": "9%"},
            { "sWidth": "5%"},
            { "sWidth": "5%"},
            { "sWidth": "5%"},
            { "sWidth": "18%"},
            { "sWidth": "5%"}
        ],
        "bProcessing": true,
        "sAjaxSource": "/archivo/devuelvelista?id="+params['id'],
        "sAjaxDataProp": "aaData",
        "aaSorting": [[ 0, "desc" ]]
    });
    
    var opt = $("option[val=2]"),
    html = $("<div>").append(opt.clone()).html();
    html = html.replace(/\>/, ' selected="selected">');
    opt.replaceWith(html);
    
    $("#listaBus tbody").delegate ("tr", "click", function(event){
        $("#listaBus tbody tr").each(function(key, val){
            if( $(val).hasClass('resaltado') ){
                $(val).removeClass('resaltado');
            }
        });
        
        var pos = oTable.fnGetPosition(this);
        $(this).addClass("resaltado");
        var datos = oTable.fnGetData ([pos][0] ); 
        console.log(datos[0]);
        selected = datos[0];
        $("#eliminar").button('enable');
    });
    
    $("#eliminar").click(function(event){
        if(selected!=0){
            location.href = "http://"+location.host+"/archivo/eliminar?id="+selected;
        }else{
            alert("Debe seleccionar algun registro");
        }
    });
    
    $("#mostrar").change(function(event){
//       console.log($("#mostrar").val());
        valor = $("#mostrar").val();
        location.href = "http://"+location.host+"/archivo/ir?id="+valor;
    });
});