<?php session_start();


include '../dao/daoConnection.php';
include '../dao/pedidosDAO.php';
include '../entities/pedidos.php';

include '../entities/detallepedido.php';
include '../dao/detallepedidoDAO.php';

include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$id_pedido = $_GET['pedido_id'];
$id_estado = $_GET['estado_id'];

$detallesDAO = new detallepedidoDAO();

if(isset($_GET['aprobadoParcial'])){
   $new_estado = 4;
   
   $countah = $_GET['countah'];
   $idPedido = $_GET['IDpedido'];
   
   $list_detalle = $detallesDAO->getsbybuscar('IDpedido','exacta',$idPedido);
   
   foreach($list_detalle as $item):
      if(isset($_GET['c'.$item->getId()])):
         $new_valor = $_GET['new_value'.$item->getId()];
         $aproof = 1;
         $idDetalle = $item->getId();
         
         $detallesDAO->update2($new_valor, $aproof, $idDetalle);
         
      endif;
   endforeach;
   
}else if(isset($_REQUEST['aprobado'])){
   $new_estado = 4;
}else if(isset($_REQUEST['rechazado'])){
   $new_estado = 7;
}else{
   $new_estado = (int)$id_estado + 1;
}

//$fecha = date('Y-m-d');
//if($new_estado == 8){
//   $to      = 'andres.ramirez@imaginamos.com.co,brayan.acebo@imaginamos.co';
//   $subject = 'Pedido No '.$id_pedido.' Recibido';
//   $message = 'El pedido No '.$id_pedido.' se ha marcado como recibido.
//   <br><br>
//   Fecha: '.$fecha.'<br><br>
//   La informacion suministrada puede ser verificada en
//   <a href="http://simaflor.imaginamos.co">Simaflor 2.0</a>
//   ';
//   $additional_headers = 'From: andres.ramirez@imaginamos.com.co' . "\r\n" .
//    "\r\n";
//   mail($to, $subject, $message, $additional_headers);
//}

$pedidosDAO = new pedidosDAO();
$pedidosDAO->updateEstado($new_estado, $id_pedido);

if($_GET['ban'] != 1){
header("Location: ../../pedidosInternoPM/lista.php?ok");
exit();
}else{
header("Location: ../../pedidosClientePM/lista.php?ok");
exit();    
}
?>
