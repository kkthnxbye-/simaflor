<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposDocumentoPedidosPMDAO.php';
include '../entities/TiposDocumentoPedidosPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposDocumentoPedidosPMDAO = new TiposDocumentoPedidosPMDAO();


if($TiposDocumentoPedidosPMDAO->delete($_REQUEST['id'])===1){
 $location = "Location: ../../TiposDocumentoPedidosPM/TiposDocumentoPedidosPMList.php";
header($location . '?ok');
exit;   
}else{
    $location = "Location: ../../TiposDocumentoPedidosPM/TiposDocumentoPedidosPMList.php";
header($location . '?er3');
exit;  
}


?>
