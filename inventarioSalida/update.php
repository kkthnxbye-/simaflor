<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/movimientosInventarioDAO.php';
include '../php/entities/movimientosInventarioPM.php';

include '../php/dao/documentoInventarioPMDAO.php';
include '../php/entities/documentoInventarioPM.php';

foreach($_POST as $key => $value){
   $$key = $value;
}

$daoM = new MovimientosInventarioDAO();
$daoD = new documentoInventarioPMDAO();

$consecutivo = $daoD->get('IDFinca',$idFincaProduccion,'MAX','consecutivo');
$consecutivo++;

$objDoc = new DocumentoInventarioPM();
$objDoc->setIdFinca($idFincaProduccion);
$objDoc->setIdTipoMovimientoInventarioPM($IDTipoMovimiento);
$objDoc->setConsecutivo($consecutivo);
$objDoc->setFecha(date('Y-m-d'));
$daoD->save($objDoc);

$last = $daoD->getLastId();

echo $daoM->updateSome($IDDocumento, $last);