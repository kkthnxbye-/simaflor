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
include '../dao/laboresPMXProductoDAO.php';
include '../entities/laboresPMXProducto.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$laboresPMXProductoDAO = new laboresPMXProductoDAO();
if($laboresPMXProductoDAO->delete($_REQUEST['id'])===1){
header("Location: ../../laboresPMXProducto/lista.php?ok");
exit;
}else{
header("Location: ../../laboresPMXProducto/lista.php?er3");
exit;   
}
?>
