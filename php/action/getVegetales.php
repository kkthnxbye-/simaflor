<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/materialesVegetalesDAO.php';
include '../entities/materialesVegetales.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';
include '../entities/enrutamientoproceso.php';
include '../dao/enrutamientoprocesoDAO.php';

$enrudao = new enrutamientoprocesoDAO();


$mv_ = new materialesVegetales();
$mv = new materialesVegetalesDAO();
$options="<option selected value='0'>Seleccione</option>";

if($_POST['IDServicio'] == -10){
   $lista = $mv->gets();
   foreach ($lista as $l){
      $options.="<option value='".$l->getId()."'>".$l->getNombre()."</option>";
   }
   echo $options;
}else{
   $lista_ = new enrutamientoproceso;
   $lista_ = $enrudao->getsbyAll($_POST['IDFinca'], $_POST['IDProducto'], $_POST['IDServicio']);
//   echo '<pre>';
//   print_r($lista_);
//   echo '</pre>';
   foreach($lista_ as $l_){
      $materialV = $mv->getById($l_->getIdMaterialVegetal());
      $options.="<option value='".$materialV->getId()."'>".$materialV->getNombre()."</option>";
      
   }
   echo $options;
}



