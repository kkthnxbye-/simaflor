<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/areaspmxbloquepmDAO.php';
include '../entities/areaspmxbloquepm.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$areaspmxbloquepmDAO = new areaspmxbloquepmDAO();
if($areaspmxbloquepmDAO->delete($_REQUEST['id'])===1){
header("Location: ../../areaspmxbloquepm/lista.php?ok");
exit;
}else{
   header("Location: ../../areaspmxbloquepm/lista.php?er3");
exit; 
}
?>
