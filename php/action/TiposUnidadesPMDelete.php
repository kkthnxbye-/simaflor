<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposUnidadesPMDAO.php';
include '../entities/TiposUnidadesPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposUnidadesPMDAO = new TiposUnidadesPMDAO();
$TiposUnidadesPMDAO->delete($_REQUEST['id']);

$location = "Location: ../../TiposUnidadesPM/TiposUnidadesPMList.php";
header($location . '?ok');
exit;
?>
