<?php
include '../includes/header.php';
$empresasDAO = new empresasDAO();
$productosDAO = new productosDAO();
$productos = $productosDAO->gets();
$serviciosDAO = new serviciosDAO();
$servicioss = $serviciosDAO->gets();
$procesosDAO = new procesosDAO();
$procesos = $procesosDAO->gets();
$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
$tipos_movimiento = $TiposMovimientoInventarioDAO->gets();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$materiales = $materialesVegetalesDAO->gets();

$obj_finca = $empresasDAO->gets();
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_']." / Nuevo" ?></h4>

        </div>

        <div class="portlet-content">

            <div class="portlet-content">

                <form action="../php/action/enrutamientoprocesoAdd.php" method="post" class="form label-inline">


                    <div class="field">
                        <label for="fname">Finca <strong style="color: red">*</strong></label>
                        
                        <select name="idFinca" id="idProducto">
                            <option value="0">Seleccione</option>
                            <?php foreach ($obj_finca as $finc) : ?>
                                <option value=<?= $finc->getId() ?> <?php if($finc->getId() == $_GET['f'] ){echo "selected";}?> ><?= $finc->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Producto <strong style="color: red">*</strong></label>
                        
                        <select name="idProducto" id="idProducto">
                            <option value="0">Seleccione</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value=<?= $producto->getId() ?> <?php if($producto->getId() == $_GET['p'] ){echo "selected";}?> ><?= $producto->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Servicio <strong style="color: red">*</strong></label>
                        <select name="idServicio" id="idServicio">
                            <option value="0">Seleccione</option>
                            <?php foreach ($servicioss as $servicio) : ?>
                                <option value=<?= $servicio->getId() ?> <?php if($servicio->getId() == $_GET['s'] ){echo "selected";}?> ><?= $servicio->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Material Vegetal <strong style="color: red">*</strong></label>
                        <select name="idMaterialesVegetales" id="idMaterialesVegetales">
                            <option value="0">Seleccione</option>
                            <?php foreach ($materiales as $material) : ?>
                                <option value=<?= $material->getId() ?> <?php if($material->getId() == $_GET['mv'] ){echo "selected";}?> ><?= $material->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Proceso Origen <strong style="color: red">*</strong></label>
                        <select name="idProcesoOrigen" id="idProcesoOrigen">
                            <option value="0">Seleccione</option>
                            <?php foreach ($procesos as $proceso) : ?>
                            
                                <option value=<?= $proceso->getId() ?> <?php if($proceso->getId() == $_GET['po'] ){echo "selected";}?> ><?= $proceso->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Proceso Destino <strong style="color: red">*</strong></label>
                        <select name="idProcesoDestino" id="idProcesoDestino">
                            <option value="0">Seleccione</option>
                            <?php foreach ($procesos as $proceso) : ?>
                                <option value=<?= $proceso->getId() ?> <?php if($proceso->getId() == $_GET['pd'] ){echo "selected";}?> ><?= $proceso->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Tipo de Movimiento</label>
                        <select name="idTipoMovimiento" id="idTipoMovimiento">
                            <option value="0">Seleccione</option>
                            <?php foreach ($tipos_movimiento as $tipo_movimiento) : ?>
                                <option value=<?= $tipo_movimiento->getId() ?> <?php if($tipo_movimiento->getId() == $_GET['tm'] ){echo "selected";}?> ><?= $tipo_movimiento->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="field">
                        <label for="fname">Genera etiqueta de producci&oacute;n <strong style="color: red">*</strong></label>
                        <label>Si</label><input type="radio" name="generaEtiquetaProduccion" value="si" <?php if($_GET['ge'] == "si" ){echo "checked";}?> >
                        <label>No</label><input type="radio" name="generaEtiquetaProduccion" value="no" <?php if($_GET['ge'] == "no" ){echo "checked";}?> >
                    </div>

                    <br />
                    <div class="buttonrow">

                        <button class="btn btn-grey">Guardar</button>

                        <button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>

                    </div>

                </form>



                <br /><br />

                <br /><br />



            </div>



        </div>

    </div>







</div> <!-- #content -->

<?php include '../includes/footer.php'; ?>