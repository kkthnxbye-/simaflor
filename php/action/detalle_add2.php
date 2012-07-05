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
$detallepedidoDAO = new detallepedidoDAO();
$detallepedido = new detallepedido;
$detallepedido->setVariedad($variedad);
$detallepedido->setCantidad($cantidad);
$detallepedido->setFechaEntrega($fecha_ini);
$detallepedido->setFecharecibomaterial($fecha_fin);
$detallepedido->setPedido($pedido);
$detallepedidoDAO->save($detallepedido);
?>
