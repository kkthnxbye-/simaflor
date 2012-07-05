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

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$productosXServicioXFincaDAO = new productosXServicioXFincaDAO();
$productosXServicioXFinca = $productosXServicioXFincaDAO->getById($id);
$productosXServicioXFinca->setIdFinca($idFinca);
$productosXServicioXFinca->setIdProducto($idProducto);
$productosXServicioXFinca->setIdMaterialVegetal($idMaterialVegetal);
$productosXServicioXFinca->setIdServicio($idServicio);
$productosXServicioXFincaDAO->update($productosXServicioXFinca);
header("Location: ../../productosXServicioXFinca/lista.php?ok");
exit;
?>
