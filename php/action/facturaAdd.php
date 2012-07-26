<?php

session_start();
date_default_timezone_set("America/Bogota");

/* @Autor Brayan Acebo
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include '../dao/daoConnection.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';


include_once '../dao/facturasPMDAO.php';
include_once '../entities/facturasPM.php';
include_once '../dao/detalleFacturaPMDAO.php';
include_once '../entities/detalleFactura.php';

$facturaDAO = new FacturasPMDAO();
$factura = new FacturasPM();
$detalleFacturaDAO = new DetalleFacturaPMDAO();
$detalleFactura = new DetalleFacturaPM();


foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}


$factura->setIdDocumentosInventarioPM($idDocumentoInventario);
$factura->setFormaPago($formaPago);
$factura->setObservaciones($observaciones);
$factura->setFacturado(1);
$factura->setIdUsuario($idUsuario);
$factura->setFechaRegistro(date('Y-m-d H:i'));

$facturaDAO->save($factura);


$idFactura = $facturaDAO->getLastId();

$cont = 1;

for ($i = 1; $i <= $canTotal; $i++) {
    
    if($_POST["cantidadFacturada{$i}"] == "" || $_POST["fiesta{$i}"] == "0" 
    || $_POST["noCamas{$i}"] == "" || $_POST["precioUnidad{$i}"] == ""){
        $facturaDAO->delete($idFactura);
        echo "2";
        exit();
    }
    if( filter_var($_POST["cantidadFacturada{$i}"],FILTER_VALIDATE_INT) === false ||
        filter_var($_POST["noCamas{$i}"],FILTER_VALIDATE_FLOAT) === false ||
        filter_var($_POST["precioUnidad{$i}"],FILTER_VALIDATE_FLOAT) === false ){
            $facturaDAO->delete($idFactura);
        echo "3";
        exit();
    }
    
    $detalleFactura->setIdFactura($idFactura);
    $detalleFactura->setIdVariedad($_POST["idVariedad{$i}"]);
    $detalleFactura->setCantidadSalida($_POST["cantidadSalida{$i}"]);
    $detalleFactura->setCantidadFacturada($_POST["cantidadFacturada{$i}"]);
    $detalleFactura->setIdTemporada($_POST["fiesta{$i}"]);
    $detalleFactura->setNoCamas($_POST["noCamas{$i}"]);
    $detalleFactura->setPrecioUnidadUSD($_POST["precioUnidad{$i}"]);
    
    if (!$detalleFacturaDAO->save($detalleFactura)) {$cont++;}
    
}

if ($cont == 1) {
    echo "1";
}






