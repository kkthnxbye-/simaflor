<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/operariosDAO.php';
include '../php/dao/operariosXFincaDAO.php';

include '../php/entities/operarios.php';
include '../php/entities/operariosXFinca.php';

include '../php/dao/gruposOperariosDAO.php';
include '../php/entities/gruposOperarios.php';

foreach ($_POST as $key => $value) {
   $$key = $value;
}

$daoO = new operariosDAO();
$daoOXF = new operariosXFincaDAO();
$daoG = new gruposOperariosDAO();

$listaOp = $daoO->getsbybuscar('todos', 'parte', $word);
$listaOp2 = $daoOXF->getsbybuscar($_SESSION['fincaproduccion'], '', '', '');
$listaGr = $daoG->getsbybuscar('todos', 'parte', $word);

foreach ($listaOp as $lop) {
   foreach ($listaOp2 as $lop2) {
      if ($lop->getId() == $lop2->getIdOperario()) {
         ?>
         <div class="fincadrop" onclick="setSessionData(<?php echo $lop->getId() ?>,'<?php echo $lop->getNombre() ?>','Op')">
            <?php echo $lop->getNombre(); ?>
         </div>
         <?php
      }
   }
}

foreach ($listaGr as $lgr) {
   ?>
   <div class="fincadrop" onclick="setSessionData(<?php echo $lgr->getId() ?>,'<?php echo $lgr->getNombre() ?>','Gr')">
      <?php echo $lgr->getNombre(); ?>
   </div>
   <?php
}
?>
