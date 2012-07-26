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
$detalleFacturaDAO = new DetalleFacturaPMDAO();



foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}


$facturaDAO->update($idFactura, $formaPago, $observaciones, $idUsuario);

$cont = 1;

for ($i = 1; $i <= $canTotal; $i++) {
    
    if($_POST["cantidadFacturada{$i}"] == ""
    || $_POST["noCamas{$i}"] == "" || $_POST["precioUnidad{$i}"] == ""){
        
        echo "2";
        exit();
    }
    if( filter_var($_POST["cantidadFacturada{$i}"],FILTER_VALIDATE_INT) === false ||
        filter_var($_POST["noCamas{$i}"],FILTER_VALIDATE_FLOAT) === false ||
        filter_var($_POST["precioUnidad{$i}"],FILTER_VALIDATE_FLOAT) === false ){
            
        echo "3";
        exit();
    }
    
    
    
    
    if (!$detalleFacturaDAO->update($_POST["idDetalle{$i}"], $_POST["cantidadFacturada{$i}"], $_POST["fiesta{$i}"], $_POST["noCamas{$i}"], $_POST["precioUnidad{$i}"])) {$cont++;}
    
}
echo "1";
exit();
if ($cont == 1) {
    echo "1";
    exit();
}






