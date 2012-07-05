<?php

session_start();
include '../dao/daoConnection.php';
include '../dao/laboresDAO.php';
include '../entities/labores.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$lDAO = new LaboresDAO();

if($lDAO->delete($_GET['id']) == 1){
    @unlink("../../labores/images/".$_GET['img']);
   header("Location: ../../labores/lista.php?ok");
   exit; 
}else{
    header("Location: ../../labores/lista.php?er3");
    exit;
}