<?php
session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';

require_once '../php/dao/movimientosInventarioDAO.php';
require_once '../php/entities/movimientosInventarioPM.php';
require_once '../php/dao/empresasDAO.php';
require_once '../php/entities/empresas.php';
require_once '../php/dao/documentoInventarioPMDAO.php';
require_once '../php/entities/documentoInventarioPM.php';
require_once '../php/dao/facturasPMDAO.php';
require_once '../php/entities/facturasPM.php';


$movimientoInventarioDAO = new MovimientosInventarioDAO();
$movimientoInventario = new movimientosInventarioPM();
$empresasDAO = new empresasDAO();
$documentosDAO = new documentoInventarioPMDAO();
$tipoMovimientoDAO = new TiposMovimientoInventarioDAO();
$movimientoInventario = new movimientosInventarioPM();
$facturasPMDAO = new FacturasPMDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=FacturasPM.xls");
header("Pragma: no-cache");
header("Expires: 0");

$movimientoInventario = $movimientoInventarioDAO->getSearchFactu($_SESSION['all'], $_SESSION['campo'], $_SESSION['fechaingreso'], $_SESSION['id_cliente']);
?>
<table>
    <tr>

        <th>ID</th>
        <th>Tipo movimiento</th>
        <th>Fecha</th>
        <th>Cliente</th>
        <th>Facturado</th>
        <th>Consecutivo</th>

    </tr>
    <?php
    foreach ($movimientoInventario as $item):
        if ($item->getHabilitado() == 1):
            ?>
            <tr>
                <td><?= $item->getId() ?></td>
                <td><?= $tipoMovimientoDAO->getById($item->getIdTipoMovimientoInventarioPM())->getNombre() ?></td>
                <td><?= $item->getFechaRegistro() ?></td>
                <td><?php
        if ($item->getIdCliente() != null) {
            echo $empresasDAO->getById($item->getIdCliente())->getNombre();
        }
            ?></td>
                <td><?php
            if ($facturasPMDAO->getByIdDocumento($item->getIdDocumentoInventarioPM()) == null) {
                echo "No";
            } else {
                echo "Si";
            }
            ?></td>
                <td><?= $documentosDAO->getOne($item->getIdDocumentoInventarioPM())->getConsecutivo() ?></td>

            </tr>
            <?php
        endif;
    endforeach;
    ?>

</table>
