<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$productosXFincaDAO = new productosXFincaDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=productosXFinca.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "productosXFinca"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$productosXFinca = $productosXFincaDAO->getsbybuscar($_SESSION['finca'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$empresasDAO = new empresasDAO();
$productosDAO = new productosDAO();
?>
    <table>
          <tr>
            <td><b>ID<b></td>
            <td><b>Producto</b></td>
            <td><b>Finca</b></td>

          </tr>
        <?php
        foreach ($productosXFinca as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
              <td>
                <?php echo $productosDAO->getById($item->getIdProducto())->getNombre();?>
            </td>
            <td>
                <?php echo $empresasDAO->getById($item->getIdFinca())->getNombre();?>
            </td>

          </tr>
      <?php } ?>

      </table>
