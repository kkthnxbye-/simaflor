<?php
include '../php/dao/daoConnection.php';

include '../php/dao/empresasDAO.php';
include '../php/entities/empresas.php';

foreach ($_POST as $key => $value) {
   $$key = $value;
}

$daoE = new empresasDAO();

$lista = new empresas();
$lista = $daoE->getsbybuscar('todos', 'parte', $word);

if ($type == 'pro'):
   foreach ($lista as $l):
      if ($l->getEsProveedor() == 1):
         ?>
         <div class="fincadrop" 
              onclick="setData(<?php echo $l->getId(); ?>,'<?php echo $l->getNombre(); ?>',1);">
                 <?php echo $l->getNombre() . " / " . $l->getNit() ?>
         </div>
         <?php
      endif;
   endforeach;
else:
   foreach ($lista as $l):
      if ($l->getEsCliente() == 1):
         ?>
         <div class="fincadrop" 
              onclick="setData(<?php echo $l->getId(); ?>,'<?php echo $l->getNombre(); ?>',2);">
                 <?php echo $l->getNombre() . " / " . $l->getNit() ?>
         </div>
         <?php
      endif;
   endforeach;
endif;
?>