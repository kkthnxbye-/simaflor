<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/empresasDAO.php';
include '../php/entities/empresas.php';

$dao = new empresasDAO();
$word = $_GET['word'];
$roll = $_GET['roll'];
$lista = new empresas();
$lista = $dao->getsbybuscar('Nombre','parte',$word);

$toPrint = "";

if($word == ""){
   exit;
}

if($roll == 'proveedor'){
   foreach($lista as $l){
      if($l->getEsProveedor() == 1){
      $toPrint.= "             <div class='finca_encontrada' id='".$l->getId()."' title='".$l->getNombre()."' onclick='placeId(this.id,1,this.title);'>      ";
      $toPrint.= "".ucfirst($l->getNombre())." - ".ucfirst($l->getNit())."";
      $toPrint.= "</div>";
      }
   }
}
else{
   foreach($lista as $l){
      if($l->getEsCliente() == 1){
      $toPrint.= "             <div class='finca_encontrada' id='".$l->getId()."' title='".$l->getNombre()."' onclick='placeId(this.id,2,this.title);'>      ";
      $toPrint.= "".ucfirst($l->getNombre())." - ".ucfirst($l->getNit())."";
      $toPrint.= "</div>";
      }
   }
}

echo $toPrint;