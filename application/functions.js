/* Functions */
var obj = {
   '' : 0
}

function cargarContenido(url) {
   
   jQuery.ajax({
      url:""+url+"",
      type:'POST',
      success:function(data){
         jQuery('#data').html(data);
      }   
   });
}

function editar_(id){
   jQuery.ajax({
      url:'getGlobal.php',
      type:'GET',
      data:{
         'id':id
      },
      success:function(data){
         data_ = data.split('._/.');
         jQuery('#idE').val(data_[0]);
         jQuery('#variableE').val(data_[1]);
         jQuery('#valorE').val(data_[2]);
      }
   });
}

function editar_2(){
   if(jQuery('#variableE').val() == ""){
      $(function(){
         msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');
      });
      return false;
   }
   if(jQuery('#valorE').val() == ""){
      $(function(){
         msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');
      });
      return false;
   }
   if(jQuery('#idE').val() == ""){
      $(function(){
         msn.error().mostrar('Seleccione un item de la lista inferior.');
      });
      return false;
   }
   jQuery.ajax({
      url:'edit.php',
      type:'POST',
      data:{
         'variable' : jQuery('#variableE').val(),
         'valor' : jQuery('#valorE').val(),
         'id' : jQuery('#idE').val()
      },
      success:function(){
         $(function(){
            msn.ok().mostrar('Proceso Exitoso.');
         });
         jQuery('#variableE').val('');
         jQuery('#valorE').val('');
         jQuery('#idE').val('');
      }
   });
   return true;
}

function change(){
   jQuery('#editarButton').hide();
   jQuery('#nuevoButton').show();
}


function nuevo(){
   if(jQuery('#variableE').val() == ""){
      $(function(){
         msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');
      });
      return false;
   }
   if(jQuery('#valorE').val() == ""){
      $(function(){
         msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');
      });
      return false;
   }
   jQuery.ajax({
      url:'add.php',
      type:'POST',
      data:{
         'variable' : jQuery('#variableE').val(),
         'valor' : jQuery('#valorE').val()
      },
      success:function(){
         $(function(){
            msn.ok().mostrar('Proceso Exitoso.');
         });
         jQuery('#variableE').val('');
         jQuery('#valorE').val('');
         jQuery('#editarButton').show();
         jQuery('#nuevoButton').hide();
      }
   });
   return true;
   
}

function eliminar_(id){
   if(!confirm("Si elimina este ítem no hay forma de devolver esta acción. Si desea \ncontinuar Click en Aceptar, Si no Click en Cancelar")) { 
      return false;
   }else{
      if(!confirm("¿Está seguro de realizar esta acción?")){
         return false;
      }else{
         jQuery.ajax({
            url:'delete.php',
            type:'POST',
            data:{
               'id':id
            },
            success:function(){
               $(function(){
                  msn.ok().mostrar('Proceso Exitoso.');
               });
            }
         });
      }
      return true;
   }
   
}
   
jQuery(document).ready(function(){
   jQuery('#nuevoButton').hide();
   
   setInterval(function() {
      var url_cargar = 'getData.php';
      cargarContenido(url_cargar);
   }, 1000);      
});


