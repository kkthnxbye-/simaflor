<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposDocumentoXTipoMovimientoInventarioDAO.php';
include '../entities/TiposDocumentoXTipoMovimientoInventario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../TiposDocumentosInventarios/TiposDocumentosInventariosList.php";

$TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
$TiposDocumentoXTipoMovimientoInventarioDAO = new TiposDocumentoXTipoMovimientoInventarioDAO();
$TiposDocumentoXTipoMovimientoInventario = $TiposDocumentoXTipoMovimientoInventarioDAO->getById($id);
// Valida los no nulos.


$TiposDocumentoXTipoMovimientoInventario->setTipoDocumento($tipoDocumento);
$TiposDocumentoXTipoMovimientoInventario->setTipoMovimientoInventario($tipoMovimientoInventario);
$TiposDocumentoXTipoMovimientoInventarioDAO->update($TiposDocumentoXTipoMovimientoInventario);

header($location . '?ok2');
exit;

?>