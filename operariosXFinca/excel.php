<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$operariosXFincaDAO = new operariosXFincaDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=operariosXFinca.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "operariosXFinca"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$operariosXFinca = $operariosXFincaDAO->getsbybuscar($_SESSION['finca'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$empresasDAO = new empresasDAO();
$operariosDAO = new operariosDAO();
?>
    <table>
          <tr>
            <td><b>ID<b></td>
            <td><b>Operario</b></td>
            <td><b>Finca</b></td>

          </tr>
        <?php
        foreach ($operariosXFinca as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
              <td>
                <?php echo $operariosDAO->getById($item->getIdOperario())->getNombre();?>
            </td>
            <td>
                <?php echo $empresasDAO->getById($item->getIdFinca())->getNombre();?>
            </td>

          </tr>
      <?php } ?>

      </table>
