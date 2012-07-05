<?php include '../includes/header.php'; ?>
<?php
$enrutamientoprocesoDAO = new enrutamientoprocesoDAO();
$empresasDAO = new empresasDAO();
$productosDAO = new productosDAO();
$procesosDAO = new procesosDAO();
$serviciosDAO = new serviciosDAO();
$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();

if($_GET['page_bus'] == "2"){
    unset($_SESSION['campo']);
    unset($_SESSION['valor']);
}

if (!empty($_POST['page'])) {
    $_SESSION['page'] = $_POST['page'];
}
if (!empty($_REQUEST['page_bus'])) {
    $_SESSION['page'] = "busk_sin";
}

if (!empty($_POST['campo'])) {
    $_SESSION['campo'] = $_POST['campo'];
}

if($_POST['campo'] == "todos"){
    unset($_SESSION['campo']);
    $_POST['campo'] = "";
}

if (!empty($_POST['tipo_b'])) {
    $_SESSION['tipo_b'] = $_POST['tipo_b'];
}
if (!empty($_POST['valor'])) {
    $_SESSION['valor'] = $_POST['valor'];
}

if($_SESSION['campo'] == "IDFinca"){
    $objLis = $empresasDAO->gets();
}if($_SESSION['campo'] == "IDProducto"){
    $objLis = $productosDAO->gets();
}if($_SESSION['campo'] == "IDServicioPM"){
    $objLis = $serviciosDAO->gets();
}if($_SESSION['campo'] == "IDMaterialVegetal"){
    $objLis = $materialesVegetalesDAO->gets();
}if($_SESSION['campo'] == "IDProcesoOrigen"){
    $objLis = $procesosDAO->gets();
}if($_SESSION['campo'] == "IDProcesoDestino"){
    $objLis = $procesosDAO->gets();
}if($_SESSION['campo'] == "IDTipoMovimientoInventario"){
    $objLis = $TiposMovimientoInventarioDAO->gets('', '', '');
}

$enrutamientoprocesos = $enrutamientoprocesoDAO->gets($_SESSION['campo'], $_SESSION['valor']);
?>




<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?></h4>

            <div class="help">
                <?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> 
            </div>



        </div>



        <div class="portlet-content">
            <div style="width: 250px;float: left;top: 6px;position: relative;">
                <form name="camp" action="lista.php" id="camp" method="post">
                Campo &nbsp;&nbsp;
                <select name="campo" id="campo" onchange="document.getElementById('camp').submit()">
                        <option value="todos" <?php if ($_SESSION['campo'] == '') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="IDFinca" <?php if ($_SESSION['campo'] == 'IDFinca') { ?> selected="selected"<?php } ?>>Finca</option>
                        <option value="IDProducto" <?php if ($_SESSION['campo'] == 'IDProducto') { ?> selected="selected"<?php } ?>>Producto</option>
                        <option value="IDServicioPM" <?php if ($_SESSION['campo'] == 'IDServicioPM') { ?> selected="selected"<?php } ?>>Servicio</option>
                        <option value="IDMaterialVegetal" <?php if ($_SESSION['campo'] == 'IDMaterialVegetal') { ?> selected="selected"<?php } ?>>Material Vegetal</option>
                        <option value="IDProcesoOrigen" <?php if ($_SESSION['campo'] == 'IDProcesoOrigen') { ?> selected="selected"<?php } ?>>Proceso Origen</option>
                        <option value="IDProcesoDestino" <?php if ($_SESSION['campo'] == 'IDProcesoDestino') { ?> selected="selected"<?php } ?>>Proceso Destino</option>
                        <option value="IDTipoMovimientoInventario" <?php if ($_SESSION['campo'] == 'IDTipoMovimientoInventario') { ?> selected="selected"<?php } ?>>Tipo Movimiento Inventario</option>
                    </select>
                </form>
                </div>
            <div class="user_tit">
                <?php if($objLis != ""){ ?>
                <form name="busqueda" action="lista.php" id="busqueda" method="post">
                    
                    
                    Valor
                    <select name="valor" id="valor">
                        <?php foreach ($objLis as $value): ?>
                        <option value="<?= $value->getId() ?>" <?php if($value->getId() == $_SESSION['valor']){echo "selected";} ?> ><?= $value->getNombre() ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    

                    <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
                </form>
                <?php }?>
            </div>

            <div style="display:inline"  style="padding-left:10px">
                <div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
                <a href="lista.php?page_bus=2" class="btn_editar l">

                    <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>

                    Limpiar Filtro

                </a>
            </div>

            <div class="btn_right">


                <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='enrutamientoproceso_crear.php'">Nuevo</button>
                <a href="excel.php" class="btn_editar">

                    <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div>

                    Exportar (CSV)</a>

                <br/><br/>

            </div>

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>   
                        <th>Finca</th>   
                        <th>Producto</th>
                        <th>Servicio</th>
                        <th>Material Vegetal</th>
                        <th>Proceso Origen</th>
                        <th>Proceso Destino</th>
                        <th>Tipo de Movimiento</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enrutamientoprocesos as $op) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $op->getId(); ?></td>
                    <td><?php echo $empresasDAO->getById($op->getIdFinca())->getNombre() ?></td>
                    <td><?php echo $productosDAO->getById($op->getIdProducto())->getNombre() ?></td>
                    <td><?php echo $serviciosDAO->getById($op->getIdServicio())->getNombre() ?></td>
                    <td><?php echo $materialesVegetalesDAO->getById($op->getIdMaterialVegetal())->getNombre() ?></td>
                    <td><?php echo $procesosDAO->getById($op->getIdProcesoOrigen())->getNombre(); ?></td>
                    <td><?php echo $procesosDAO->getById($op->getIdProcesoDestino())->getNombre(); ?></td>
                    <td><?php echo $TiposMovimientoInventarioDAO->getById($op->getIdTipoMovimientoInventario())->getNombre(); ?></td>
                    <td><a href="enrutamientoproceso_editar.php?id=<?php echo $op->getId(); ?>" class="btn_editar">

                            <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                            Editar</a>

                        <a onClick="return confirma(this)" href="../php/action/enrutamientoprocesoDel.php?id=<?php echo $op->getId(); ?>" class="btn_black">

                            <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div>

                            Eliminar</a>
                    </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>








        </div>
    </div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>