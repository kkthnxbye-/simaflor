<?php require_once '../php/clases.php'; 
$VariedadesDAO = new VariedadesDAO();
$variedades = $VariedadesDAO->gets();
?>

<script>
$(document).ready(function(){
	
    $('#fecha_entrega').calendarioDW("2011/01/01","2020/12/31");
	$('#fecha_recibido').calendarioDW("2011/01/01","2020/12/31");
  });
</script>
<div class="form label-inline">
							  <div class="field">
							  <label for="fname">F. Entrega</label> 

							  <input id="fecha_entrega" name="fecha_entrega" size="12" type="text" class="medium" /></div>

				

			  <div class="field">

							  <label for="lname">F. Recibido </label> 

							  <input id="fecha_recibido" name="fecha_recibido" size="12" type="text" class="medium" /></div>

			  <div class="field">

				<label for="type">Variedad</label>

								<select size="1" class="medium" id="variedad" name="variedad">
								<option value="0">Seleccione</option>  
								<?php foreach ($variedades as $vari){?>
								  <option value="<?php echo $vari->getId();?>"><?php echo $vari->getNombre();?></option>
								<?php }?>
								</select>

			  </div>

			  <div class="field">

			    <label for="fname">Cantidad</label> 

			  <input id="cantidad" name="cantidad" size="12" type="text" class="medium" /></div>

                              

              <br />

			  <div class="buttonrow">

			    <button class="btn btn-grey" onclick="agregar_detalle()">Agregar</button>

                <br/><br/><br/>

			  </div>
</div>