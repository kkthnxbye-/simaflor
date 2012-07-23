<?php
include_once '../php/dao/daoConnection.php';
include_once '../php/dao/applicationDAO.php';
include_once '../php/entities/application.php';

$aDAO = new applicationDAO();

$a = new Application();
$a = $aDAO->get();
?>
<?php foreach ($a as $l) { ?>
   <tr class="odd gradeX">
      <td><?php echo $l->getId(); ?></td>
      <td><?php echo $l->getVariable(); ?></td>
      <td><?php echo $l->getValor(); ?></td>                                         
      <td>
   <? //if ($modificar != 0) { ?>
               <a href="#" onclick="editar_(<?php echo $l->getId(); ?>)" class="btn_editar">

               <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div> 

               Editar</a>
   <? //} ?>
         <a onClick="return eliminar_(<?php echo $l->getId(); ?>)" href="#" class="btn_black">

            <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

            Eliminar</a>
      </td>
   </tr>
<?php } ?>
