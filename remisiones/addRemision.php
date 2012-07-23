<?php
session_start();

include '../php/dao/daoConnection.php';

include '../php/entities/remisiones.php';
include '../php/entities/detalleRemision.php';
include '../php/entities/usuarios.php';
include '../php/dao/pedidosDAO.php';

include '../php/dao/remisionesDAO.php';

$dao = new remisionesDAO();

$daop = new pedidosDAO();

$usuario = new usuarios();
$usuario = unserialize($_SESSION['user']);
$IDPedidoPM = $_POST['IDPedido'];
$FechaRemision = $_POST['fecharemision'];
$NoRemision = $_POST['noremision'];

/*******************************/
$remision = new remisiones();
$remision->setIDPedidoPM($IDPedidoPM);
$remision->setIDUsuario($usuario->getId());
$remision->setFechaRemision($FechaRemision);
$remision->setFechaRegistro(date('Y/m/d'));
$remision->setNoRemision($NoRemision);

$dao->save($remision);
$daop->updateEstado(5, $IDPedidoPM);

/*******************************/

/*******************************/
$lastID_ = $dao->getLastId();
/*******************************/

/*******************************/
if (empty($_SESSION['detalle_remision'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['detalle_remision']);
}

foreach($listadetalles as $l){
$detalleRemision = new detalleRemision();
$detalleRemision->setIDRemisionPM($lastID_);
$detalleRemision->setIDVariedad($l->getIDVariedad());
$detalleRemision->setCantidad($l->getCantidad());
$dao->saveDetalle($detalleRemision);
}
//header('location:remisionesxpedido.php');
//exit;
/*******************************/


