<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */

session_start();


include '../dao/daoConnection.php';
include '../dao/ciclosDAO.php';
include '../entities/ciclos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$ciclosDAO = new ciclosDAO();
if ($ciclosDAO->delete($_REQUEST['id'])===1) {
    header("Location: ../../ciclos/lista.php?ok");
    exit;
} else {
    header("Location: ../../ciclos/lista.php?er3");
    exit;
}
?>
