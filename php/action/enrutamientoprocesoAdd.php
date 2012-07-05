<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/enrutamientoprocesoDAO.php';
include '../entities/enrutamientoproceso.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if($generaEtiquetaProduccion == "" || $idFinca == 0 || $idProducto == 0 || $idServicio == 0 || $idMaterialesVegetales == 0 || $idProcesoOrigen == 0 || $idProcesoDestino == 0) {
    header("Location: ../../enrutamientoproceso/enrutamientoproceso_crear.php?ge=$generaEtiquetaProduccion&f=$idFinca&p=$idProducto&s=$idServicio&mv=$idMaterialesVegetales&po=$idProcesoOrigen&pd=$idProcesoDestino&tm=$idTipoMovimiento&er1");
    exit;
}

$enrutamientoprocesoDAO = new enrutamientoprocesoDAO();

$enrutamientoproceso = new enrutamientoproceso;

$enrutamientoproceso->setIdFinca($idFinca);
$enrutamientoproceso->setIdProducto($idProducto);
$enrutamientoproceso->setIdServicio($idServicio);
$enrutamientoproceso->setIdMaterialVegetal($idMaterialesVegetales);
$enrutamientoproceso->setIdProcesoOrigen($idProcesoOrigen);
$enrutamientoproceso->setIdProcesoDestino($idProcesoDestino);
$enrutamientoproceso->setIdTipoMovimientoInventario($idTipoMovimiento);
if($generaEtiquetaProduccion == "si"){
    $enrutamientoproceso->setGeneraEtiquetaProduccion(1);
}else{
    $enrutamientoproceso->setGeneraEtiquetaProduccion(0);
}

$enrutamientoprocesoDAO->save($enrutamientoproceso);
header("Location: ../../enrutamientoproceso/lista.php?ok");
exit;
?>
