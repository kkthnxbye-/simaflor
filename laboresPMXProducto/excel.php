<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$laboresPMXProductoDAO = new laboresPMXProductoDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=laboresPMXProducto.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "laboresPMXProducto"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$laboresPMXProducto = $laboresPMXProductoDAO->getsbybuscar($_SESSION['producto'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$productosDAO= new productosDAO();
$laboresPMDAO = new laboresPMDAO();
$metricasDAO = new metricasDAO();


?>
    <table>
          <tr>
<td><b>ID<b></td>
            <td><b>Producto</b></td>
            <td><b>LaborPM</b></td>
            <td><b>Cantidad</b></td>
            <td><b>Tiempo Cumplimiento</b></td>
            <td><b>Unidad</b></td>
            <td><b>Observaciones</b></td>

          </tr>
        <?php
        foreach ($laboresPMXProducto as $item) {
        $metrica = $metricasDAO->getById($item->getUnidad());
        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
            <td>
                <?php echo $productosDAO->getById($item->getIdProducto())->getNombre();?>
            </td>
            <td>
                <?php echo $laboresPMDAO->getById($item->getIdLaborPM())->getNombre();?>
            </td>
            <td>
                <?php echo $item->getCantidad();?>
            </td>
            <td>
                <?php echo $item->getTiempoCumplimiento();?>
            </td>
            <td>
                <?php echo $metrica->getNombre();?>
            </td>
            <td>
                <?php echo $item->getObservaciones();?>
            </td>

          </tr>
      <?php } ?>

      </table>
