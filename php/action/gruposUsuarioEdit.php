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

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($nombre == ""){
   header("Location: ../../gruposUsuario/gruposUsuario_editar.php?id=$id");
exit; 
}

$gruposUsuarioDAO = new gruposUsuarioDAO();
$gruposUsuario = $gruposUsuarioDAO->getById($id);
$gruposUsuario->setNombre($nombre);
$gruposUsuario->setDescripcion($descripcion);
$gruposUsuarioDAO->update($gruposUsuario);
header("Location: ../../gruposUsuario/lista.php?ok");
exit;
?>
