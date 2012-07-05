<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();



include '../dao/daoConnection.php';
include '../dao/productosQuimicosDAO.php';
include '../entities/productosQuimicos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$productosQuimicosDAO = new productosQuimicosDAO();
if($productosQuimicosDAO->delete($_REQUEST['id']) == 1){
header("Location: ../../productosQuimicos/lista.php?ok");
exit;
}else{
header("Location: ../../productosQuimicos/lista.php?er3");
exit;   
}
?>
