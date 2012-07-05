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
include '../dao/configuracionproveedoresxfincapmDAO.php';
include '../entities/configuracionproveedoresxfincapm.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if($IDProducto == 0 || $IDMaterialVegetal == 0 || $IDFincaCliente == 0 || $IDFincaProveedor == 0){
   header("Location: ../../configuracionproveedoresxfincapm/configuracionproveedoresxfincapm_crear.php?inf");
   exit;   
}

$configuracionproveedoresxfincapmDAO = new configuracionproveedoresxfincapmDAO();
$configuracionproveedoresxfincapm = new configuracionproveedoresxfincapm;
$configuracionproveedoresxfincapm->setIdProducto($IDProducto);
$configuracionproveedoresxfincapm->setIdMaterialVegetal($IDMaterialVegetal);
$configuracionproveedoresxfincapm->setFincaCliente($IDFincaCliente);
$configuracionproveedoresxfincapm->setFincaProveedor($IDFincaProveedor);
$configuracionproveedoresxfincapm->setFincaProduccion($IDFincaProduccion);

/* if ($habilitado == "on"){
$configuracionproveedoresxfincapm->setHabilitado(1);
}else{
$configuracionproveedoresxfincapm->setHabilitado(0);
} */

if ($_FILES['imagen'][ 'name' ] != "") {
	$destino="../../configuracionproveedoresxfincapm/img/".$_FILES['imagen'][ 'name' ];
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    $configuracionproveedoresxfincapm->setFoto($_FILES['imagen'][ 'name' ]);
}

$configuracionproveedoresxfincapmDAO->save($configuracionproveedoresxfincapm);
header("Location: ../../configuracionproveedoresxfincapm/lista.php?ok");
exit;
?>
