<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/documentosxpedidosDAO.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

if($_GET['ban'] != 1){
$location = "Location: ../../pedidosInternoPM/documentos_pedido.php";
}else{
    $location = "Location: ../../pedidosClientePM/documentos_pedido.php";
}

$id_ = $_GET['id_'];
$idDoc = $_GET['id2_'];

$docxpedDAO = new documentosxpedidosDAO();

if ($idDoc != '') {
    $docxpedDAO->delete($idDoc);
    header($location . '?ok&pedido_id='.$id_.'');
    exit;
} else {
    header($location . '?er3&pedido_id='.$id_.'');
    exit;
}
?>
