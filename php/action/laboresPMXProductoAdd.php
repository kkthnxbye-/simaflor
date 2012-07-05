<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/laboresPMXProductoDAO.php';
include '../entities/laboresPMXProducto.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if(filter_var($cantidad,FILTER_VALIDATE_INT) === false ){
   header("Location: ../../laboresPMXProducto/lab_crear.php?ca=$cantidad&ip=$idProducto&il=$idLabor&u=$unidad&er4");
   exit; 
}

if($idProducto == 0 || $idLabor == 0 || $unidad == 0){
   header("Location: ../../laboresPMXProducto/lab_crear.php?ca=$cantidad&ip=$idProducto&il=$idLabor&u=$unidad&inf");
   exit;
}

if($cantidad == "" || $cantidad < 1){
   header("Location: ../../laboresPMXProducto/lab_crear.php?ca=$cantidad&ip=$idProducto&il=$idLabor&u=$unidad&er1");
   exit;
}

$laboresPMXProductoDAO = new laboresPMXProductoDAO();
$laboresPMXProducto = new laboresPMXProducto;
$laboresPMXProducto->setIdProducto($idProducto);
$laboresPMXProducto->setIdLaborPM($idLabor);
$laboresPMXProducto->setCantidad($cantidad);
$laboresPMXProducto->setTiempoCumplimiento($tp);
$laboresPMXProducto->setUnidad($unidad);
$laboresPMXProducto->setObservaciones($ob);
$laboresPMXProductoDAO->save($laboresPMXProducto);
header("Location: ../../laboresPMXProducto/lista.php?ok");
exit;
?>
