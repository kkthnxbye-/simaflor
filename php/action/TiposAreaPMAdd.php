<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposAreaPMDAO.php';
include '../entities/TiposAreaPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

$location = "Location: ../../TiposAreaPM/TiposAreaPMAdd.php";

if ($nombre != '') {
    $TiposAreaPM = new TiposAreaPM();
    $TiposAreaPMDAO = new TiposAreaPMDAO();
    $TiposAreaPM->setNombre($nombre);
    $TiposAreaPM->setDescripcion($descripcion);
    $TiposAreaPMDAO->save($TiposAreaPM);
    $location = "Location: ../../TiposAreaPM/TiposAreaPMList.php";
    header($location . '?ok');
    exit;
} else {
    header($location . "?n=$nombre&d=$descripcion&er1");
    exit;
}
?>
