<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$estadospedidoDAO = new estadospedidoDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Estados de pedidos.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "estadospedido"){
	$_SESSION['campo'] = "nombre";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

$estadospedido = $estadospedidoDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
          <tr>
            <td><b>ID<b></td>
            <td><b>Nombre</b></td>
            
          </tr>
        <?php
        foreach ($estadospedido as $item) {
        
        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
            <td><?php echo $item->getNombre()?></td>
          </tr>
      <?php } ?>

      </table>
