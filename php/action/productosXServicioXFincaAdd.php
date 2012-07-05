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

if($idProducto == 0 || $idMaterialesVegetales == 0 || $idServicio == 0){
   header("Location: ../../productosXServicioXFinca/productosXServicioXFinca_crear.php?idp=$idProducto&idm=$idMaterialesVegetales&ids=$idServicio&inf");
   exit;
}

$productosXServicioXFincaDAO = new productosXServicioXFincaDAO();
$productosXServicioXFinca = new productosXServicioXFinca;
$productosXServicioXFinca->setIdFinca($idFinca);
$productosXServicioXFinca->setIdProducto($idProducto);
$productosXServicioXFinca->setIdMaterialVegetal($idMaterialesVegetales);
$productosXServicioXFinca->setIdServicio($idServicio);
$productosXServicioXFincaDAO->save($productosXServicioXFinca);
header("Location: ../../productosXServicioXFinca/lista.php?finca=$idFinca&ok");
exit;
?>
