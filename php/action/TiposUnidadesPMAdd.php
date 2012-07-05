<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposUnidadesPMDAO.php';
include '../entities/TiposUnidadesPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../TiposUnidadesPM/TiposUnidadesPMAdd.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);
$habilitado = $_POST['habilitado'];

if ($codigo == "" || $nombre == "") {
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&h=$habilitado&er1");
    exit;
}


$TiposUnidadesPM = new TiposUnidadesPM();
$TiposUnidadesPMDAO = new TiposUnidadesPMDAO();
if ($TiposUnidadesPMDAO->getBycodigo($codigo) != null) {
    header($location . "?n=$nombre&d=$descripcion&h=$habilitado&er2");
    exit;
}

$TiposUnidadesPM->setCodigo($codigo);
$TiposUnidadesPM->setNombre($nombre);
$TiposUnidadesPM->setDescripcion($descripcion);
if ($habilitado == "on") {
    $TiposUnidadesPM->setHabilitado(1);
} else {
    $TiposUnidadesPM->setHabilitado(0);
}

$TiposUnidadesPMDAO->save($TiposUnidadesPM);

$location = "Location: ../../TiposUnidadesPM/TiposUnidadesPMList.php";
header($location . '?ok');
exit;
?>
