<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$productosXServicioXFincaDAO = new productosXServicioXFincaDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=productosXServicioXFinca.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "productosXServicioXFinca"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$productosXServicioXFinca = $productosXServicioXFincaDAO->getsbybuscar($_SESSION['finca'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$empresasDAO = new empresasDAO();
$productosDAO = new productosDAO();
$serviciosDAO = new serviciosDAO();
$materialesVegetalesDAO= new materialesVegetalesDAO();
?>
    <table>
          <tr>
            <td><b>ID<b></td>
            <td><b>Finca</b></td>
            <td><b>Producto</b></td>
            <td><b>Servicio</b></td>
            <td><b>Material vegetal</b></td>


          </tr>
        <?php
        foreach ($productosXServicioXFinca as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>

              <td>
                <?php echo $empresasDAO->getById($item->getIdFinca())->getNombre();?>
            </td>
              <td>
                <?php echo $productosDAO->getById($item->getIdProducto())->getNombre();?>
            </td>
            <td>
                <?php echo $serviciosDAO->getById($item->getIdServicio())->getNombre();?>
            </td>
            <td>
                <?php echo $materialesVegetalesDAO->getById($item->getIdMaterialVegetal())->getNombre();?>
            </td>


          </tr>
      <?php } ?>

      </table>
