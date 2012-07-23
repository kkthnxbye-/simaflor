<?php
require_once '../php/clases.php';
$VariedadesDAO = new VariedadesDAO();
$variedades = $VariedadesDAO->gets();

$causaDAO = new causasnacionalDAO();
$causa = $causaDAO->gets();

$operariosDAO = new operariosDAO();
$operarios = $operariosDAO->gets();

?>
<script>
    $(document).ready(function(){
	
        $('#fecha_entrega').calendarioDW("2011/01/01","2020/12/31");
        $('#fecha_recibido').calendarioDW("2011/01/01","2020/12/31");
    });
</script>
<div class="form label-inline">

    <div class="field">
        <label for="fname">Cantidad</label> 
        <input type="text" name="cantidad" id="cantidad" >
    </div>
    
    <div class="field">
        <label for="fname">Bueno/Estado</label> 
        Si <input type="radio" name="estaBueno" id="estaBueno" value="si">
        No <input type="radio" name="estaBueno" id="estaBueno" value="no">
    </div>
    
    <div class="field">
        <label for="fname">Reclamar</label> 
        Si <input type="radio" name="reclamar" id="reclamar" value="si">
        No <input type="radio" name="reclamar" id="reclamar" value="no">
    </div>

    <div class="field">

        <label for="type">Causa nacional</label>

        <select size="1" class="medium" id="causa" name="causa">
            <option value="0">Seleccione</option>  
            <?php foreach ($causa as $item) { ?>
                <option value="<?php echo $item->getId(); ?>"><?php echo $item->getNombre(); ?></option>
            <?php } ?>
        </select>

    </div>
    
    <div class="field">

        <label for="type">Operario</label>

        <select size="1" class="medium" id="operario" name="operario">
            <option value="0">Seleccione</option>  
            <?php foreach ($operarios as $item) { ?>
                <option value="<?php echo $item->getId(); ?>"><?php echo $item->getNombre(); ?></option>
            <?php } ?>
        </select>

    </div>
    
    <div class="field">

        <label for="type">Habilitado</label>

        <input type="checkbox" name="habilitado" id="habilitado">

    </div>
    


    <br />

    <div class="buttonrow">

        <button class="btn btn-grey" onclick="addDeta()">Agregar</button>

        <br/><br/><br/>

    </div>
</div>