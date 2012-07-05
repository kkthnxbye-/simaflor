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

$location = "Location: ../../TiposCorte/TiposCortesEdit.php";

$id = $_POST['id'];
$idProducto = $_POST['idProducto'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if ($codigo == "" || $nombre == "") {

    header($location . '?er1');
    exit;
}


$TiposCorte = new TiposCorte();
$TiposCorte2 = new TiposCorte();
$TiposCorteDAO = new TiposCorteDAO();
$TiposCorte2 = $TiposCorteDAO->getByCodigo($codigo);

if ($TiposCorte2 != null) {
    if ($TiposCorte2->getId() != $id) {
        header($location . "?id=$id&er2");
        exit;
    }
}


$TiposCorte = $TiposCorteDAO->getById($id);
// Valida los no nulos.


$TiposCorte->setIdProducto($idProducto);
$TiposCorte->setCodigo($codigo);
$TiposCorte->setNombre($nombre);
$TiposCorte->setDescripcion($descripcion);
$TiposCorte->setHabilitado(1);

$TiposCorteDAO->update($TiposCorte);
$location = "Location: ../../TiposCorte/TiposCorteList.php";
header($location . '?ok');
exit;
?>