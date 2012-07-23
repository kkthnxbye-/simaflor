<?php
session_start();

include '../php/dao/daoConnection.php';

include '../php/dao/inventariosPMDAO.php';
include '../php/entities/inventariosPM.php';

include '../php/dao/movimientosInventarioDAO.php';
include '../php/entities/movimientosInventarioPM.php';

include '../php/dao/documentoInventarioPMDAO.php';
include '../php/entities/documentoInventarioPM.php';

include '../php/entities/usuarios.php';

include '../php/entities/sessionsalida.php';

foreach($_POST as $key => $value){
   $$key = $value;
}

$usuario = new usuarios();
$usuario = unserialize($_SESSION['user']);

$daoI = new InventariosPMDAO();
$daoM = new MovimientosInventarioDAO();
$daoD = new documentoInventarioPMDAO();
$lista = new sessionsalida();

$var_success = 0;

//Consecutivo
$consecutivo = $daoD->get('IDFinca', $_SESSION['fincaproduccion'], 'MAX', 'consecutivo');
$consecutivo++;
//inserto en documentosInventarioPM
$objDoc = new DocumentoInventarioPM();
$objDoc->setIdFinca($IDCliente);
$objDoc->setIdTipoMovimientoInventarioPM($IDTipoMovimiento);
$objDoc->setFecha(date('Y-m-d'));
$objDoc->setConsecutivo($consecutivo);
if($daoD->save($objDoc)){
   $var_success = 1;
}

//get last id documento
$docId = $daoD->getLastId();



if (empty($_SESSION['entradatmp'])) {
   $lista = array();
} else {
   $lista = unserialize($_SESSION['entradatmp']);
}

foreach ($lista as $l){
   //Actualizo InventariosPM
   
   //Obtengo nuevo saldo
   $inventario = $daoI->getById($l->getPieza());
   $newsaldo = $inventario->getSaldo() - $l->getCantidad();
   
   $daoI->updateSaldo($l->getPieza(),$newsaldo);
   /* ----------------------------------------------------------------------- */
   $documentoID = $docId;
   
   //Inserto en MovimientoInventario
   $objMovimientoInventarioPM = new movimientosInventarioPM();
   $objMovimientoInventarioPM->setIdInventarioPM($l->getPieza());
   $objMovimientoInventarioPM->setIdTipoMovimientoInventarioPM($IDTipoMovimiento);
   $objMovimientoInventarioPM->setIdCliente($IDCliente);
   $objMovimientoInventarioPM->setCantidad($l->getCantidad());
   $objMovimientoInventarioPM->setFechaRegistro(date('Y-m-d'));
   $objMovimientoInventarioPM->setIdUsuario($usuario->getId());
   $objMovimientoInventarioPM->setIdDocumentoInventarioPM($documentoID);
   $objMovimientoInventarioPM->setHabilitado(1);
   if($daoM->save($objMovimientoInventarioPM)){
      $var_success = 1;
   }   
}
if($var_success == 1){
   $_SESSION['entradatmp'] = '';
}
echo $var_success;