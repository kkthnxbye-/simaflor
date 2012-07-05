<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$gruposUsuarioDAO = new gruposUsuarioDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=gruposUsuario.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "gruposUsuario"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$gruposUsuario = $gruposUsuarioDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>
    <table>
          <tr>
            <td><b>ID<b></td>
            <td><b>Nombre</b></td>
            <td><b>Descripci&oacute;n</b></td>

          </tr>
        <?php
        foreach ($gruposUsuario as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
            <td>
                <?php echo $item->getNombre();?>
            </td>
            <td>
                <?php echo $item->getDescripcion();?>
            </td>

          </tr>
      <?php } ?>

      </table>
