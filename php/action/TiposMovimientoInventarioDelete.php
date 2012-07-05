<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposMovimientoInventarioDAO.php';
include '../entities/TiposMovimientoInventario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
$location = "Location: ../../TiposMovimientoInventario/TiposMovimientoInventarioList.php";

if ($TiposMovimientoInventarioDAO->delete($_REQUEST['id']) === 1) {
    header($location . '?ok');
    exit;
} else {
    header($location . '?er3');
    exit;
}
?>
