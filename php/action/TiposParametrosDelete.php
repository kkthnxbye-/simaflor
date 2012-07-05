<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposParametrosDAO.php';
include '../entities/TiposParametros.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposParametrosDAO = new TiposParametrosDAO();

$location = "Location: ../../TiposParametros/TiposParametrosList.php";

if ($TiposParametrosDAO->delete($_REQUEST['id']) === 1) {
    header($location . '?ok');
    exit;
}else{
    header($location . '?er3');
    exit;
}
?>
