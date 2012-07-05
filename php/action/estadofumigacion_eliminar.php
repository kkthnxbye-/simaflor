<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/estadosfumigacionDAO.php';
include '../entities/estadosfumigacion.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$estadosfumigacionDAO = new estadosfumigacionDAO();

if ($estadosfumigacionDAO->delete($_REQUEST['id'])) {
    header("Location: ../../estadosfumigacion/lista.php?ok");
    exit;
} else {
    header("Location: ../../estadosfumigacion/lista.php?er3");
    exit;
}
?>
