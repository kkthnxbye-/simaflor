<?php
session_start();

include '../php/entities/sessionItem.php';

foreach ($_POST as $key => $value) {
    $$key = $value;
}

if(filter_var($cantidad,FILTER_VALIDATE_INT) === FALSE){
   echo 'failInt';
   exit;
}

if(empty($_SESSION['itemcrear'])){
   $listaSiembra = array();
}else{
   $listaSiembra = unserialize($_SESSION['itemcrear']);
}

$new_entry = count($listaSiembra);

$obj = new SessionItem();

$obj->setIdareaxbloque($idareaxbloque);
$obj->setCantidad($cantidad);
$obj->setid_operario($idOperario);
$obj->setTipo($tipo);

$listaSiembra[$new_entry] = $obj;
$_SESSION['itemcrear'] = serialize($listaSiembra);