<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposDocumentoXTipoMovimientoInventarioDAO.php';
include '../entities/TiposDocumentoXTipoMovimientoInventario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposDocumentoXTipoMovimientoInventarioDAO = new TiposDocumentoXTipoMovimientoInventarioDAO();
$location = "Location: ../../TiposDocumentosInventarios/TiposDocumentosInventariosList.php";
if($TiposDocumentoXTipoMovimientoInventarioDAO->delete($_REQUEST['id'])===1){
header($location . '?ok');
exit;  
}else{
   header($location . '?er3');
exit; 
}


?>
