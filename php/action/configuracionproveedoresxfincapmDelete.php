<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/configuracionproveedoresxfincapmDAO.php';
include '../entities/configuracionproveedoresxfincapm.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$configuracionproveedoresxfincapmDAO = new configuracionproveedoresxfincapmDAO();
if($configuracionproveedoresxfincapmDAO->delete($_REQUEST['id'])){
header("Location: ../../configuracionproveedoresxfincapm/lista.php?ok");
exit;
}else{
header("Location: ../../configuracionproveedoresxfincapm/lista.php?er3");
exit;   
}
?>
