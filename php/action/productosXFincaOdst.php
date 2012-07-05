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
$productosXFincaDAO->deletebyfinca($idFinca);
for($ss=1; $ss<= $total; $ss++){

if ($_POST['ck_'.$ss] == "on"){
	$ProductosXFinca = new ProductosXFinca;
	$ProductosXFinca->setIdFinca($idFinca);
	$ProductosXFinca->setIdProducto($_POST['prod_'.$ss]);
	$productosXFincaDAO->save($ProductosXFinca);
}	
}

header("Location: ../../productosXFinca/productosXFinca_odst.php?finca=$idFinca&ok");
exit;
?>
