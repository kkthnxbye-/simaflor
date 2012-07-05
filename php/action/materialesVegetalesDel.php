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
include '../dao/materialesVegetalesDAO.php';
include '../entities/materialesVegetales.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$materialesVegetalesDAO = new materialesVegetalesDAO();
$materialesVegetalesDAO->delete($_REQUEST['id']);
header("Location: ../../materialesVegetales/lista.php?ok");
exit;
?>
