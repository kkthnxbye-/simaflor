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

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);

if ($nombre == "") {
    header("Location: ../../estadospedido/estadopedido_editar.php?id=$id&er1");
    exit;
}

$estadospedidoDAO = new estadospedidoDAO();
$estadospedido = $estadospedidoDAO->getById($id);
$estadospedido->setNombre($nombre);
$estadospedidoDAO->update($estadospedido);

header("Location: ../../estadospedido/lista.php?ok");
exit;

?>
