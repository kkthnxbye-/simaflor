<?php
session_start();
require_once '../php/clases.php';
include '../php/dao/notasXPedidoDAO.php';
include '../php/entities/notasXPedido.php';

$variedadDAO = new VariedadesDAO();
$variedad = new Variedades();

$notasDAO = new NotasXPedidoDAO();
$notas = new NotasXPedido();

$idPedido = $_POST['pedido_id'];

$notas = $notasDAO->getNotasXPedidoAll($idPedido);
?>


<form  id="lista_edit" onsubmit="return false;">
    <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">

        <thead>

            <tr>
                <th>ID</th>

                <th>Variedad</th>

                <th>Nota</th>

                <th>Fecha de publicaci&oacute;n</th>

                <th>Opciones</th>

            </tr>

        </thead>

        <tbody>


            <?php foreach ($notas as $item): ?>

                <tr class="odd gradeX">

                    <td><?= $item->getId() ?></td>

                    <td><?= $variedadDAO->getById($item->getIdVariedad())->getNombre() ?></td>
                    
                    <td><?= $item->getNota() ?></td>
                    
                    <td><?= $item->getFechaRegistro() ?></td>
                    
                    <td>
                        <button class="btn btn-black" onclick="detalle_eliminar(<?= $item->getId() ?>)">Eliminar</button>
                    </td>
                </tr>
            


        <?php endforeach; ?>

        </tbody>

    </table>


    
</form>

