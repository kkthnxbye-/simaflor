<?php
session_start();
include '../php/dao/daoConnection.php';
include '../php/dao/inventariosPMDAO.php';
include '../php/entities/inventariosPM.php';
include '../php/entities/sessionsalida.php';

foreach($_POST as $key => $value){
   $$key = $value;
}

$lista = new sessionsalida();

if(empty($_SESSION['entradatmp'])){
   $lista = array ();
}else{
   $lista = unserialize($_SESSION['entradatmp']);
}

$verify = 0;

foreach ($lista as $l) {
   if($l->getPieza() == $value){
      $verify = 1;
   }
}

if($verify != 0){
   echo '2';
   exit;
}

$dao = new InventariosPMDAO();
$d = $dao->getById($value);
//echo '<pre>';
//print_r($d);
//echo '</pre>';
//exit;
$data = $d->getSaldo();

echo $data;