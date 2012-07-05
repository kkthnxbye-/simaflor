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
include '../dao/productosXFincaDAO.php';
include '../entities/productosXFinca.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$productosXFincaDAO = new productosXFincaDAO();
$productosXFinca = $productosXFincaDAO->getById($id);
$productosXFinca->setIdFinca($idFinca);
$productosXFinca->setIdProducto($idProducto);
$productosXFincaDAO->update($productosXFinca);
header("Location: ../../productosXFinca/lista.php");
exit;
?>
