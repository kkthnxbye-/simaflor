<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$productosDAO = new productosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=productos.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "productos"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}


$familiasDAO= new familiasDAO();
$productos = $productosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>
    <table>
          <tr>
<td><b>ID<b></td>
            <td><b>C&oacute;digo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Familia</b></td>
            <td><b>Descripci&oacute;n</b></td>

          </tr>
        <?php
        foreach ($productos as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
            <td>
                <?php echo $item->getCodigo();?>
            </td>
            <td>
                <?php echo $item->getNombre();?>
            </td>
            <td>
                <?php echo $familiasDAO->getById($item->getIdFamilia())->getNombre();?>
            </td>
            <td>
                <?php echo $item->getDescripcion();?>
            </td>

          </tr>
      <?php } ?>

      </table>
