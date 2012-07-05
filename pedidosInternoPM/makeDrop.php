<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/empresasDAO.php';
include '../php/dao/materialesVegetalesDAO.php';
include '../php/dao/productosDAO.php';
include '../php/dao/serviciosDAO.php';
include '../php/dao/estadospedidoDAO.php';

include '../php/entities/empresas.php';
include '../php/entities/materialesVegetales.php';
include '../php/entities/productos.php';
include '../php/entities/servicios.php';
include '../php/entities/estadospedido.php';


$eDAO = new empresasDAO();
$mDAO = new materialesVegetalesDAO();
$pDAO = new productosDAO();
$sDAO = new serviciosDAO();
$esDAO = new estadospedidoDAO();

$options = "<option value='0'>Seleccione</option>";

switch ($_POST['value_']){
   case IDFincaProveedor:
      $x = new empresas();
      $x = $eDAO->gets();
      foreach ($x as $y){
         if($y->getEsProveedor() == 1){
         $options.="<option value='".$y->getId()."'>".$y->getNombre()."</option>";
         }
      }
      break;
   case IDFincaCliente:
      $x = new empresas();
      $x = $eDAO->gets();
      foreach ($x as $y){
         $options.="<option value='".$y->getId()."'>".$y->getNombre()."</option>";
      }
      break;
   case IDMaterialVegetal:
      $x = new materialesVegetales();
      $x = $mDAO->gets();
      foreach ($x as $y){
         $options.="<option value='".$y->getId()."'>".$y->getNombre()."</option>";
      }
      break;
   case IDProducto:
      $x = new productos();
      $x = $pDAO->gets();
      foreach ($x as $y){
         $options.="<option value='".$y->getId()."'>".$y->getNombre()."</option>";
      }
      break;
   case IDEstadoPedidoPM:
      $x = new estadospedido();
      $x = $esDAO->gets();
      foreach ($x as $y){
         $options.="<option value='".$y->getId()."'>".$y->getNombre()."</option>";
      }
      break;
   case IDServicio:
      $x = new servicios();
      $x = $sDAO->gets();
      foreach ($x as $y){
         $options.="<option value='".$y->getId()."'>".$y->getNombre()."</option>";
      }
      break;
   default :
      break;
}
echo $options;