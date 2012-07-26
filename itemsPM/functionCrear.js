jQuery(document).ready(function(){
   jQuery('#fechaSiembra').calendarioDW("2011/01/01","2020/12/31");
   jQuery('#proveedor_show,#cliente_show,#operario_show,#session').hide();
   jQuery('#producto').change(function(){
   if(jQuery(this).val() != ''){
      jQuery.ajax({
         url   :  'getDrop.php',
         type  :  'POST',
         data  :  {
            'id'  :  jQuery(this).val()
         },
         success:function(data){
            jQuery('#variedad').html(data);
         }
      });
   }else{
      alert('asd');
   }
});

function getCustomer(self,type,divResult){
   jQuery.ajax({
         url   :  'build.php',
         type  :  'POST',
         data  :  {
            'word'   :  self.val(),
            'type'   :  ''+type+''
         },success:function(data){
            jQuery('#'+divResult).html(data);
            jQuery('#'+divResult).slideDown();
         }
      });
}

jQuery('#proveedor').keyup(function(){
   var self = jQuery(this);
   if(self.val() != ""){
      getCustomer(self,'pro','proveedor_show');
   }
});

jQuery('#cliente').keyup(function(){
   var self = jQuery(this);
   if(self.val() != ""){
      getCustomer(self,'cli','cliente_show');
   }
});

function bloques_(self){
   jQuery.ajax({
         url   :  'getBloques.php',
         type  :  'POST',
         data  :  {
            'id'  :  self.val()
         },
         success:function(data){
            jQuery('#bloquesResult').html(data);
         }
      });
}

jQuery('#bloques').change(function(){
   var self = jQuery(this);
   product = jQuery('#producto').val();
   vegetal = jQuery('#vegetal').val();
   variedad = jQuery('#variedad').val();
   breeder = jQuery('#breeder').val();
   proveedor_ = jQuery('#proveedor_').val();
   cliente_ = jQuery('#cliente_').val();
   fechaSiembra = jQuery('#fechaSiembra').val();
   ciclo = jQuery('#ciclo').val();
   if(self.val() != '' && product != '' && vegetal != '' && variedad != '' 
      && breeder != '' && proveedor_ != '' && cliente_ != '' && fechaSiembra != '' && ciclo != ''){
      bloques_(self);
   }else{
      $(function(){  msn.error().mostrar('Recuerde que los campos marcador con * son obligatorios');  });
      $("#bloques").val('');
   }
});

jQuery('#operario').keyup(function(){
   var self = jQuery('#operario');
   if(self.val() != ''){
      jQuery.ajax({
         url   :  'getOperarios.php',
         type  :  'POST',
         data  :  {
            'word'   :  self.val()
         },
         success:function(data){
            jQuery('#operario_show').html(data);
            jQuery('#operario_show').slideDown();
         }
      });
   }
});

jQuery('#addToSession').on('click',function(){
   var idareaxbloque = jQuery('#idareaxbloque').val();
   cantidad = jQuery('#cantidad').val();
   idOperario = jQuery('#operario_').val();
   tipo = jQuery('#tipo').val();
   self = jQuery('#bloques');
   jQuery.ajax({
      url   :  'addToSession.php',
      type  :  'POST',
      data  :  {
         'idareaxbloque'   :  idareaxbloque,
         'cantidad'        :  cantidad,
         'idOperario'      :  idOperario,
         'tipo'            :  tipo
      },
      success:function(data){
         if(data == 'failInt'){
            $(function(){  msn.error().mostrar('La cantidad debe ser un numero entero');  });
            return false;
         }
         cargar_session_item(idareaxbloque);
         bloques_(self);
         jQuery('#cantidad').val('');
         jQuery('#operario_').val('');
         jQuery('#tipo').val('');
      }

   });
   
});



 
});

function setData(id,nombre,o){
   if(o == 1){
   jQuery('#proveedor_').val(id);
   jQuery('#proveedor').val(nombre);
   jQuery('#proveedor_show').hide();   
   }else{
   jQuery('#cliente_').val(id);
   jQuery('#cliente').val(nombre);
   jQuery('#cliente_show').hide(); 
   }
}

function setSessionData(id,nombre,tipo){
   jQuery('#operario_').val(id);
   jQuery('#operario').val(nombre);
   jQuery('#tipo').val(tipo);
   jQuery('#operario_show').hide(); 
}

function cargar_session_item(id){
   jQuery.ajax({
      url   :  'getSession.php',
      type  :  'POST',
      data  :  {
         'id'  :  id
      },success:function(data){
         jQuery('#showSession').html(data);
      }
   });
}


function openWindow(id){
   jQuery('#idareaxbloque').val(id);
   jQuery('#session').slideDown();
   cargar_session_item(id);
   
}

function finish(){
   var product = jQuery('#producto').val();
   vegetal = jQuery('#vegetal').val();
   variedad = jQuery('#variedad').val();
   breeder = jQuery('#breeder').val();
   proveedor_ = jQuery('#proveedor_').val();
   cliente_ = jQuery('#cliente_').val();
   fechaSiembra = jQuery('#fechaSiembra').val();
   ciclo = jQuery('#ciclo').val();
   bloque = jQuery('#bloques').val();
   temporada = jQuery('#temporada').val();
   alias = jQuery('#alias').val();
   
   if(bloque != '' && product != '' && vegetal != '' && variedad != '' && breeder != '' && proveedor_ != '' && cliente_ != '' && fechaSiembra != '' && ciclo != ''){
      
      jQuery.ajax({
         url   :  'saveItem.php',
         type  :  'POST',
         data  :  {
            'product'      :  product,
            'vegetal'      :  vegetal,
            'variedad'     :   variedad,
            'breeder'      :  breeder,
            'proveedor_'   :  proveedor_,
            'cliente_'     :  cliente_,
            'fechaSiembra' :  fechaSiembra,
            'ciclo'        :  ciclo,
            'bloque'       :  bloque,
            'temporada'    :  temporada,
            'alias'        :  alias
         },
         success:function(data){
            alert(data);
            return false;
            data_ = data.split('####');
            if(data_[0] == 'doubleAlias'){
               
            }
         }
      });
   }else{
      $(function(){  msn.error().mostrar('Recuerde que los campos marcador con * son obligatorios');  });
   }
   

}