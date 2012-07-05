<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/empresasDAO.php';
include '../entities/empresas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$empresasDAO = new empresasDAO();
if($empresasDAO->delete($_REQUEST['id'])===1){
  header("Location: ../../empresas/lista.php?ok");
  exit;
}else{
  header("Location: ../../empresas/lista.php?er3");
  exit;
}
exit;
?>
