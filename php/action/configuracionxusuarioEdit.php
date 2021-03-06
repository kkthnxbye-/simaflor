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

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$TipoDeConfiguracion = $_POST['TipoDeConfiguracion'];
$valor = $_POST['valor'];

if ($TipoDeConfiguracion == 0 || $valor == "") {
    header("Location: ../../configuracionxusuario/configuracionxusuario_editar.php?id=$id&er1");
    exit;
}

$configuracionxusuarioDAO = new configuracionxusuarioDAO();
$configuracionxusuario = $configuracionxusuarioDAO->getById($id);
$configuracionxusuario->setIdUsuario($usuario);
$configuracionxusuario->setIdTipoConfUsuario($TipoDeConfiguracion);
$configuracionxusuario->setValor($valor);


$configuracionxusuarioDAO->update($configuracionxusuario);
header("Location: ../../configuracionxusuario/lista.php?usuario=$usuario&ok");
exit;

?>
