<?php
session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Enrutamiento de procesos.xls");
header("Pragma: no-cache");
header("Expires: 0");

$enrutamientoprocesoDAO = new enrutamientoprocesoDAO();
$empresasDAO = new empresasDAO();
$productosDAO = new productosDAO();
$procesosDAO = new procesosDAO();
$serviciosDAO = new serviciosDAO();
$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$enrutamientoprocesos = new enrutamientoproceso();
$enrutamientoprocesos = $enrutamientoprocesoDAO->gets($_SESSION['campo'], $_SESSION['valor']);
?>
<table>
    <tr>
        <th>ID</th>   
        <th>Finca</th>   
        <th>Producto</th>
        <th>Servicio</th>
        <th>Material Vegetal</th>
        <th>Proceso Origen</th>
        <th>Proceso Destino</th>
        <th>Tipo de Movimiento</th>
        <th>Genera Etiqueta Produccion</th>
        
    </tr>
    <?php
    foreach ($enrutamientoprocesos as $op) {
        ?>
        <tr>
            <td><?php echo $op->getId(); ?></td><br />
        <td><?php echo $empresasDAO->getById($op->getIdFinca())->getNombre() ?></td>
        <td><?php echo $productosDAO->getById($op->getIdProducto())->getNombre() ?></td>
        <td><?php echo $serviciosDAO->getById($op->getIdServicio())->getNombre() ?></td>
        <td><?php echo $materialesVegetalesDAO->getById($op->getIdMaterialVegetal())->getNombre() ?></td>
        <td><?php echo $procesosDAO->getById($op->getIdProcesoOrigen())->getNombre(); ?></td>
        <td><?php echo $procesosDAO->getById($op->getIdProcesoDestino())->getNombre(); ?></td>
        <td><?php echo $TiposMovimientoInventarioDAO->getById($op->getIdTipoMovimientoInventario())->getNombre(); ?></td>
        <td><?php if($op->getGeneraEtiquetaProduccion() == 1 ){echo "Si";}else{echo "No";} ?></td>
    </tr>
<?php } ?>

</table>
