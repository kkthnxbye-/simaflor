<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */

session_start();
date_default_timezone_set("America/Bogota");

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

if($servicio == -10){
   $newServicio = 'NULL';
}else{
   $newServicio = $servicio;
}

if($ciclo == 0){
   $ciclo_ = 'NULL';
}else{
   $ciclo_ = $ciclo;
}


$pedidosDAO = new pedidosDAO();
$pedido = $pedidosDAO->getById($id);
$pedido->setFincacliente($id_cliente);
$pedido->setServicio($newServicio);
$pedido->setMaterialvegetal($material_vegetal);
$pedido->setFincaProduccion($id_proveedor);
$pedido->setCiclo($ciclo_);
$pedido->setFincaproveedor($id_proveedor);

$pedidosDAO->updateCliente($pedido);


if($_POST['ban'] != 1){
header("Location: ../../pedidosInternoPM/lista.php?ok");
exit;
}else{
header("Location: ../../pedidosClientePM/lista.php?ok");
exit;    
}
?>