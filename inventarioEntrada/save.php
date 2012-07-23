<?php

session_start();

include '../php/dao/daoConnection.php';

include '../php/entities/usuarios.php';

include '../php/dao/applicationDAO.php';
include '../php/entities/application.php';

include '../php/dao/configuracionxvariedadDAO.php';
include '../php/entities/configuracionxvariedad.php';

include '../php/dao/enrutamientoprocesoDAO.php';
include '../php/entities/enrutamientoproceso.php';

include '../php/dao/TiposMovimientoInventarioDAO.php';
include '../php/entities/TiposMovimientoInventario.php';

include '../php/dao/documentoInventarioPMDAO.php';
include '../php/entities/documentoInventarioPM.php';

include '../php/dao/inventariosPMDAO.php';
include '../php/entities/inventariosPM.php';

include '../php/dao/movimientosInventarioDAO.php';
include '../php/entities/movimientosInventarioPM.php';



foreach ($_POST as $key => $value) {
    $$key = $value;
}


$successful_var = 0;

if(filter_var($nounidades, FILTER_VALIDATE_INT) === false){
   echo $successful_var;
   exit;
}

if(filter_var($cantidadxunidad, FILTER_VALIDATE_INT) === false){
   echo $successful_var;
   exit;
}
//echo $fincaproduccion;
//exit;
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

/* Functions  */

function add_date($givendate,$day,$mth=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y/m/d', mktime(date('h',$cd),
      date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
      date('d',$cd)+$day, date('Y',$cd)+$yr));
      return $newdate;
 }

/* Obtengo Id del usuario Actual */
$usuario = new usuarios();
$usuario = unserialize($_SESSION['user']);
/* DAO's */
$confxvarie = new configuracionxvariedadDAO();
$documentoi = new documentoInventarioPMDAO();
$inventario = new InventariosPMDAO();
$movimiento = new MovimientosInventarioDAO();

/* Global Values to get.*/
/* :::::::::::::::::::: */

/* instances */
$objDocumentosInventarioPM = new DocumentoInventarioPM();
$objInventariosPM = new inventariosPM();
$objMovimientoInventarioPM = new movimientosInventarioPM();

/* Consecutivo */
$consecutivo = $documentoi->get('IDFinca',$fincaproduccion,'MAX','consecutivo');
$consecutivo++;

/* Insert in DocumentosInventarioPM */
$objDocumentosInventarioPM->setIdFinca($fincaproduccion);
$objDocumentosInventarioPM->setIdTipoMovimientoInventarioPM($tipoentrada);
$objDocumentosInventarioPM->setConsecutivo($consecutivo);
$objDocumentosInventarioPM->setFecha(date('Y-m-d'));
if($documentoi->save($objDocumentosInventarioPM) == 1){
   $successful_var = 1;
};

/* Gettin last id from documentosInventario */
$document_lastid = $documentoi->getLastId();

/* Executing the add method to get the new date */
$valor = $confxvarie->getsDiaValor($variedad)->getValor();
if($valor == "" || $valor == NULL){
   $valor = 0;
}

$fechaVencimiento = add_date($fecha,$valor);

//echo $document_lastid."  ".$valor."  ".$nounidades."  ".$fechaVencimiento;
//exit;

for($i = 0; $i < $nounidades; $i++){
   /* insert into Inventarios */
   $objInventariosPM->setNoSegimiento('NULL');
   $objInventariosPM->setIdFincaProduccion($fincaproduccion);
   $objInventariosPM->setIdFincaProveedor($proveedor);
   $objInventariosPM->setIdMaterialVegetal($vegetal);
   $objInventariosPM->setIdVariedad($variedad);
   $objInventariosPM->setIdTipoUnidadPM($unidad);
   $objInventariosPM->setIdCiclo($ciclo);
   $objInventariosPM->setAliasItem('NULL');
   $objInventariosPM->setFechaIngreso($fecha);
   $objInventariosPM->setFechaVencimiento($fechaVencimiento);
   $objInventariosPM->setIdGrado($grado);
   $objInventariosPM->setSaldo($cantidadxunidad);
   $objInventariosPM->setIdCliente($cliente);
   if($inventario->save($objInventariosPM) == 1){
      $successful_var = 1;
   };
   
   /*Getting the last id from the inventory table*/
   $inventario_last_id = $inventario->getLastId();
   
   /* Insert into movimientoInventarios */
   $objMovimientoInventarioPM->setIdInventarioPM($inventario_last_id);
   $objMovimientoInventarioPM->setIdTipoMovimientoInventarioPM($tipoentrada);
   $objMovimientoInventarioPM->setIdCliente('NULL');
   $objMovimientoInventarioPM->setCantidad($cantidadxunidad);
   $objMovimientoInventarioPM->setFechaRegistro(date('Y-m-d'));
   $objMovimientoInventarioPM->setIdUsuario($usuario->getId());
   $objMovimientoInventarioPM->setIdDocumentoInventarioPM($document_lastid);
   $objMovimientoInventarioPM->setHabilitado(1);
   if($movimiento->save($objMovimientoInventarioPM) == 1){
      $successful_var = 1;
   };
}

echo $successful_var;