jQuery(document).ready(function(){
   jQuery('select, input:text').uniform();
});

function getData(value){
   jQuery.ajax({
         url:'getConsulta.php',
         type:'POST',
         data:{
            'pieza' : value
         },
         success:function(data){
            jQuery('#data_').html(data);
         }
      });
}

jQuery('#buscar').click(function(){
   if(jQuery.trim(jQuery('#pieza').val()) != ""){
      getData(jQuery.trim(jQuery('#pieza').val()));
   }else{
      
   }
});

function anular(value){
   
   if(!confirm('Esta seguro que desea anular este movimiento? Este cambio no podra ser revertido.')){
      return false;
   }else{
      if(!confirm('Esta seguro de ejecutar esta accion?')){
         return false;
      }
   }
   
   jQuery.ajax({
      url:'anular.php',
      type:'POST',
      data:{
         'id' : value
      },success:function(){
         jQuery(function(){msn.ok().mostrar('Proceso Exitoso.');});
         getData(jQuery.trim(jQuery('#pieza').val()));
      }
   });
   
   return false;
}