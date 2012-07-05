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
include '../dao/configuracionxvariedadDAO.php';
include '../entities/configuracionxvariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$configuracionxvariedadDAO = new configuracionxvariedadDAO();
$configuracionxvariedadDAO->delete($_REQUEST['id']);
header("Location: ../../configuracionxvariedad/lista.php");
exit;
?>
