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
include '../dao/laboresPMXVariedadDAO.php';
include '../entities/laboresPMXVariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$laboresPMXVariedadDAO = new laboresPMXVariedadDAO();
if($laboresPMXVariedadDAO->delete($_REQUEST['id']) == 1){
header("Location: ../../laboresPMXVariedad/lista.php?ok");
exit;
}else{
header("Location: ../../laboresPMXVariedad/lista.php?er3");
exit;   
}
?>
