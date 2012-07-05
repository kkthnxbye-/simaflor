<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/laboresPMXVariedadDAO.php';
include '../entities/laboresPMXVariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if(filter_var($cantidad,FILTER_VALIDATE_INT)===false){
    header("Location: ../../laboresPMXVariedad/lab_crear.php?er4");
   exit;
}

if($idVeriedad == 0 || $idLabor == 0 || $unidad == 0){
   header("Location: ../../laboresPMXVariedad/lab_crear.php?inf");
   exit;
}

if($cantidad == "" || $cantidad < 1){
   header("Location: ../../laboresPMXVariedad/lab_crear.php?er1");
   exit;
}

$laboresPMXVariedadDAO = new laboresPMXVariedadDAO();
$laboresPMXVariedad = new laboresPMXVariedad;
$laboresPMXVariedad->setIdVariedad($idVeriedad);
$laboresPMXVariedad->setIdLaborPM($idLabor);
$laboresPMXVariedad->setCantidad($cantidad);
$laboresPMXVariedad->setTiempoCumplimiento($tp);
$laboresPMXVariedad->setUnidad($unidad);
$laboresPMXVariedad->setObservaciones($ob);
$laboresPMXVariedadDAO->save($laboresPMXVariedad);
header("Location: ../../laboresPMXVariedad/lista.php?ok");
exit;
?>
