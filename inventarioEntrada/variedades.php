<?php

include '../php/dao/daoConnection.php';
include '../php/dao/VariedadesDAO.php';
include '../php/entities/Variedades.php';

$IDProducto = $_POST['IDProducto'];

$variedadesDAO = new VariedadesDAO();
$variedades = new Variedades();
$variedades = $variedadesDAO->gets('IDProducto','', $IDProducto);
$options = '';

foreach($variedades as $v){
   $options.='<option value="'.$v->getId().'" >'.$v->getNombre().'</option>';
   }

echo $options;