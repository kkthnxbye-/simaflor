<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/inventariosPMDAO.php';
include '../php/entities/inventariosPM.php';

include '../php/entities/sessionsalida.php';

include '../php/entities/Variedades.php';
include '../php/dao/VariedadesDAO.php';

foreach ($_POST as $key => $value) {
    $$key = $value;
}

if(filter_var($cantidad,FILTER_VALIDATE_INT) === FALSE){
   echo 'fail';
   exit;
}

if(empty($_SESSION['entradatmp'])){
   $lista = array ();
}else{
   $lista = unserialize($_SESSION['entradatmp']);
}

$dao = new InventariosPMDAO();
$daoV = new VariedadesDAO();

$getInventario = $dao->getById($idInventario);

if(empty($getInventario)){
   echo "El id ".$idInventario." no se encuentra registrado en la base de datos";
   exit;
}

$producto = $daoV->getById($getInventario->getIdVariedad())->getIdProducto();

$new_entry = count($lista);

$data = new sessionsalida();
$data->setPieza($getInventario->getId());
$data->setVegetal($getInventario->getIdMaterialVegetal());
$data->setProducto($producto);
$data->setVariedad($getInventario->getIdVariedad());
$data->setFecha($getInventario->getFechaVencimiento());
$data->setCantidad($cantidad);

$lista[$new_entry] = $data;
$_SESSION['entradatmp'] = serialize($lista);