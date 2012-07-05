<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$productosDAO = new productosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Labores por producto.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "productos"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}


//echo $_SESSION['campo'].",".$_SESSION['valor'].",".$_SESSION['tipo_b'];
$productos = $productosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
//print_r($productos);
$productosDAO= new productosDAO();


?>
    <table>
         <tr>
            <td><b>ID</b></td>
            <td><b>CODIGO</b></td>
            <td><b>NOMBRE</b></td>
         </tr>
        <?php
        foreach ($productos as $item) {

        ?>
          <tr>
            <td>
               <?php echo $item->getId();?>
            </td>
            <td>
                <?php echo $item->getCodigo(); ?>
            </td>
            <td>
                <?php echo $item->getNombre();?>
            </td>
          </tr>
      <?php } ?>

      </table>
