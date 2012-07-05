<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/bloquespmxfincaDAO.php';
include '../entities/bloquespmxfinca.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$bloquespmxfincaDAO = new bloquespmxfincaDAO();

if ($bloquespmxfincaDAO->delete($_REQUEST['id']) == 1) {
    header("Location: ../../bloquesyareas/lista.php?ok");
    exit;
} else {
    header("Location: ../../bloquesyareas/lista.php?er3");
    exit;
}
?>
