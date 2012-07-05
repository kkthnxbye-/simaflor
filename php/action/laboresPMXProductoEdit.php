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
include '../dao/laboresPMXProductoDAO.php';
include '../entities/laboresPMXProducto.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if($idProducto == 0 || $idLabor == 0 || $unidad == 0){
   header("Location: ../../laboresPMXProducto/lab_editar.php?id=$id&inf");
   exit;
}

if($cantidad < 1){
   header("Location: ../../laboresPMXProducto/lab_editar.php?id=$id&er1");
   exit;
}

$laboresPMXProductoDAO = new laboresPMXProductoDAO();
$laboresPMXProducto = $laboresPMXProductoDAO->getById($id);
$laboresPMXProducto->setIdProducto($idProducto);
$laboresPMXProducto->setIdLaborPM($idLabor);
$laboresPMXProducto->setCantidad($cantidad);
$laboresPMXProducto->setTiempoCumplimiento($tp);
$laboresPMXProducto->setUnidad($unidad);
$laboresPMXProducto->setObservaciones($ob);
$laboresPMXProductoDAO->update($laboresPMXProducto);
header("Location: ../../laboresPMXProducto/lista.php?ok");
exit;
?>
