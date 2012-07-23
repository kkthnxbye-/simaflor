<?php
session_start();
require_once '../php/clases.php';
include '../php/dao/revisionesDAO.php';
include '../php/entities/revisiones.php';

$operariosDAO = new operariosDAO();
$operarios = new operarios();
$causasDAO = new causasnacionalDAO();
$causas = new causasnacional();

$revisionesDAO = new RevisionesDAO();
$revisiones = new Revisiones();

$idPedido = $_POST['pedido_id'];

$causas = $causasDAO->gets();
$operarios = $operariosDAO->gets();
$revisiones = $revisionesDAO->getRevisionesByIdPerdido($idPedido);
?>


<form  id="lista_edit" onsubmit="return false;">
    <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">

        <thead>

            <tr>
                <th>ID</th>

                <th>Cantidad</th>

                <th>Operario</th>

                <th>Estado</th>

                <th>Causa</th>

                <th>Reclamar</th>

                <th>Habilitado</th>

            </tr>

        </thead>

        <tbody>


            <?php $cont = 1;
            foreach ($revisiones as $item): ?>

                <tr class="odd gradeX">

                    <td><input type="hidden" value="<?= $item->getId() ?>" name="id<?= $cont ?>" ><?= $item->getId() ?></td>

                    <td><input type="text" value="<?= $item->getCantidad() ?>" name="cant<?= $cont ?>" ></td>

                    <td>
                        <select size="1" class="medium"  name="idOperario<?= $cont ?>">

                            <?php foreach ($operarios as $itemOpe): ?>
                                <option value="<?= $itemOpe->getId() ?>" <?php if ($itemOpe->getId() == $item->getIdOperario()) {
                            echo 'selected';
                        } ?> ><?= $itemOpe->getNombre() ?></option>
    <?php endforeach; ?>
                        </select>
                    </td>

                    <td>
                        <select size="1" class="medium" name="estado<?= $cont ?>">
                            <option value="1" <?php if ($item->getEstaBueno() == 1) {
        echo "selected";
    } ?>>Bueno</option>
                            <option value="0" <?php if ($item->getEstaBueno() == 0) {
        echo "selected";
    } ?>>Malo</option>
                        </select>
                    </td>

                    <td>
                        <select size="1" class="medium" name="idCausaNacional<?= $cont ?>">
    <?php foreach ($causas as $itemCau): ?>
                                <option value="<?= $itemCau->getId() ?>" <?php if ($itemCau->getId() == $item->getIdCausaNacional()) {
            echo 'selected';
        } ?>><?= $itemCau->getNombre() ?></option>
    <?php endforeach; ?>
                        </select>
                    </td>

                    <td>
                        <select size="1" class="medium" name="desechado<?= $cont ?>">
                            <option value="1" <?php if ($item->getDesechado() == 1) {
        echo "selected";
    } ?>>Si</option>
                            <option value="0" <?php if ($item->getDesechado() == 0) {
        echo "selected";
    } ?>>No</option>
                        </select>
                    </td>

                    <td>
                        <select size="1" class="medium"  name="habilitado<?= $cont ?>">
                            <option value="1" <?php if ($item->getHabilitado() == 1) {
                echo "selected";
            } ?>>Si</option>
                            <option value="0" <?php if ($item->getHabilitado() == 0) {
                echo "selected";
            } ?>>No</option>
                        </select>
                    </td>

                </tr>
        <input type="hidden" name="canTotal" value="<?= $cont ?>">
        

    <?php $cont++;
endforeach; ?>

        </tbody>

    </table>


    <button type="submit" class="btn btn-grey" style="margin: 15px 8px 8px 8px" >Guardar</button>
</form>

<script>
    $(function(){
        $(document).on('submit', '#lista_edit', function(e){
            e.preventDefault();
                            
            var data = $(this).serialize();
                            
            $.ajax({
                url:'../php/action/revisionesEdit.php',
                type:'POST',
                data: data,
                success:function(resp){
                                
                    if(resp == 1){
                        $(function(){  msn.ok().mostrar('Proceso Exitoso.');  }); 
                        carga_lista_detalle_edit();
                    }else{
                        $(function(){  msn.error().mostrar('Ha ocurrido un error inesperado, recargue la pagina y vuelva a intentarlo es posible que el sistema no halla guardado algunos cambios.');  });
                    }
                }
            });
                            
            return false;
        });
    });

</script>