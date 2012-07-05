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
include '../dao/productosXServicioXFincaDAO.php';
include '../entities/productosXServicioXFinca.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$productosXServicioXFincaDAO = new productosXServicioXFincaDAO();
if($productosXServicioXFincaDAO->delete($_REQUEST['id'])===1){
header("Location: ../../productosXServicioXFinca/lista.php?ok");
exit;
}else{
header("Location: ../../productosXServicioXFinca/lista.php?er3");
exit;  
}
?>
