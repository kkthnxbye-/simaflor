<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/breedersDAO.php';
include '../entities/breeders.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$breedersDAO = new breedersDAO();

if($breedersDAO->delete($_REQUEST['id'])===1){
header("Location: ../../breeders/lista.php?ok");
exit;
}else{
header("Location: ../../breeders/lista.php?er3");
exit;    
}


?>
