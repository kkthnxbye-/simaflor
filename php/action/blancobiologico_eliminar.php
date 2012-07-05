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
include '../dao/blancosbiologicosDAO.php';
include '../entities/blancosbiologicos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$blancosbiologicosDAO = new blancosbiologicosDAO();
if($blancosbiologicosDAO->delete($_REQUEST['id']) == 1){
   header("Location: ../../blancosbiologicos/lista.php?ok");
   exit;
}else{
   header("Location: ../../blancosbiologicos/lista.php?er3");
   exit;
}

?>
