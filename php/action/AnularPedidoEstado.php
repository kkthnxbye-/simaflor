<?php
    
    session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/pedidosDAO.php';
include '../entities/pedidos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$id_pedido = $_GET['pedido_id'];
$id_estado = $_GET['estado_id'];

$new_estado = (int)$id_estado + 1;

$pedidosDAO = new pedidosDAO();
$pedidosDAO->updateEstado(8, $id_pedido);

header("Location: ../../pedidosInternoPM/lista.php?ok");
    
?>
