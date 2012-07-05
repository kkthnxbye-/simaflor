<?php
require_once '../php/clases.php';
$VariedadesDAO = new VariedadesDAO();
$configuracionxvariedadDAO = new configuracionxvariedadDAO();
$lista_ = $configuracionxvariedadDAO->getsDia();



//$variedades = $VariedadesDAO->gets();
?>
<style>
   #cantidad{
      width: 150px;
      border: 1px solid green;
      outline: none;
   }
</style>
<script>
   $(document).ready(function(){
	
      $('#fecha_entrega').calendarioDW("2011/01/01","2020/12/31");
      $('#fecha_recibido').calendarioDW("2011/01/01","2020/12/31");
   });
   
   function getNumberToAdd(idVariedad){
      var fecha = $('#fecha_entrega').val();
      if(idVariedad != 0 && idVariedad != "" && fecha != ""){
         $.ajax({
            url:'../php/action/getNewVariedadDate.php',
            type:'GET',
            data:{
               'id':idVariedad,
               'fecha':fecha
            },
            success:function(data){
               //alert(data);
               $('#fecha_recibido').val(data);
               $('#fechaRess').html(data);
            }
         });
         return true;
      }else{
         alert('Seleccione una fecha de entrega y una variedad de la lista.');
         $('#variedad :nth-child(1)').attr('selected', 'selected')
         return false;
      }
   }
</script>
<div class="form label-inline">

   

   <div class="field">
      <label for="fname">F. Entrega <strong style="color:red">*</strong></label> 

      <input id="fecha_entrega" name="fecha_entrega" size="12" type="text" class="medium" />
   </div>

   <div class="field">

      <label for="type">Variedad <strong style="color:red">*</strong></label>

      <select size="1" class="medium" id="variedad" name="variedad" onchange="return getNumberToAdd(this.value);">
         <option value="0">Seleccione</option>  
         <?php foreach ($lista_ as $vari) { ?>
         <?php $variedad_ = $VariedadesDAO->getById($vari->getIdVariedad()); ?>
            <option value="<?php echo $variedad_->getId(); ?>"><?php echo $variedad_->getNombre(); ?></option>
         <?php } ?>
      </select>

   </div>

   <div class="field">

      <label for="lname">F. Recibido <strong style="color:red">*</strong></label> 
      <span id="fechaRess"></span>
      <input id="fecha_recibido" name="fecha_recibido" size="12" type="hidden" class="medium" />
   </div>

   

   <div class="field">

      <label for="fname">Cantidad <strong style="color:red">*</strong></label> 

      <input id="cantidad" name="cantidad" size="12" type="text" class="medium" required title="Digitar numeros enteros" />
   </div>



   <br />

   <div class="buttonrow">

      <button class="btn btn-grey" onclick="agregar_detalle()">Agregar</button>

      <br/><br/><br/>

   </div>
</div>