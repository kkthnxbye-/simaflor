<?php
session_start();

function add_date($givendate,$day,$mth=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y/m/d', mktime(date('h',$cd),
      date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
      date('d',$cd)+$day, date('Y',$cd)+$yr));
      return $newdate;
 }

include '../php/dao/daoConnection.php';

include '../php/dao/itemsPMDAO.php';
include '../php/entities/itemsPM.php';

include '../php/dao/areasxitemDAO.php';
include '../php/entities/areasxitem.php';

include '../php/dao/configuracionxvariedadDAO.php';
include '../php/entities/configuracionxvariedad.php';

include '../php/entities/usuarios.php';

include '../php/entities/sessionItem.php';

foreach($_POST as $key => $value){
   $$key = $value;
}

$listaSiembra = new SessionItem();

$usuario = new usuarios();
$usuario = unserialize($_SESSION['user']);

$daoI = new ItemsPMDAO();
$daoAXI = new AreasxitemDAO();

$daoCXV = new configuracionxvariedadDAO();

$valor = $daoCXV->getsDiaErradicacion($variedad);

//echo '<pre>';
//print_r($valor);
//echo '</pre>';
//exit;

$fechaArranque = add_date($fechaSiembra, $valor);


echo $valor." => ".$fechaArranque;
exit;



//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//exit;
$response = '';



if($daoI->getByAlias($alias) === TRUE){
   $response.='doubleAlias####';
}

$obj_ = new ItemsPM();
$obj_->setIdFinca($_SESSION['fincaproduccion']);
$obj_->setIdProveedor($proveedor_);
$obj_->setIdVegetal($vegetal);
$obj_->setIdVariedad($variedad);
$obj_->setIdBreeder($breeder);
$obj_->setIdsInventarioPM("''");
$obj_->setAlias("'".strtoupper($alias)."'");
$obj_->setConsecutivo("''");
$obj_->setCodigoSeguimiento("NULL");
$obj_->setFechaSiembra($fechaSiembra);
$obj_->setFechaArranque($fechaArranque);
$obj_->setFechaRegistro(date('Y-m-d'));
$obj_->setObservaciones("''");
$obj_->setIdEstadoItem(1);
$obj_->setIdUsuario($usuario->getId());
$obj_->setIdTemporada($temporada);
$obj_->setIdCiclo($ciclo);
$obj_->setIdCliente($cliente_);

$daoI->save($obj_);
echo 'omg';
exit;
$last_id = $daoI->getLastId();

if (empty($_SESSION['itemcrear'])) {
   $listaSiembra = array();
} else {
   $listaSiembra = unserialize($_SESSION['itemcrear']);
}

foreach($listaSiembra as $l){
   $objAreasXItem = new Areasxitem();
   $objAreasXItem->setItemPM($last_id);
   $objAreasXItem->setIdAreaPMXBloquePM($l->getIdareaxbloque());
   $objAreasXItem->setIdOperario($l->getid_operario());
   $objAreasXItem->setTipoOperario($l->getTipo());
   $objAreasXItem->setCantidad($l->getCantidad());
   
   $daoAXI->save($objAreasXItem);
}