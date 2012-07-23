<?php session_start(); ?>
<?php 
include '../php/dao/daoConnection.php';
include '../php/entities/remisiones.php';
include '../php/entities/detalleRemision.php';
include '../php/dao/remisionesDAO.php';

$id = $_GET['id'];

$dao = new remisionesDAO();
$dao->deleteDetalle($id);