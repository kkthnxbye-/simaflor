<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/productosDAO.php';
include '../entities/productos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$productosDAO = new productosDAO();

if($productosDAO->delete($_REQUEST['id']) == 1){
  header("Location: ../../productos/lista.php?ok"); 
  exit;
}else{
    header("Location: ../../productos/lista.php?er3"); 
    exit;  
}

?>
