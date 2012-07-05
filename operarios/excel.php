<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$operariosDAO = new operariosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=operarios.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "operarios"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$operarios = $operariosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$grupo = new gruposOperariosDAO();
?>
    <table>
          <tr>
            <td><b>ID<b></td>
            <td><b>Grupo operario</b></td>
            <td><b>C&oacute;digo</b></td>
            <td><b>Nombre</b></td>
            <td><b>Foto</b></td>

          </tr>
        <?php
        foreach ($operarios as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
              <td>
                <?php echo $grupo->getById($item->getIdGrupoOperarios())->getNombre();?>
            </td>
            <td>
                <?php echo $item->getCodigo();?>
            </td>
            <td>
                <?php echo $item->getNombre();?>
            </td>
            <td>
                <?php echo $item->getFoto();?>
            </td>

          </tr>
      <?php } ?>

      </table>
