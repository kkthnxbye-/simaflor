<?php

/**
 * Description of bancoAdd
 *
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/coloresDAO.php';
include '../entities/colores.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$coloresDAO = new coloresDAO();
$coloresDAO->delete($_REQUEST['id']);

header("Location: ../../colores/lista.php?ok");
exit;
?>
