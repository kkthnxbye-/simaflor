jQuery(document).ready(function(){
   jQuery('#clienteShow').hide();
   jQuery('#fechasearch').calendarioDW("2011/01/01","2020/12/31");
   jQuery("select, input:text").uniform();
});

jQuery('#fincaproduccion').change(function(){
   if(jQuery(this).val() != ""){
      window.location.href = "salida.php?f="+jQuery(this).val();
   }else{
      window.location.href = "salida.php?page_bus=2";
   }
});

jQuery('#addsalida').click(function(){
      window.location.href = "addsalida.php?finca="+jQuery('#fincaproduccion').val();
});

jQuery('#cliente').keyup(function(){
      jQuery.ajax({
         url:'getFinca.php',
         type:'POST',
         data:{
            'word' : jQuery(this).val()
         },
         success:function(data){
            jQuery('#clienteShow').html(data);
            jQuery('#clienteShow').slideDown();
         }
      });
});

//jQuery('#cliente').blur(function(){
//   jQuery('#clienteShow').html('');
//});

function setId(id,name){
   jQuery('#cliente_id').val(id);
   jQuery('#cliente').val(name);
   jQuery('#clienteShow').slideUp('fast');
}