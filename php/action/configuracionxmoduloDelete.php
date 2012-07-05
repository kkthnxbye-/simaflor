<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/configuracionxmoduloDAO.php';
include '../entities/configuracionxmodulo.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$configuracionxmoduloDAO = new configuracionxmoduloDAO();
if ($configuracionxmoduloDAO->delete($_GET['id'])===1) {
    header("Location: ../../configuracionxmodulo/lista.php?ok");
    exit;
} else {
    header("Location: ../../configuracionxmodulo/lista.php?er3");
    exit;
}
?>
