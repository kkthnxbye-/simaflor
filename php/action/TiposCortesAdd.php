<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposCorteDAO.php';
include '../entities/TiposCorte.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../TiposCorte/TiposCorteAdd.php";

$idProducto = $_POST['idProducto'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);


/** Valida los no nulos. * */
if ($idProducto == '0' || $codigo == "" || $nombre == "") {
    header($location . "?i=$idProducto&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$TiposCorte = new TiposCorte();
$TiposCorteDAO = new TiposCorteDAO();
if ($TiposCorteDAO->getBycodigo($codigo) != null) {
    header($location . "?i=$idProducto&n=$nombre&d=$descripcion&er2");
    exit;
}
$TiposCorte->setIdProducto($idProducto);
$TiposCorte->setCodigo($codigo);
$TiposCorte->setNombre($nombre);
$TiposCorte->setDescripcion($descripcion);
$TiposCorte->setHabilitado(1);

$TiposCorteDAO->save($TiposCorte);


$location = "Location: ../../TiposCorte/TiposCorteList.php";
header($location . '?ok');
exit;
?>
