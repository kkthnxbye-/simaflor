<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */

session_start();

include '../dao/daoConnection.php';
include '../dao/estadospedidoDAO.php';
include '../entities/estadospedido.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$estadospedidoDAO = new estadospedidoDAO();

if ($estadospedidoDAO->delete($_REQUEST['id'])) {
    header("Location: ../../estadospedido/lista.php?er1");
    exit;
} else {
    header("Location: ../../estadospedido/lista.php?ok");
    exit;
}
?>
