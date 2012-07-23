<?php session_start(); ?>
<?php 
include '../php/dao/daoConnection.php';
include '../php/entities/remisiones.php';
include '../php/entities/detalleRemision.php';
include '../php/dao/remisionesDAO.php';

$dao = new remisionesDAO();

$id = $_GET['id'];
$FechaRemision = $_GET['fecharemision'];
$NoRemision = $_GET['noremision'];

$remision = new remisiones();
$remision->setId($id);
$remision->setFechaRemision($FechaRemision);
$remision->setNoRemision($NoRemision);
$dao->update($remision);
