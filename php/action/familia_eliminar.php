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
include '../dao/familiasDAO.php';
include '../entities/familias.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$familiasDAO = new familiasDAO();
$familiasDAO->delete($_REQUEST['id']);
header("Location: ../../familias/lista.php?ok");
exit;
?>
