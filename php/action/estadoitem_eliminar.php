<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/estadositemDAO.php';
include '../entities/estadositem.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$estadositemDAO = new estadositemDAO();
if ($estadositemDAO->delete($_REQUEST['id'])) {
    header("Location: ../../estadositem/lista.php?ok");
    exit;
} else {
    header("Location: ../../estadositem/lista.php?er3");
    exit;
}
?>
