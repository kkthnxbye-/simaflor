<?php

session_start();
date_default_timezone_set("America/Bogota");

/* @Autor Brayan Acebo
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include '../dao/daoConnection.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';


include_once '../dao/movimientosInventarioDAO.php';
include_once '../entities/movimientosInventarioPM.php';
include_once '../dao/facturasPMDAO.php';
include_once '../entities/facturasPM.php';
include_once '../dao/inventariosPMDAO.php';
include_once '../entities/inventariosPM.php';

$id = $_GET['id'];

$movimientoInventarioDAO = new MovimientosInventarioDAO();
$movimientoInventario = new movimientosInventarioPM();
$inventarioDAO = new InventariosPMDAO();
$facturaDAO = new FacturasPMDAO();

$movimientoInventario = $movimientoInventarioDAO->getByIdDocumentoAll($id);

foreach ($movimientoInventario as $item) {
    $saldo = $inventarioDAO->getById($item->getIdInventarioPM())->getSaldo()+$item->getCantidad();
    $inventarioDAO->updateSaldo($item->getIdInventarioPM(), $saldo);
}

$movimientoInventarioDAO->updateEstadoFactura($id);
$facturaDAO->updateEstadoFactura($id);

header("location: ../../facturasPM/lista.php?ok");
exit();



