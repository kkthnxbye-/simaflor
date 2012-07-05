<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/temporadasDAO.php';
include '../entities/temporadas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$temporadasDAO = new temporadasDAO();
if ($temporadasDAO->delete($_REQUEST['id'])===1) {
    header("Location: ../../temporadas/lista.php?ok");
    exit;
} else {
    header("Location: ../../temporadas/lista.php?er1");
    exit;
}
?>
