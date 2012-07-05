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
include '../dao/metricasDAO.php';
include '../entities/metricas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$metricasDAO = new metricasDAO();
if($metricasDAO->delete($_REQUEST['id']) == 1){
header("Location: ../../metricas/lista.php?ok");
exit;
}else{
header("Location: ../../metricas/lista.php?er3");
exit;   
}
?>
