<?php
session_start();

include '../php/dao/daoConnection.php';

include '../php/entities/sessionItem.php';

include '../php/dao/operariosDAO.php';
include '../php/dao/gruposOperariosDAO.php';

include '../php/entities/operarios.php';
include '../php/entities/gruposOperarios.php';

$id = $_POST['id'];

$listaSiembra = new SessionItem();

$daoOp = new operariosDAO();
$daoGr = new gruposOperariosDAO();

if (empty($_SESSION['itemcrear'])) {
   $listaSiembra = array();
} else {
   $listaSiembra = unserialize($_SESSION['itemcrear']);
}
?>
<thead>
   <tr>
      <th>Q a sembrar</th>
      <th>Operario(s)</th>
      <th>&nbsp;</th>
   </tr>
   <?php foreach($listaSiembra as $l): ?>
   <?php if($id == $l->getIdareaxbloque()): ?>
   <tr>
      <td><?php echo $l->getCantidad(); ?></td>
      <td><?php 
      if($l->getTipo() == 'Gr'){
         echo $daoGr->getById($l->getid_operario())->getNombre();
      }else{
         echo $daoOp->getById($l->getid_operario())->getNombre();
      }
      ?></td>
      <td><a href="#" class="btn btn_black">&nbsp;&nbsp;Eliminar</a></td>
   </tr>
   <?php endif; ?>
   <?php endforeach; ?>
</thead>