<?php
include '../php/dao/daoConnection.php';

include '../php/dao/VariedadesDAO.php';
include '../php/entities/Variedades.php';

foreach($_POST as $key => $value){
   $$key = $value;
}

$vDAO = new VariedadesDAO();
$v = new Variedades();
$v = $vDAO->gets('IDProducto','',$id);

$options = "";

foreach($v as $vs){
   $options.="<option value='".$vs->getId()."'>".$vs->getNombre()."</option>";
}

echo $options;