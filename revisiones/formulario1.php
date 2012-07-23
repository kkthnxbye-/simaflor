<?php
require_once '../php/clases.php';
//include '../php/dao/pedidosDAO.php';


echo "id: ".$pedido_id;
$pedidosDAO = new pedidosDAO();
$pedidos = new pedidos();
$pedidos = $pedidosDAO->getById($pedido_id);

$VariedadesDAO = new VariedadesDAO();
$variedades = $VariedadesDAO->gets("IDProducto", $tipob, $pedidos->getProducto());

$tiposUnidadDAO = new TiposUnidadesPMDAO();
$tiposUnidad = $tiposUnidadDAO->gets($campo, $tipoBusqueda, $valor);



?>

<script>
    $(document).ready(function(){
	
        $('#fecha_entrega').calendarioDW("2011/01/01","2020/12/31");
        $('#fecha_recibido').calendarioDW("2011/01/01","2020/12/31");
    });
</script>
<div class="form label-inline">

    <div class="field">
        <label for="fname">Tipo unidad</label> 
        <select size="1" class="medium" id="variedad" name="unidad">
            <option value="0">Seleccione</option>  
            <?php foreach ($tiposUnidad as $item): ?>
            <option value="<?= $item->getId() ?>"><?= $item->getNombre() ?></option>  
            <?php endforeach; ?>
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

</div>