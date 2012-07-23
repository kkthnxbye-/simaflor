<?php
require_once '../php/clases.php';
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
        <label for="fname">Unidad</label> 
        <select size="1" class="medium" id="variedad" name="unidad">
            <option value="0">Seleccione</option>  
            <option value="0">Unidad 1</option>  
            <option value="0">Unidad 2</option>  
            <option value="0">Unidad 3</option>  
        </select>
    </div>

    <div class="field">

        <label for="type">Variedad</label>

        <select size="1" class="medium" id="variedad" name="variedad">
            <option value="0">Seleccione</option>  
            <?php foreach ($variedades as $vari) { ?>
                <option value="<?php echo $vari->getId(); ?>"><?php echo $vari->getNombre(); ?></option>
            <?php } ?>
        </select>

    </div>
    <div class="field">

        <label for="lname">Grado </label> 
        <select size="1" class="medium" id="grado" name="grado">
            <option value="0">Seleccione</option>  
            <option value="0">Grado 1</option>  
            <option value="0">Grado 2</option>  
            <option value="0">Grado 3</option>  
        </select>
    </div>



    <br />

    <div class="buttonrow">

        <button class="btn btn-grey" onclick="agregar_detalle()">Agregar</button>

        <br/><br/><br/>

    </div>
</div>