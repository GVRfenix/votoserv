$(document).ready(function(){
   $("#documentos").accordion();
   $('a.media').media({width:320, height:400}); 
   $('a.media2').media({width:320, height:400}); 
   $('a.media3').media({width:320, height:400}); 
   $("#fecha").datepicker({changeMonth: true, changeYear: true, maxDate: 0, minDate: null});
    $("#fcc").datepicker({changeMonth: true, changeYear: true, maxDate: null, minDate: null});
});

