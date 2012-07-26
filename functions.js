jQuery(document).ready(function(){
   //jQuery('#fechaSiembra').calendarioDW("2011/01/01","2020/12/31");
   
   jQuery('#fincaproduccion').change(function(){
   if(jQuery(this).val() == ""){
      document.location.href = 'lista.php?clear';
   }else{
      document.location.href = 'lista.php?f='+jQuery(this).val();
   }
});

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

});