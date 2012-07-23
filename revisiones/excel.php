<?php
session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';

$pedidosDAO = new pedidosDAO();
$pedidos = new pedidos();
$empresasDAO = new empresasDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$estadospedidoDAO = new estadospedidoDAO();
$productosDAO = new productosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Revisiones.xls");
header("Pragma: no-cache");
header("Expires: 0");

if (!empty($_SESSION['fincaproduccion'])) {
    $pedidos = $pedidosDAO->getsbybuscar_r("IDFincaProduccion", '', $_SESSION['fincaproduccion'], '');
} else {
    $pedidos = $pedidosDAO->getsbybuscar_r($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor'], '');
}
?>
<table>
    <tr>

        <td><b>ID</b></td>
        <td><b>Proveedor</b></td>
        <td><b>Material vegetal</b></td>
        <td><b>Producto</b></td>
        <td><b>Estado</b></td>
        <td><b>Servicio</b></td>

    </tr>
    <?php
    foreach ($pedidos as $pedido):
        if ($pedido->getEstadopedido() == 5):
            ?>
            <tr>
                <td><?= $pedido->getId(); ?></td>
                <td><?= $empresasDAO->getById($pedido->getFincaproveedor())->getNombre(); ?></td>

                <td><?= $materialesVegetalesDAO->getById($pedido->getMaterialvegetal())->getNombre(); ?></td>
                <td><?= $productosDAO->getById($pedido->getProducto())->getNombre(); ?></td>
                <td><?= $estadospedidoDAO->getById($pedido->getEstadopedido())->getNombre(); ?></td>
                <td>
                    <?php
                    if ($pedido->getServicio() != ""):
                        echo $serviciosDAO->getById($pedido->getServicio())->getNombre();
                    else:
                        echo 'Sin Servicio';
                    endif;
                    ?>
                </td>

            </tr>
        <?php endif;
    endforeach; ?>

</table>
