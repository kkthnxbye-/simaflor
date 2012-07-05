<?php
require_once '../php/clases.php';
$VariedadesDAO = new VariedadesDAO();
$detallepedidoDAO = new detallepedidoDAO();
$id = $_POST['id'];
$idEstado = $_POST['idEstado'];
$listadetalles = $detallepedidoDAO->getsbybuscar("IDPedido", "exacta", $id);
//$listadetalles=array();
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">

   <thead>

      <tr>

         <th>Fecha Entrega</th>

         <th>Fecha Recibido</th>

         <th>Variedad</th>

         <th>Cantidad</th>

         <th>Opciones</th>

      </tr>

   </thead>

   <tbody>
      <?php $totalG=0; ?>
      <?php foreach ($listadetalles as $lis_det) { ?>
      <?php $totalG+=$lis_det->getCantidad(); ?>
         <tr class="odd gradeX">

            <td><?php echo substr($lis_det->getFechaEntrega(), 0, 10); ?></td>

            <td><?php echo substr($lis_det->getFecharecibomaterial(), 0, 10); ?></td>

            <td><?php echo $VariedadesDAO->getById($lis_det->getVariedad())->getNombre(); ?></td>

            <td class="center"><?php echo $lis_det->getCantidad(); ?></td>

            <td class="center">
               <?php if ($idEstado == 1): ?>
                  <a href="javascript:;" 
                     onclick="detalle_eliminar(<?php echo $lis_det->getId(); ?>)" 
                     class="btn_black">

                     <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                     Eliminar
                  </a>
               <?php endif; ?>
            </td>

         </tr>

      <?php } ?>

      <tr>
         <td colspan="3" align="right">
            <strong style="color:red">Total:</strong>
         </td>
         <td><?php echo $totalG; ?></td>
         <td></td>
      </tr>

   </tbody>

</table>