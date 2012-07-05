<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$opcionesDAO = new opcionesDAO();
$modulosDAO= new modulosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=opciones.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "opciones"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$opciones = $opcionesDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>
    <table>
          <tr>

            <td><b>Modulo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Url Menu</b></td>
            <td><b>Ruta archivo de ayuda</b></td>

          </tr>
        <?php
        foreach ($opciones as $item) {

        ?>
          <tr>
            <td>
                <?php echo $modulosDAO->getById($item->getIdModulo())->getNombre();?>
            </td>
            <td>
                <?php echo $item->getNombre();?>
            </td>
             <td>
                <?php echo $item->getUrlMenu();?>
            </td>
             <td>
                <?php echo $item->getRutaArchivoAyuda();?>
            </td>

          </tr>
      <?php } ?>

      </table>
