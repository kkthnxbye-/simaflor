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

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);

if ($nombre == "") {
    header("Location: ../../estadositem/estadoitem_editar.php?id=$id&er1");
    exit;
}

$estadositemDAO = new estadositemDAO();
$estadositem = $estadositemDAO->getById($id);
$estadositem->setNombre($nombre);
$estadositemDAO->update($estadositem);
header("Location: ../../estadositem/lista.php?ok");
exit;
?>
