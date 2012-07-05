<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$laboresPMXVariedadDAO = new laboresPMXVariedadDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Labores por variedad.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "laboresPMXVariedad"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$laboresPMXVariedad = $laboresPMXVariedadDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$VariedadesDAO= new VariedadesDAO();
$laboresPMDAO = new laboresPMDAO();


?>
    <table>
          <tr>
<td><b>ID<b></td>
            <td><b>Variedad</b></td>
            <td><b>LaborPM</b></td>
            <td><b>Cantidad</b></td>
            <td><b>Tiempo Cumplimiento</b></td>
            <td><b>Unidad</b></td>
            <td><b>Observaciones</b></td>

          </tr>
        <?php
        foreach ($laboresPMXVariedad as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
            <td>
                <?php echo $VariedadesDAO->getById($item->getIdVariedad())->getNombre();?>
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
                <?php echo $item->getUnidad();?>
            </td>
            <td>
                <?php echo $item->getObservaciones();?>
            </td>

          </tr>
      <?php } ?>

      </table>
