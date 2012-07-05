<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/configuracionxusuarioDAO.php';
include '../entities/configuracionxusuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$configuracionxusuarioDAO = new configuracionxusuarioDAO();
$usuario = $_GET['usuario'];

if ($configuracionxusuarioDAO->delete($_REQUEST['id'])===1) {
    header("Location: ../../configuracionxusuario/lista.php?usuario=$usuario&ok");
    exit;
} else {
    header("Location: ../../configuracionxusuario/lista.php?usuario=$usuario&er3");
    exit;
}
?>
