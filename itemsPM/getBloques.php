<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/bloquespmxfincaDAO.php';
include '../php/entities/bloquespmxfinca.php';

include '../php/dao/areaspmxbloquepmDAO.php';
include '../php/entities/areaspmxbloquepm.php';

include '../php/dao/TiposAreaPMDAO.php';
include '../php/entities/TiposAreaPM.php';

include '../php/entities/sessionItem.php';

foreach ($_POST as $key => $value) {
   $$key = $value;
}

$listaSiembra = new SessionItem();

if (empty($_SESSION['itemcrear'])) {
   $listaSiembra = array();
} else {
   $listaSiembra = unserialize($_SESSION['itemcrear']);
}

$daoBXF = new bloquespmxfincaDAO();
$daoAXB = new areaspmxbloquepmDAO;
$daoA = new TiposAreaPMDAO();

$bloque = $daoBXF->getById($id);
$areas = $daoAXB->getAreas($id);
?>

<table>
   <tr>
      <td><strong><?php echo $bloque->getNombre(); ?>:</strong></td>
   </tr>
</table>
<?php $area_id = 0; ?>
<?php foreach ($areas as $a): ?>
   <?php $area = $daoA->getById($a->getIdTipoArea()); ?>
   <?php $areasxbloque = $daoAXB->getsbybuscar($id, 'IDTipoArea', '', $area->getNombre()); ?>        
   <table cellpadding="0" cellspacing="0" border="0">
      <thead>
         <tr>
            <td colspan="6">
               <?php echo $area->getNombre(); ?>
            </td>
         </tr>

         <tr>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Q sembrada</th>
            <th>% Sembrado</th>
            <th>Q a sembrar</th>
            <th>Acci&oacute;n</th>
         </tr>

      </thead>
      <tbody>
         <?php foreach ($areasxbloque as $axb): ?>
            <?php $Qsembrar = 0; ?>
            <?php foreach ($listaSiembra as $l): ?>
               <?php //$data = $daoAXB->getById($l->getIdareaxbloque()); ?>
               <?php //$name = $daoA->getById($data->getIdTipoArea())->getNombre(); ?>
               <?php if ($l->getIdareaxbloque() == $axb->getId()): ?>
                  <?php $Qsembrar+=$l->getCantidad(); ?>
               <?php endif; ?>
            <?php endforeach; ?>
            <?php $disponibilidad = $axb->getCapacidad()-$Qsembrar; ?>
            <?php if($disponibilidad >= 1): ?>
            <tr>
               <td><?php echo $axb->getNombre(); ?></td>
               <td><?php echo $axb->getCapacidad(); ?></td>
               <td><?php echo '0'; ?></td>
               <td><?php echo '0%'; ?></td>
               <td>
                  <?php echo $Qsembrar ?>
               </td>
               <td><a onclick="openWindow(<?php echo $axb->getId(); ?>);" class="btn btn_black">&nbsp;&nbsp;Editar Siembra</a></td>
            </tr>
            <?php endif; ?>
         <?php endforeach; ?>
      </tbody>
   </table>

   <?php if ($area->getId() != $area_id): ?>
      <br/><br/>
   <?php endif; ?>

<?php endforeach; ?>

<table cellpadding="0" cellspacing="0" border="0">
   <tr>
      <td><a href="#finish" onclick="finish();" class="btn btn_black">&nbsp;&nbsp;Finalizar</a></td>
   </tr>
</table>