<?php
session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$pedidosDAO = new pedidosDAO();
$pedidos = new pedidos();
$empresasDAO = new empresasDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Pedidos por cliente.xls");
header("Pragma: no-cache");
header("Expires: 0");


if (isset($_SESSION['fincaproduccion'])) {
    $pedidos = $pedidosDAO->getsbybuscar("IDFincaProduccion", '', $_SESSION['fincaproduccion']);
} else {

    $pedidos = $pedidosDAO->getsbybuscar($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
}
?>
<table>
    <tr>
        <td><b>ID</b></td>
        <td><b>Proveedor</b></td>
        <td><b>Cliente</b></td>
        <td><b>Material Vegetal</b></td>
        <td><b>Producto</b></td>
        <td><b>Estado</b></td>
        <td><b>Servicio</b></td>
    </tr>
    <?php
    foreach ($pedidos as $item) {
        ?>
        <tr>
            <td><?= $item->getId() ?></td>
            <td><?= $empresasDAO->getById($item->getFincaproveedor())->getNombre(); ?></td>
            <td><?= $empresasDAO->getById($item->getFincacliente())->getNombre(); ?></td>
            <td><?= $materialesVegetalesDAO->getById($item->getMaterialvegetal())->getNombre(); ?></td>
            <td><?= $productosDAO->getById($item->getProducto())->getNombre(); ?></td>
            <td><?= $estadospedidoDAO->getById($item->getEstadopedido())->getNombre(); ?></td>
            <td><?= $serviciosDAO->getById($item->getServicio())->getNombre(); ?></td>
        </tr>
    <?php } ?>

</table>
