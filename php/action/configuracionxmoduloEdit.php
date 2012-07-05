<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/configuracionxmoduloDAO.php';
include '../entities/configuracionxmodulo.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$id = $_POST['id'];
$id_modulo = $_POST['modulo'];
$id_tipo_parametro = $_POST['TipoDeParametro'];
$valor = $_POST['valor'];

if ($id_tipo_parametro == 0 || $valor == "") {
    header("Location: ../../configuracionxmodulo/configuracionxmodulo_editar.php?id=$id&er1");
    exit;
}

$configuracionxmoduloDAO = new configuracionxmoduloDAO();
$configuracionxmodulo = new configuracionxmodulo();
$configuracionxmodulo = $configuracionxmoduloDAO->getById($id);

$configuracionxmodulo->setId($id);
$configuracionxmodulo->setIdModulo($id_modulo);
$configuracionxmodulo->setIdTipoParametro($id_tipo_parametro);
$configuracionxmodulo->setValor($valor);


$configuracionxmoduloDAO->update($configuracionxmodulo);

header("Location: ../../configuracionxmodulo/lista.php?ok");
exit;
?>
