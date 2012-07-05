<?php
session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$pedidosDAO = new pedidosDAO();
$empresasDAO = new empresasDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$estadospedidoDAO = new estadospedidoDAO();
$productosDAO = new productosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Pedidos Cliente.xls");
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_SESSION['fincaproduccion'])) {
    $pedidos = $pedidosDAO->getsbybuscar("IDFincaCliente", '', $_SESSION['fincaproduccion'], $id__);
} else {
    $pedidos = $pedidosDAO->getsbybuscar($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor'], $id__);
}
?>
<table>
    <tr>

        <td>ID</td>
        <td>Proveedor</td>
        <td>Cliente</td>
        <td>Material vegetal</td>
        <td>Producto</td>
        <td>Estado</td>
        <td>Servicios</td>
        

    </tr>
    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= $pedido->getId(); ?></td>
            <td><?php echo $empresasDAO->getById($pedido->getFincaproveedor())->getNombre(); ?></td>
            <td><?php echo $empresasDAO->getById($pedido->getFincacliente())->getNombre(); ?></td>
            <td><?php echo $materialesVegetalesDAO->getById($pedido->getMaterialvegetal())->getNombre(); ?></td>
            <td><?php echo $productosDAO->getById($pedido->getProducto())->getNombre(); ?></td>
            <td><?php echo $estadospedidoDAO->getById($pedido->getEstadopedido())->getNombre(); ?></td>
            <td><?php echo $serviciosDAO->getById($pedido->getServicio())->getNombre(); ?></td>
        </tr>
    <?php endforeach; ?>

</table>
