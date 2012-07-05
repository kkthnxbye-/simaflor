<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/pedidosDAO.php';
include '../dao/detallepedidoDAO.php';
include '../entities/detallepedido.php';
include '../entities/pedidos.php';
include '../entities/usuarios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$usuario = unserialize($_SESSION['user']);

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

//echo $id_cliente." _ ".$servicio." _ ".$material_vegetal." _ ".$producto." _ ".$fincaproduccion;
//
//echo "<br>";
//exit();

$pedidosDAO = new pedidosDAO();
$detallepedidoDAO = new detallepedidoDAO();
$pedido = new pedidos();
//datos
if($servicio == -10){
   $newServicio = 'NULL';
}else{
   $newServicio = $servicio;
}

$pedido->setFincacliente($id_cliente);
$pedido->setServicio($newServicio);
$pedido->setMaterialvegetal($material_vegetal);
$pedido->setProducto($producto);
$pedido->setUsuario($usuario->getId());
$pedido->setFincaProduccion($fincaproduccion);
if($ciclo == 0){
   $ciclo_ = 'NULL';
}else{
   $ciclo_ = $ciclo;
}
$pedido->setCiclo($ciclo_);
$pedido->setEntregamaterial(0);
$pedido->setFecha(date("Y-m-d"));
$pedido->setFechaUltimoEstado(date("Y-m-d"));
$pedido->setEstadopedido(1);
$pedido->setFincaproveedor($id_proveedor);
//

$pedidosDAO->save($pedido);
//echo $ciclo_."__".$newServicio;
//exit;

$id_pedido = $pedidosDAO->getLastId();
if (empty($_SESSION['lista_detalles'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['lista_detalles']);
}
foreach ($listadetalles as $li_dest){
	$li_dest->setPedido($id_pedido);
	$detallepedidoDAO->save($li_dest);
}

if($_POST['ban'] != 1){
header("Location: ../../pedidosInternoPM/lista.php?ok");
exit;
}else{
header("Location: ../../pedidosClientePM/lista.php?ok");
exit;    
}
?>