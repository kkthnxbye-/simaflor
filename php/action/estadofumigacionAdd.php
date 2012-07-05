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

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$nombre = $_POST['nombre'];

$nombre = accents2HTML($nombre);

if($nombre == "") {
    header("Location: ../../estadosfumigacion/estadofumigacion_crear.php?er1");
    exit;
}

$estadosfumigacionDAO = new estadosfumigacionDAO();
$estadosfumigacion = new estadosfumigacion;
$estadosfumigacion->setNombre($nombre);
$estadosfumigacionDAO->save($estadosfumigacion);
header("Location: ../../estadosfumigacion/lista.php?ok");
exit;
?>
