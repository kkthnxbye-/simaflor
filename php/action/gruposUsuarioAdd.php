<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/gruposUsuarioDAO.php';
include '../entities/gruposUsuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($nombre == "") {
    header("Location: ../../gruposUsuario/lista.php?d=$descripcion&er1");
    exit;
}

$gruposUsuarioDAO = new gruposUsuarioDAO();
$gruposUsuario = new gruposUsuario();
$gruposUsuario->setNombre($nombre);
$gruposUsuario->setDescripcion($descripcion);
$gruposUsuarioDAO->save($gruposUsuario);
header("Location: ../../gruposUsuario/lista.php?ok");
exit;
?>
