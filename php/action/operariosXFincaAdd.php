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

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$operariosXFincaDAO = new operariosXFincaDAO();
$operariosXFinca = new operariosXFinca;
$operariosXFinca->setIdFinca($idFinca);
$operariosXFinca->setIdOperario($idOperario);
$operariosXFincaDAO->save($operariosXFinca);
header("Location: ../../operariosXFinca/lista.php");
exit;
?>
