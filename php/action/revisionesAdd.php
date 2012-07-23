<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/revisionesDAO.php';
include '../entities/revisiones.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if(filter_var($cantidad,FILTER_VALIDATE_INT) === FALSE){
   echo "er4";
   exit;
}

if (empty($_SESSION['lista_revisiones'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['lista_revisiones']);
}

$new_pos = count($listadetalles);

$detallepedido = new Revisiones();
$detallepedido->setIdTipoUnidadPM($idTipoUnidad);
$detallepedido->setIdVariedad($idVariedad);
$detallepedido->setIdGrado($idGrado);
$detallepedido->setCantidad($cantidad);
$detallepedido->setEstaBueno($estaBueno);
$detallepedido->setDesechado($desechado);
$detallepedido->setIdCausaNacional($idCausaNacional);
$detallepedido->setIdOperario($idOperario);
$detallepedido->setHabilitado($habilitado);


$listadetalles[$new_pos] = $detallepedido;
$_SESSION['lista_revisiones'] = serialize($listadetalles);

?>
