jQuery(document).ready(function(){
   
   
   jQuery('#fincaproduccion').change(function(){
   if(jQuery(this).val() == ""){
      document.location.href = 'lista.php?clear';
   }else{
      document.location.href = 'lista.php?f='+jQuery(this).val();
   }
});

});