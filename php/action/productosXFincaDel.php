<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/productosXFincaDAO.php';
include '../entities/productosXFinca.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$productosXFincaDAO = new productosXFincaDAO();
$productosXFincaDAO->delete($_REQUEST['id']);
header("Location: ../../productosXFinca/lista.php");
exit;
?>
