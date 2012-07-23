<?php
session_start();
include '../php/dao/daoConnection.php';
include '../php/entities/remisiones.php';
include '../php/entities/detalleRemision.php';
include '../php/dao/remisionesDAO.php';


$id = $_GET['id'];
$IDVariedad = $_GET['variedad'];
$cantidad = $_GET['cantidad'];

$remisionesDAO = new remisionesDAO();
$detalle = new detalleRemision();

$detalle->setCantidad($cantidad);
$detalle->setIDVariedad($IDVariedad);
$detalle->setIDRemisionPM($id);

$remisionesDAO->saveDetalle($detalle);
