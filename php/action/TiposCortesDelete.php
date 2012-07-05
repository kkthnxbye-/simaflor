<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposCorteDAO.php';
include '../entities/TiposCorte.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposCorteDAO = new TiposCorteDAO();

$location = "Location: ../../TiposCorte/TiposCorteList.php";

if($TiposCorteDAO->delete($_REQUEST['id']) === 1){
    header($location . '?ok');
    exit;
}else{
    header($location . '?er3');
    exit;
}

?>
