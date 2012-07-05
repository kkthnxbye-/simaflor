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

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);


if($nombre ==  "") {
    header("Location: ../../estadosfumigacion/estadofumigacion_editar.php?id=$id&er1");
    exit;
}

$estadosfumigacionDAO = new estadosfumigacionDAO();
$estadosfumigacion = $estadosfumigacionDAO->getById($id);
$estadosfumigacion->setNombre($nombre);
$estadosfumigacionDAO->update($estadosfumigacion);
header("Location: ../../estadosfumigacion/lista.php?ok");
exit;
?>
