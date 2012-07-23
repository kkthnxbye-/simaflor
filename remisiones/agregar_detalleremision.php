<?php
session_start();

include '../php/dao/daoConnection.php';
include '../php/dao/remisionesDAO.php';
include '../php/entities/detalleRemision.php';
include '../php/functions/text2HTML.php';
include '../php/functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if(empty($_SESSION['detalle_remision'])){
   $listadetalles = array();
}else{
   $listadetalles = unserialize($_SESSION['detalle_remision']);
}

$new_pos = count($listadetalles);
$detalle = new detalleRemision();
$detalle->setId(0);
$detalle->setIDRemisionPM(0);
$detalle->setCantidad($cantidad);
$detalle->setIDVariedad($variedad);

$listadetalles[$new_pos] = $detalle;
$_SESSION['detalle_remision'] = serialize($listadetalles);