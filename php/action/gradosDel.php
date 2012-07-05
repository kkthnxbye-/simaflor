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
include '../dao/gradosDAO.php';
include '../entities/grados.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$gradosDAO = new gradosDAO();
$gradosDAO->delete($_REQUEST['id']);
header("Location: ../../grados/lista.php?ok");
exit;
?>
