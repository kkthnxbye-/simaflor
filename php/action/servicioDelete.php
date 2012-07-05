<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/serviciosDAO.php';
include '../entities/servicios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$serviciosDAO = new serviciosDAO();

$location = "Location: ../../Servicios/ServiciosList.php";

if($serviciosDAO->delete($_REQUEST['id']) == 1){
    header($location . '?ok');
    exit;
}else{
    header($location . '?er3');
    exit;
}

?>
