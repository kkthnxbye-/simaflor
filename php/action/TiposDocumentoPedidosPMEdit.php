<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposDocumentoPedidosPMDAO.php';
include '../entities/TiposDocumentoPedidosPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

$location = "Location: ../../TiposDocumentoPedidosPM/TiposDocumentoPedidosPMEdit.php";

if ($codigo == "" || $nombre == "") {
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&id=$id&er1");
    exit;
}

$TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
$TiposDocumentoPedidosPM2 = new TiposDocumentoPedidosPM();
$TiposDocumentoPedidosPMDAO = new TiposDocumentoPedidosPMDAO();

$TiposDocumentoPedidosPM2 = $TiposDocumentoPedidosPMDAO->getBycodigo($codigo);

if ($TiposDocumentoPedidosPM2 != null) {

    if ($TiposDocumentoPedidosPM2->getId() != $id) {

        header($location . "?id=$id&er2");
        exit;
    }
}


$TiposDocumentoPedidosPM = $TiposDocumentoPedidosPMDAO->getById($id);
// Valida los no nulos.


$TiposDocumentoPedidosPM->setCodigo($codigo);
$TiposDocumentoPedidosPM->setNombre($nombre);
$TiposDocumentoPedidosPM->setDescripcion($descripcion);
$TiposDocumentoPedidosPM->setHabilitado(1);

$TiposDocumentoPedidosPMDAO->update($TiposDocumentoPedidosPM);

$location = "Location: ../../TiposDocumentoPedidosPM/TiposDocumentoPedidosPMList.php";
header($location . '?ok');
exit;
?>