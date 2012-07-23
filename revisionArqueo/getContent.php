<?php
session_start();

include '../php/dao/daoConnection.php';

include '../php/dao/UsuariosDAO.php';
include '../php/entities/usuarios.php';

include '../php/dao/arqueoInventarioPMDAO.php';
include '../php/entities/arqueoInventarioPM.php';


foreach($_POST as $key => $value){
   $$key = $value;
}

$daoA = new ArqueoInventarioPMDAO();
$daoU = new UsuariosDAO();

$Alist = $daoA->get('IDFinca',$finca,'verificado',$verificado);
//echo '<pre>';
//print_r($Alist);
//echo '</pre>';
//exit;
?>
<table cellpadding="0" cellspacing="0" border="0">
   <thead>
      <tr>
         <th>ID</th>
         <th>Fecha</th>
         <th>Usuario</th>
         <th>Estado</th>
         <th>&nbsp;</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($Alist as $a): ?>
         <tr>
            <td><?php echo $a->getId(); ?></td>
            <td><?php echo substr($a->getFecha(),0,10); ?></td>
            <td><?php echo $daoU->getById($a->getIdUsuario())->getNombre(); ?></td>
            <td><?php if($a->getVerificado() == 0): echo 'Sin revisar'; else: echo 'Revisado'; endif; ?></td>
            <td>
               <?php if($a->getVerificado() == 0): ?>
               <a href="#" onclick="revision(<?php echo $a->getId(); ?>);" class="btn btn_black">&nbsp;&nbsp;Revisar</a>
               <?php endif; ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>