<?php
session_start();
require_once '../php/clases.php';
include '../php/entities/revisiones.php';

$operariosDAO =  new operariosDAO();
$operarios =  new operarios(); 
$causasDAO =  new causasnacionalDAO();
$causas =  new causasnacional(); 



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

            <th>Causa</th>

            <th>Reclamar</th>

            <th>Opciones</th>

        </tr>

    </thead>

    <tbody>


        <?php $sdt=1;foreach ($listadetalles as $lis_det) { ?>

            <tr class="odd gradeX">
                
                
                <td><?= $lis_det->getCantidad(); ?></td>

                <td><?= $operariosDAO->getById($lis_det->getIdOperario())->getNombre(); ?></td>

                <td><?php if($lis_det->getEstaBueno() == 1 ){echo "Bueno";}else{echo "Malo";} ?></td>

                <td><?php if($lis_det->getIdCausaNacional() != 'null'){echo $causasDAO->getById($lis_det->getIdCausaNacional())->getNombre();}else{echo "Indefinido";}  ?></td>

                <td><?php if($lis_det->getDesechado() != 'null'){if($lis_det->getDesechado() == 1 ){echo "Si";}else{echo "No";}}else{echo "Indefinido";} ?></td>

                <td class="center">
                    <a href="javascript:;" onclick="detalle_eliminar(<?php echo $sdt ?>)" class="btn_black" title="Eliminar Item">

                        <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                        Eli..
                    </a>
                </td>

            </tr>

        <?php $sdt++;} ?>

    </tbody>

</table>


<button class="btn btn-grey" style="margin: 15px 8px 8px 8px" onclick="saveRevision()">Fin Unidad</button>