jQuery(document).ready(function(){
   jQuery('#detail,#clienteShowAdd,#cancelar,#savesalida').hide();
   jQuery("select, input:text").uniform();
   setInterval(function(){
      jQuery.ajax({
         url:'getSessionSalida.php',
         success:function(data){
            jQuery('#session_data').html(data);
            if(jQuery('#countah').val() != 0){
            jQuery('#savesalida').show();
            }else{
            jQuery('#savesalida').hide();   
            }
         }
      });
   },1000);
});

jQuery('#cliente').live('keyup',function(){
      jQuery.ajax({
         url:'getFinca.php',
         type:'POST',
         data:{
            'word' : jQuery(this).val()
         },
         success:function(data){
            jQuery('#clienteShowAdd').html(data);
            jQuery('#clienteShowAdd').slideDown();
         }
      });
});

function setId(id,name){
   jQuery('#cliente_id').val(id);
   jQuery('#cliente').val(name);
   jQuery('#clienteShowAdd').slideUp('fast');
}

function delSessionsalida(id){
   jQuery.ajax({
      url  : 'delSessionSalida.php',
      type : 'POST',
      data : {
         'id' : id
      },
      success:function(){
         jQuery(function(){msn.ok().mostrar('Proceso Exitoso.');});
      }
   });
}

jQuery('#addToSession').live('click',function(){
   var pieza = jQuery('#pieza').val();
       cantidad = jQuery('#cantidadsalida').val();
   
   if(jQuery.trim(pieza) == "" || jQuery.trim(cantidad) == ""){
      $(function(){msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');});
      return false;
   }
   
   if(parseInt(jQuery.trim(jQuery('#cantidadsalida').val())) < 1 ||
      parseInt(jQuery('#cantidadsalida').val()) > parseInt(jQuery('#cantidadsalida_hidden').val())){
      $(function(){msn.error().mostrar('La cantidad ingresada debe ser mayor a cero y menor o igual a la cantidad dada.');});
      return false;
   }
   
   
   jQuery.ajax({
      url:'addSessionSalida.php',
      type:'POST',
      data:{
         'idInventario' : pieza,
         'cantidad' : cantidad
      },success:function(data){
        if(data == 'fail'){
           $(function(){msn.error().mostrar('El valor de la cantidad debe ser un numero .');});
           return false;
        } 
        jQuery(function(){msn.ok().mostrar('Proceso Exitoso.');});
        jQuery('#pieza').val('');
        jQuery('#cantidadsalida').val('');
        
      }
   });
       
});

jQuery('#next').live('click',function(){
   if(jQuery('#cliente_id').val() == "" || jQuery('#tipomovimiento').val() == ""){
      $(function(){msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');});
      return false;
   }
   
   
   jQuery('#detail').slideDown();
   
   jQuery('#cancelar').show();
   
   return false;
});

jQuery('#savesalida').live('click', function(){
   if(jQuery('#cliente_id').val() == "" || jQuery('#tipomovimiento').val() == ""){
      $(function(){msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');});
      return false;
   }
   
   if(!confirm("Esta seguro que desea realizar esta salida de inventario")){
      return false;
   }else{
      if(jQuery('#vencido').val() == 1){
         if(!confirm("Hay piezas vencidas en este movimiento. Desea continuar?")){
            return false;
         }
      }else{
         if(!confirm("Esta seguro de ejecutar esta accion?")){
            return false;
         }
      }
   }
   
   
   jQuery.ajax({
      url   :  'save.php',
      type  :  'POST',
      data  :  {
         'IDTipoMovimiento' : jQuery('#tipomovimiento').val(),
         'IDCliente'       : jQuery('#cliente_id').val()
      },
      success:function(data){
         if(data == 1){
            jQuery(function(){msn.ok().mostrar('Proceso Exitoso.');});
         }else{
            jQuery(function(){msn.error().mostrar('Error al guardar la salida de inventario.');});
         }
      }
   });
   
});

jQuery('#updatesalida').live('click',function(){
   if(jQuery('#tipomovimiento').val() == ""){
      jQuery(function(){msn.error().mostrar('Seleccione un tipo de movimiento');});
      return false;
   }
   
   jQuery.ajax({
      url:'update.php',
      type:'POST',
      data:{
         'idFincaProduccion'  : jQuery('#fincaproduccion').val(),
         'IDTipoMovimiento'   : jQuery('#tipomovimiento').val(),
         'IDDocumento'        : jQuery('#documento_id').val()
      },
      success:function(data){
         if(data == ''){
            jQuery(function(){msn.ok().mostrar('Proceso Exitoso');});
            /*window.location.reload();*/
         }else{
            jQuery(function(){msn.error().mostrar('Error en la actualizacion');});
         }
      }
   });
   
});

jQuery('#pieza').live('keydown', function(e) { 
  var keyCode = e.keyCode || e.which; 

  if (keyCode == 9) { 
    e.preventDefault(); 
    var value = jQuery('#pieza').val();
    jQuery.ajax({
       url:'getCantidad.php',
       type:'POST',
       data:{
          'value' : value
       },success:function(data){
          if(data == '2'){
           $(function(){msn.error().mostrar('No puede agregar mas de esta pieza.');});
           return false;
        }
          jQuery('#cantidadsalida').val(data);
          jQuery('#cantidadsalida_hidden').val(data);
       }
    });
    return false;
  } 
});


