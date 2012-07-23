jQuery(document).ready(function(){
   jQuery('select, input:text').uniform();
   jQuery('#revision').hide();
});

jQuery('#estado').change(function(){
   var valor = jQuery(this).val();
       finca = jQuery('#fincaproduccion').val();
   if(valor == ""){
      alert('Seleccione un elemento de la lista');
   }else{
      jQuery.ajax({
         url   :  'getContent.php',
         type  :  'POST',
         data  :  {
            'verificado'   :  valor,
            'finca'        :  finca
         },
         success:function(data){
            jQuery('#setContent').html(data);
         }
      });
   }
});

jQuery('#fincaproduccion').change(function(){
   if(jQuery(this).val() == ''){
      window.location.href = 'revisionarqueo.php?clear';
   }else{
      window.location.href = 'revisionarqueo.php?finca='+jQuery(this).val();
   }
});

function revision(id){
   jQuery.ajax({
      url   :  'getContentData.php',
      type  :  'POST',
      data  :  {
         'idArqueo'  :  id,
         'finca'     :  jQuery('#fincaproduccion').val()
      },
      success:function(data){
         jQuery('#revision').html(data);
         jQuery('#revision').slideDown();
         jQuery('#setContent').slideUp();
      }
   });
}

jQuery(document).keydown(function(e) { 
  var keyCode = e.keyCode || e.which; 

  if (keyCode == 116) { 
    e.preventDefault(); 
    return false;
  } 
});

function endRevision(id){
   jQuery.ajax({
      url   :  'endRevision.php',
      type  :  'POST',
      data  :  {
         'id'  :  id
      },
      success:function(){
         window.location.reload();
      }
   });
}