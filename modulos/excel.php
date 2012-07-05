<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$modulosDAO = new modulosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=modulos.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "modulos"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$modulos = $modulosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>
    <table>
          <tr>

            <td><b>ID</b></td>
            <td><b>Nombre</b></td>

          </tr>
        <?php
        foreach ($modulos as $item) {

        ?>
          <tr>
            <td>
                <?php echo $item->getId();?>
            </td>
            <td>
                <?php echo $item->getNombre();?>
            </td>

          </tr>
      <?php } ?>

      </table>
