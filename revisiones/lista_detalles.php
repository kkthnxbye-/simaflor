<?php
session_start();
require_once '../php/clases.php';
include '../php/entities/revisiones.php';


if (empty($_SESSION['lista_revisiones'])) {
    $listadetalles = new Revisiones();
} else {
    $listadetalles = unserialize($_SESSION['lista_revisiones']);
}
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">

    <thead>

        <tr>

            <th>Cantidad</th>

            <th>Operario</th>

            <th>Estado</th>

            <th>Causa nacional</th>

            <th>Reclamar</th>

            <th>Habilitado</th>

            <th>Opciones</th>

        </tr>

    </thead>

    <tbody>


        <?php $sdt=1;foreach ($listadetalles as $lis_det) { ?>

            <tr class="odd gradeX">

                <td><?= $lis_det->getCantidad(); ?></td>

                <td><?= $lis_det->getEstaBueno(); ?></td>

                <td><?= $lis_det->getDesechado(); ?></td>

                <td><?= $lis_det->getIdCausaNacional(); ?></td>

                <td><?= $lis_det->getIdOperario(); ?></td>

                <td><?= $lis_det->getHabilitado(); ?></td>


                <td class="center">
                    <a href="javascript:;" onclick="detalle_eliminar(<?php echo $sdt ?>)" class="btn_black">

                        <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                        Eliminar
                    </a>
                </td>

            </tr>

        <?php $sdt++;} ?>

    </tbody>

</table>


<button class="btn btn-grey" style="margin: 15px 8px 8px 8px">Guardar</button>