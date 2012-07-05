<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/detallepedidoDAO.php';
include '../entities/detallepedido.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';
foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if(filter_var($cantidad,FILTER_VALIDATE_INT) === FALSE){
   echo "er4";
   exit;
}

if (empty($_SESSION['lista_detalles'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['lista_detalles']);
}
$new_pos = count($listadetalles);
$detallepedido = new detallepedido;
$detallepedido->setVariedad($variedad);
$detallepedido->setCantidad($cantidad);
$detallepedido->setCantidadAprobada(0);
$detallepedido->setFechaEntrega($fecha_ini);
$detallepedido->setFecharecibomaterial($fecha_fin);
//$detallepedido->setIdpedido($idpedido);
$listadetalles[$new_pos] = $detallepedido;
$_SESSION['lista_detalles'] = serialize($listadetalles);
?>
