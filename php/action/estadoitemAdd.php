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

$nombre = accents2HTML($_POST['nombre']);

if ($nombre == "") {
    header("Location: ../../estadositem/estadoitem_crear.php?er1");
    exit;
}

$estadositemDAO = new estadositemDAO();
$estadositem = new estadositem;
$estadositem->setNombre($nombre);
$estadositemDAO->save($estadositem);

header("Location: ../../estadositem/lista.php?ok");
exit;
?>
