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


include '../dao/revisionesDAO.php';
include '../entities/revisiones.php';

include '../dao/applicationDAO.php';
include '../entities/application.php';

include '../dao/pedidosDAO.php';
include '../entities/pedidos.php';

include '../dao/enrutamientoprocesoDAO.php';
include '../entities/enrutamientoproceso.php';

include '../dao/documentoInventarioPMDAO.php';
include '../entities/documentoInventarioPM.php';

include '../dao/inventariosPMDAO.php';
include '../entities/inventariosPM.php';

include '../dao/configuracionxvariedadDAO.php';
include '../entities/configuracionxvariedad.php';

include '../dao/movimientosInventarioDAO.php';
include '../entities/movimientosInventarioPM.php';



$objPedidosDAO = new pedidosDAO();
$objPedidos = new pedidos();

$objApplicationDAO = new applicationDAO();
$objApplication = new Application();

$enrutamientoProcesoDAO = new enrutamientoprocesoDAO();
$enrutamientoProceso = new enrutamientoproceso();

$revisionesDAO = new RevisionesDAO();
$revisiones = new Revisiones();

$docmentosDAO = new documentoInventarioPMDAO();
$docmentos = new DocumentoInventarioPM();

$inventarioDAO = new InventariosPMDAO();
$inventario = new inventariosPM();

$confVariedadDAO = new configuracionxvariedadDAO();

$movimientoInventarioDAO = new MovimientosInventarioDAO();
$movimientoInventario = new movimientosInventarioPM();


foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if (empty($_SESSION['lista_revisiones'])) {
    $listadetalles = array();
} else {
    $listadetalles = unserialize($_SESSION['lista_revisiones']);
}

$objPedidos = $objPedidosDAO->getById($pedidoId);
$objApplication = $objApplicationDAO->getOne(1);
$procesoOrigen = $objApplication->getValor();
$objApplication = $objApplicationDAO->getOne(2);
$procesoDestino = $objApplication->getValor();

$enrutamientoProceso->setIdFinca($objPedidos->getFincaProduccion());
$enrutamientoProceso->setIdProducto($objPedidos->getProducto());
$enrutamientoProceso->setIdServicio($objPedidos->getServicio());
$enrutamientoProceso->setIdMaterialVegetal($objPedidos->getMaterialvegetal());
$enrutamientoProceso->setIdProcesoOrigen($procesoOrigen);
$enrutamientoProceso->setIdProcesoDestino($procesoDestino);
$idTipoMovimientoInventario = $enrutamientoProcesoDAO->getIdTipoMovimientoInventarioPM($enrutamientoProceso);

if ($idTipoMovimientoInventario == null) {

    foreach ($listadetalles as $item) {

        if ($item->getHabilitado() == "on") {
            $habilitado = 1;
        } else {
            $habilitado = 0;
        }
        $revisiones->setIdPedidoPm($pedidoId);
        $revisiones->setIdVariedad($item->getIdVariedad());
        $revisiones->setIdGrado($item->getIdGrado());
        $revisiones->setCantidad($item->getCantidad());
        $revisiones->setEstaBueno($item->getEstaBueno());
        $revisiones->setDesechado($item->getDesechado());
        $revisiones->setIdCausaNacional($item->getIdCausaNacional());
        $revisiones->setIdOperario($item->getIdOperario());
        $revisiones->setIdUsuario($idUsuario);
        $revisiones->setHabilitado($habilitado);
        $revisiones->setIdTipoUnidadPM($item->getIdTipoUnidadPM());
        $revisiones->setIdInventarioPM('null');
        $revisionesDAO->save($revisiones);
    }
    unset($_SESSION['lista_revisiones']);
    echo "1";
} else {
    $saldo = 0;
    $day = 0;
    $idVariedad = 0;
    $idGrado = 0;
    $idTipoUnidad = 0;

    foreach ($listadetalles as $item) {

        $saldo += $item->getCantidad();
        $idVariedad = $item->getIdVariedad();
        $idGrado = $item->getIdGrado();
        $idTipoUnidad = $item->getIdTipoUnidadPM();
    }


    $day = $confVariedadDAO->getValorConf($idVariedad);

    $consecutivo = $docmentosDAO->get('IDFinca', $objPedidos->getFincaProduccion(), 'MAX', 'consecutivo');
    $fecha = date('m/d/Y H:i:s');

    $docmentos->setIdFinca($objPedidos->getFincaProduccion());
    $docmentos->setIdTipoMovimientoInventarioPM($idTipoMovimientoInventario);
    $docmentos->setConsecutivo($consecutivo+1);
    $docmentos->setFecha($fecha);
    $docmentosDAO->save($docmentos);
    $idDocumento = $docmentosDAO->getLastId();

    $inventario->setNoSegimiento('null');
    $inventario->setIdFincaProduccion($objPedidos->getFincaProduccion());
    $inventario->setIdFincaProveedor($objPedidos->getFincaproveedor());
    $inventario->setIdMaterialVegetal($objPedidos->getMaterialvegetal());
    $inventario->setIdVariedad($idVariedad);
    $inventario->setIdTipoUnidadPM($idTipoUnidad);
    $inventario->setIdCiclo($objPedidos->getCiclo());
    $inventario->setAliasItem('null');
    $inventario->setFechaIngreso($fecha);
    $inventario->setFechaVencimiento(add_date($fecha, $day));
    $inventario->setIdGrado($idGrado);
    $inventario->setSaldo($saldo);
    $inventario->setIdCliente($objPedidos->getFincacliente());
    $inventarioDAO->save($inventario);
    
    $idInventario = $inventarioDAO->getLastId();
    
    foreach ($listadetalles as $item) {

        if ($item->getHabilitado() == "on") {
            $habilitado = 1;
        } else {
            $habilitado = 0;
        }
        $revisiones->setIdPedidoPm($pedidoId);
        $revisiones->setIdVariedad($item->getIdVariedad());
        $revisiones->setIdGrado($item->getIdGrado());
        $revisiones->setCantidad($item->getCantidad());
        $revisiones->setEstaBueno($item->getEstaBueno());
        $revisiones->setDesechado($item->getDesechado());
        $revisiones->setIdCausaNacional($item->getIdCausaNacional());
        $revisiones->setIdOperario($item->getIdOperario());
        $revisiones->setIdUsuario($idUsuario);
        $revisiones->setHabilitado($habilitado);
        $revisiones->setIdTipoUnidadPM($item->getIdTipoUnidadPM());
        $revisiones->setIdInventarioPM($idInventario);
        $revisionesDAO->save($revisiones);
        
    }
    
    
    
    
    $movimientoInventario->setIdInventarioPM($idInventario);
    $movimientoInventario->setIdTipoMovimientoInventarioPM($idTipoMovimientoInventario);
    $movimientoInventario->setIdCliente('null');
    $movimientoInventario->setCantidad($saldo);
    $movimientoInventario->setFechaRegistro(date('Y-m-d'));
    $movimientoInventario->setIdUsuario($idUsuario);
    $movimientoInventario->setIdDocumentoInventarioPM($idDocumento);
    $movimientoInventario->setHabilitado(1);
    $movimientoInventarioDAO->save($movimientoInventario);
    unset($_SESSION['lista_revisiones']);
    echo "1";
}

function add_date($givendate, $day, $mth = 0, $yr = 0) {
    $cd = strtotime($givendate);
    $newdate = date('Y/m/d', mktime(date('h', $cd),
    date('i', $cd), date('s', $cd), date('m', $cd)+$mth,
    date('d', $cd)+$day, date('Y', $cd)+$yr));
    return $newdate;
}
