<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/configuracionxvariedadDAO.php';
include '../entities/configuracionxvariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if (filter_var($valor, FILTER_VALIDATE_INT) === false) {
    header("Location: ../../configuracionxvariedad/configuracionxvariedad_crear.php?er4");
    exit;
}

if($TipoDeVariedad == 0 || $valor == ""){
    header("Location: ../../configuracionxvariedad/configuracionxvariedad_crear.php?er1");
    exit;
}

$configuracionxvariedadDAO = new configuracionxvariedadDAO();
$configuracionxvariedad = new configuracionxvariedad;
$configuracionxvariedad->setIdVariedad($variedad);
$configuracionxvariedad->setIdTipoConfVariedad($TipoDeVariedad);
$configuracionxvariedad->setValor($valor);

$configuracionxvariedadDAO->save($configuracionxvariedad);
header("Location: ../../configuracionxvariedad/lista.php?ok");
exit;
?>
