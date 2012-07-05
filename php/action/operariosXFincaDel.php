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
include '../dao/operariosXFincaDAO.php';
include '../entities/operariosXFinca.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$operariosXFincaDAO = new operariosXFincaDAO();
$operariosXFincaDAO->delete($_REQUEST['id']);
header("Location: ../../operariosXFinca/lista.php");
exit;
?>
