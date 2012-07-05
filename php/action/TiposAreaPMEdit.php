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

$location = "Location: ../../TiposAreaPM/TiposAreaPMEditar.php";

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

$TiposAreaPM = new TiposAreaPM();
$TiposAreaPMDAO = new TiposAreaPMDAO();

$TiposAreaPM = $TiposAreaPMDAO->getById($id);
// Valida los no nulos.
if($nombre != '') {
    
    $TiposAreaPM->setNombre($nombre);
    $TiposAreaPM->setDescripcion($descripcion);

    $TiposAreaPMDAO->update($TiposAreaPM);
    
    $location = "Location: ../../TiposAreaPM/TiposAreaPMList.php";
    header($location . '?ok');
    exit;
}
header($location."?id=$id&er1");
exit;
?>
