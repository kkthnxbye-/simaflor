<?php session_start();

 include '../php/dao/daoConnection.php';

include '../php/dao/pedidosDAO.php';
include '../php/dao/empresasDAO.php';
include '../php/dao/materialesVegetalesDAO.php';
include '../php/dao/productosDAO.php';
include '../php/dao/serviciosDAO.php';
include '../php/dao/estadospedidoDAO.php';

include '../php/entities/pedidos.php';
include '../php/entities/empresas.php';
include '../php/entities/materialesVegetales.php';
include '../php/entities/productos.php';
include '../php/entities/servicios.php';
include '../php/entities/estadospedido.php';


$pedidosDAO = new pedidosDAO();
$eDAO = new empresasDAO();
$mDAO = new materialesVegetalesDAO();
$pDAO = new productosDAO();
$sDAO = new serviciosDAO();
$esDAO = new estadospedidoDAO();
//
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Pedidos Interno.xls");
header("Pragma: no-cache");
//header("Expires: 0");
//echo $_SESSION['id__']."<br>";
if(isset($_SESSION['fincaproduccion'])){
   $pedidos = $pedidosDAO->getsbybuscar("IDFincaProduccion",'',$_SESSION['fincaproduccion'],'');
}else{

$pedidos = $pedidosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor'],'');
}

//echo '<pre>';
//print_r($pedidos);
//echo '</pre>';


?>
    <table>
          <tr>

            <td><b>Id</b></td>
            <td><b>Finca proveedor</b></td>
            <td><b>Finca cliente</b></td>
            <td><b>Finca producci&oacute;n</b></td>
            <td><b>Material Vegetal</b></td>
            <td><b>Producto</b></td>
            <td><b>Estado</b></td>
            <td><b>Servicio</b></td>
            

          </tr>
        <?php
        foreach ($pedidos as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId(); ?></b></td>
            <td><?php echo $eDAO->getById($item->getFincaproveedor())->getNombre(); ?></td>
            <td><?php echo $eDAO->getById($item->getFincacliente())->getNombre(); ?></td>
            <td><?php echo $eDAO->getById($item->getFincaProduccion())->getNombre(); ?></td>
            <td><?php echo $mDAO->getById($item->getMaterialvegetal())->getNombre(); ?></td>
            <td><?php echo $pDAO->getById($item->getProducto())->getNombre(); ?></td>
            <td><?php echo $esDAO->getById($item->getEstadopedido())->getNombre(); ?></td>
            <td>
               <?php 
                  if($item->getServicio() != ''){
                     echo $sDAO->getById($item->getServicio())->getNombre();
                  }else{
                     echo 'Sin Servicio';
                  }
               ?>
            </td>
          </tr>
      <?php } ?>

      </table>
