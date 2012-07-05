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
    header("Location: ../../laboresPMXVariedad/lab_editar.php?id=$id&er4");
   exit;
}


if ($idVariedad == 0 || $idLabor == 0 || $unidad == 0) {
    header("Location: ../../laboresPMXVariedad/lab_editar.php?id=$id&inf");
    exit;
}

if ($cantidad < 1) {
    header("Location: ../../laboresPMXVariedad/lab_editar.php?id=$id&er1");
    exit;
}

$laboresPMXVariedadDAO = new laboresPMXVariedadDAO();
$laboresPMXVariedad = $laboresPMXVariedadDAO->getById($id);
$laboresPMXVariedad->setIdVariedad($idVariedad);
$laboresPMXVariedad->setIdLaborPM($idLabor);
$laboresPMXVariedad->setCantidad($cantidad);
$laboresPMXVariedad->setTiempoCumplimiento($tp);
$laboresPMXVariedad->setUnidad(1);
$laboresPMXVariedad->setObservaciones($ob);
$laboresPMXVariedadDAO->update($laboresPMXVariedad);

//exit;
header("Location: ../../laboresPMXVariedad/lista.php?ok");
exit;
?>
