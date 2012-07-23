<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/enrutamientoprocesoDAO.php';
include '../php/entities/enrutamientoproceso.php';

include '../php/dao/materialesVegetalesDAO.php';
include '../php/entities/materialesVegetales.php';

$finca = $_SESSION['fincaproduccion'];
$producto = $_POST['producto'];

$mvDAO = new materialesVegetalesDAO();

$enDAO = new enrutamientoprocesoDAO();

$materiaList = $enDAO->getsbyAll($finca,$producto,'');

$options = "";

foreach($materiaList as $l){
   $vegetal = $mvDAO->getById($l->getIdMaterialVegetal());
   $options.="<option value='".$vegetal->getId()."'>".$vegetal->getNombre()."</option>";
}
echo $options;