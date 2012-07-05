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

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$modulo = $_POST['modulo'];
$valor = $_POST['valor'];
$TipoDeParametro = $_POST['TipoDeParametro'];

if($valor == "" || $TipoDeParametro == 0) {
    header("Location: ../../configuracionxmodulo/configuracionxmodulo_crear.php?v=$valor&t=$TipoDeParametro&er1");
    exit;
}

$configuracionxmoduloDAO = new configuracionxmoduloDAO();
$configuracionxmodulo = new configuracionxmodulo;
$configuracionxmodulo->setIdModulo($modulo);
$configuracionxmodulo->setIdTipoParametro($TipoDeParametro);
$configuracionxmodulo->setValor($valor);

/* if ($habilitado == "on"){
  $configuracionxmodulo->setHabilitado(1);
  }else{
  $configuracionxmodulo->setHabilitado(0);
  } */

if ($_FILES['imagen']['name'] != "") {
    $destino = "../../configuracionxmodulo/img/" . $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    $configuracionxmodulo->setFoto($_FILES['imagen']['name']);
}

$configuracionxmoduloDAO->save($configuracionxmodulo);
header("Location: ../../configuracionxmodulo/lista.php");
exit;
?>
