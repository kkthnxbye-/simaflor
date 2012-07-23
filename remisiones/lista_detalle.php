<?php
session_start();

include '../php/dao/daoConnection.php';
include '../php/entities/detalleRemision.php';
include '../php/dao/remisionesDAO.php';

include '../php/dao/VariedadesDAO.php';
include '../php/entities/Variedades.php';

$vDAO = new VariedadesDAO();
$rDAO = new remisionesDAO();

if (empty($_SESSION['detalle_remision'])) {
   $listadetalles = array();
} else {
   $listadetalles = unserialize($_SESSION['detalle_remision']);
}

$id = $_POST['idpedido'];

?>

<table  cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
   <thead>
      
      <tr>
         <th>Variedad</th>
         <th>Cantidad</th>
         <th>Cantidad Acumulada</th>
         <th>Opciones</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $sdt = 0;
      $totalG = 0;
      foreach ($listadetalles as $lis_det):
         ?>
   <?php $totalG+=$lis_det->getCantidad(); ?>
         <tr class="odd gradeX">
            <td class="center">
               <?php echo $lis_det->getIDVariedad(); ?>
            </td>
            <td>
               <?php echo $lis_det->getCantidad(); ?>
            </td>
            <td>
               <?php 
                  $suma = $rDAO->sumVariedades($id, $lis_det->getIDVariedad());
                  echo $suma;
               ?>
            </td>
            <td class="center">
               <a href="javascript:;" onclick="delete_detalleremision(<?php echo $sdt ?>)" class="btn_black">
                  <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 
                  Eliminar
               </a>
            </td>
         </tr>
   <?php $sdt++; endforeach; ?>
         <tr>
            <td colspan="4" align="center">
               
               <button class="btn btn-grey" onclick="saveremisiondetalle()">Guardar</button>
            </td>
         </tr>
   </tbody>
</table>