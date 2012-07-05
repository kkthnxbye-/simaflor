<?php
include '../dao/detallepedidoDAO.php';
include '../entities/detallepedido.php';

include '../dao/pedidosDAO.php';
include '../entities/pedidos.php';

include '../dao/daoConnection.php';

$pedidosDAO = new pedidosDAO();
$detallepedidoDAO = new detallepedidoDAO();

$detalles = new detallepedido();

$IDestado = $_GET['IDestado'];
$IDpedido = $_GET['IDpedido'];

//Get the object to work with
//$pedido = $pedidosDAO->getById($IDpedido);

//Get the details
$detalles = $detallepedidoDAO->getsbybuscar('IDPedido','exacta',$IDpedido);

//echo '<pre>';
//print_r($detalles);
//echo '</pre>';


if(isset($_GET['aprobadoParcial'])){
   //it comes from the form
   foreach($detalles as $detalle){
      if(isset($_GET['check_'.$detalle->getId()])){
         $detallepedidoDAO->update2($_GET['new_value'.$detalle->getId()],1,$detalle->getId());
      }else{
         $detallepedidoDAO->update2(0,1,$detalle->getId());
      }
   }
   $pedidosDAO->updateEstado(4,$IDpedido);
   header('Location: ../../pedidosInternoPM/lista.php?ok');
   exit;
}else{
   //it does not come from the form
   foreach($detalles as $detalle){
      $detallepedidoDAO->update2($detalle->getCantidad(),1,$detalle->getId()); 
   }
   $pedidosDAO->updateEstado(4,$IDpedido);
   header('Location: ../../pedidosInternoPM/lista.php?ok');
   exit;
}
