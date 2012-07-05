<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$gradosDAO = new gradosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=grados.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "grados"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$grados = $gradosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$procesosDAO= new procesosDAO();
$productosDAO = new productosDAO();
?>
    <table>
          <tr>
<td><b>ID<b></td>
            <td><b>Proceso</b></td>
            <td><b>Producto</b></td>
            <td><b>Codigo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Descripcion</b></td>

          </tr>
        <?php
        foreach ($grados as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
            <td>
                <?php echo $procesosDAO->getById($item->getIdProceso())->getNombre();?>
            </td>
            <td>
                <?php echo $productosDAO->getById($item->getIdProducto())->getNombre();?>
            </td>
             <td>
                <?php echo $item->getCodigo();?>
            </td>
             <td>
                <?php echo $item->getNombre();?>
            </td>
            <td>
                <?php echo $item->getDescripcion();?>
            </td>

          </tr>
      <?php } ?>

      </table>
