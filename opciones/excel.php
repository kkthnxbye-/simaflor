<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$opcionesDAO = new opcionesDAO();
$modulosDAO= new modulosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Opciones.xls");
header("Pragma: no-cache");
header("Expires: 0");


$opciones = $opcionesDAO->getsbybuscar($_SESSION['modulo'], $_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);

?>
    <table>
          <tr>
<td><b>ID<b></td>
            <td><b>Modulo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Url Menu</b></td>
            <td><b>Ruta archivo de ayuda</b></td>

          </tr>
        <?php
        foreach ($opciones as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
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
