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

// Valida los no nulos.

    $TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
    $TiposDocumentoXTipoMovimientoInventarioDAO = new TiposDocumentoXTipoMovimientoInventarioDAO();
    $TiposDocumentoXTipoMovimientoInventario->setTipoDocumento($tipoDocumento);
    $TiposDocumentoXTipoMovimientoInventario->setTipoMovimientoInventario($tipoMovimientoInventario);


    $TiposDocumentoXTipoMovimientoInventarioDAO->save($TiposDocumentoXTipoMovimientoInventario);
$location = "Location: ../../TiposDocumentosInventarios/TiposDocumentosInventariosList.php";
header($location . '?ok1');
exit;
?>
