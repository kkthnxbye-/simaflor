jQuery(document).ready(function(){
   /***************/
   //jQuery("input, textarea, select, button").uniform();
   /***************/
   jQuery('#fechaingreso').calendarioDW("2011/01/01","2020/12/31");
   /***************/
   jQuery('#detail,#busquedacliente,#busquedaproveedor').hide();
   /***************/
}); 
jQuery('#next').click(function(){
   if(jQuery('#tipoentrada').val() == ""){
      $(function(){msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');});
      return false;
   }
   if(jQuery('#producto').val() == ""){
      $(function(){msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');});
      return false;
   }
   if(jQuery('#vegetal').val() == ""){
      $(function(){msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');});
      return false;
   }
   if(jQuery('#proveedor_id').val() == ""){
      $(function(){msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');});
      return false;
   }
   if(jQuery('#cliente_id').val() == ""){
      $(function(){msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');});
      return false;
   }
   if(jQuery('#ciclo').val() == ""){
      $(function(){msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');});
      return false;
   }
   if(jQuery('#fechaingreso').val() == ""){
      $(function(){msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');});
      return false;
   }
      
   jQuery('#tipoentrada_').val(jQuery('#tipoentrada').val());
   jQuery('#producto_').val(jQuery('#producto').val());
   jQuery('#vegetal_').val(jQuery('#vegetal').val());
   jQuery('#proveedor_id_').val(jQuery('#proveedor_id').val());
   jQuery('#cliente_id_').val(jQuery('#cliente_id').val());
   jQuery('#ciclo_').val(jQuery('#ciclo').val());
   jQuery('#fechaingreso_').val(jQuery('#fechaingreso').val());
      
   jQuery('#tipoentrada').attr('disabled','disabled');
   jQuery('#producto').attr('disabled','disabled');
   jQuery('#vegetal').attr('disabled','disabled');
   jQuery('#proveedor').attr('disabled','disabled');
   jQuery('#cliente').attr('disabled','disabled');
   jQuery('#ciclo').attr('disabled','disabled');
   jQuery('#fechaingreso').attr('disabled','disabled');
      
      
   jQuery.ajax({
      url:'variedades.php',
      type:'POST',
      data:{
         'IDProducto' : jQuery('#producto').val()
      },
      success:function(data){
         jQuery('#variedad').html(data);
      }
   });
   jQuery('#nextunidad').show();
   jQuery('#detail').slideDown();
   return true;
});
   
jQuery('#fincaproduccion').change(function(){
   if(jQuery(this).val() == ""){
      window.location.href = 'entrada.php?page_';
   }else{
      window.location.href = 'entrada.php?f='+jQuery(this).val();
   }
});
   
jQuery('#producto').change(function(){
   if(jQuery(this).val() != ""){
      jQuery.ajax({
         url:'materialesvegetales.php',
         type:'POST',
         data:{
            'producto' : jQuery(this).val()
         },
         success:function(data){
            jQuery('#vegetal').html(data);
         }
      });
   }
});
   
jQuery('#proveedor').keyup(function(){
   jQuery.ajax({
      url:'googleBox.php',
      type:'GET',
      data:{
         'word' : jQuery(this).val(),
         'roll' : 'proveedor'
      },
      success:function(data){
         $('#busquedaproveedor').html(data);
         $('#busquedaproveedor').slideDown();
      }
   });
});
   
jQuery('#cliente').keyup(function(){
   jQuery.ajax({
      url:'googleBox.php',
      type:'GET',
      data:{
         'word' : jQuery(this).val(),
         'roll' : 'cliente'
      },
      success:function(data){
         $('#busquedacliente').html(data);
         $('#busquedacliente').slideDown();
      }
   });
});


jQuery('#nextunidad').click(function(){
   //valores
   var tipoentrada = jQuery('#tipoentrada_').val();
   var producto = jQuery('#producto_').val();
   var vegetal = jQuery('#vegetal_').val();
   var proveedor = jQuery('#proveedor_id_').val();
   var cliente = jQuery('#cliente_id_').val();
   var ciclo = jQuery('#ciclo_').val();
   var fecha = jQuery('#fechaingreso_').val();
   var unidad = jQuery('#unidad').val();
   var variedad = jQuery('#variedad').val();
   var grado = jQuery('#grado').val();
   var cantidadxunidad = jQuery('#cantidadunidad').val();
   var nounidades = jQuery('#nounidades').val();
   var fincaproduccion = jQuery('#fincaproduccion').val();
   
   var array_data = {
      tipoentrada : tipoentrada,
      producto : producto,
      vegetal : vegetal,
      proveedor : proveedor,
      cliente : cliente,
      ciclo : ciclo,
      fecha : fecha,
      unidad : unidad,
      variedad : variedad,
      grado : grado,
      cantidadxunidad : cantidadxunidad,
      nounidades : nounidades,
      fincaproduccion : fincaproduccion
   };
   
   for(var i = 0; i < 13 ; i++){
      if(array_data[i] == ""){
         $(function(){  msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');  });
         break;
      }
   }
   
   jQuery.ajax({
      url:'save.php',
      type:'POST',
      data:{
         'tipoentrada' : tipoentrada,
         'producto' : producto,
         'vegetal' : vegetal,
         'proveedor' : proveedor,
         'cliente' : cliente,
         'ciclo' : ciclo,
         'fecha' : fecha,
         'unidad' : unidad,
         'variedad' : variedad,
         'grado' : grado,
         'cantidadxunidad' : cantidadxunidad,
         'nounidades' : nounidades,
         'fincaproduccion' : fincaproduccion
      },
      success:function(data){
         //alert(data);
         //return false;
         if(data == 1){
            $(function(){  msn.ok().mostrar('Proceso Exitoso.');  });
         }else{
            $(function(){  msn.error().mostrar('Hubo un error en la entrada de inventario, por favor verifique la informacion ingresada.');  });
         }
         
         jQuery('#unidad').val('');
         jQuery('#variedad').val('');
         jQuery('#grado').val('');
         jQuery('#cantidadunidad').val('');
         jQuery('#nounidades').val('');
      }
   });
   
   
});

jQuery('#close').click(function(){
   //Quito los disabled
   jQuery('#tipoentrada').removeAttr('disabled');
   jQuery('#producto').removeAttr('disabled');
   jQuery('#vegetal').removeAttr('disabled');
   jQuery('#proveedor').removeAttr('disabled');
   jQuery('#cliente').removeAttr('disabled');
   jQuery('#ciclo').removeAttr('disabled');
   jQuery('#fechaingreso').removeAttr('disabled');
   //Oculto el boton de guardar.
   jQuery('#nextunidad').hide();
      
});

function placeId(id,val,name){
   if(val == '1'){
      jQuery('#proveedor_id').val(id);
      jQuery('#proveedor').val(name);
      jQuery('#busquedaproveedor').hide(500);
      jQuery('#busquedaproveedor').html('');
   }else{
      jQuery('#cliente_id').val(id);
      jQuery('#cliente').val(name);
      jQuery('#busquedacliente').hide(500);
      jQuery('#busquedacliente').html('');
   }
}