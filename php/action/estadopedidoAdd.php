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

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$nombre = accents2HTML($_POST['nombre']);

if ($nombre == "") {
    header("Location: ../../estadospedido/estadopedido_crear.php?er1");
    exit;
}

$estadospedidoDAO = new estadospedidoDAO();
$estadospedido = new estadospedido;
$estadospedido->setNombre($nombre);
$estadospedidoDAO->save($estadospedido);

header("Location: ../../estadospedido/lista.php?ok");
exit;
?>
