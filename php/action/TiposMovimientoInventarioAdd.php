<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposMovimientoInventarioDAO.php';
include '../entities/TiposMovimientoInventario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../TiposMovimientoInventario/TiposMovimientoInventarioAdd.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$suma = $_POST['suma'];
$descripcion = accents2HTML($_POST['descripcion']);

if ($codigo == "" || $nombre == "") {
    header($location . "?c=$codigo&n=$nombre&s=$suma&d=$descripcion&er1");
    exit;
}


$TiposMovimientoInventario = new TiposMovimientoInventario();
$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
if ($TiposMovimientoInventarioDAO->getBycodigo($codigo) != null) {
    header($location . "?&n=$nombre&s=$suma&d=$descripcion&er2");
    exit;
}


$id = (int)$TiposMovimientoInventarioDAO->getLastId();
$id = $id+1;

$TiposMovimientoInventario->setId($id);
$TiposMovimientoInventario->setCodigo($codigo);
$TiposMovimientoInventario->setNombre($nombre);
$TiposMovimientoInventario->setDescripcion($descripcion);
$TiposMovimientoInventario->setHabilitado(1);
$TiposMovimientoInventario->setSuma(0);
if ($suma == 'on') {
    $TiposMovimientoInventario->setSuma(1);
}

$TiposMovimientoInventarioDAO->save($TiposMovimientoInventario);



$location = "Location: ../../TiposMovimientoInventario/TiposMovimientoInventarioList.php";
header($location . '?ok');
exit;
?>
