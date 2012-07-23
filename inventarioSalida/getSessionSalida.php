<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/inventariosPMDAO.php';
include '../php/entities/inventariosPM.php';

include '../php/dao/VariedadesDAO.php';
include '../php/entities/Variedades.php';

include '../php/dao/productosDAO.php';
include '../php/entities/productos.php';

include '../php/dao/materialesVegetalesDAO.php';
include '../php/entities/materialesVegetales.php';

include '../php/entities/sessionsalida.php';

$pdao = new productosDAO();
$mdao = new materialesVegetalesDAO();
$vdao = new VariedadesDAO();

$lista = new sessionsalida();

if(empty($_SESSION['entradatmp'])){
   $lista = array ();
}else{
   $lista = unserialize($_SESSION['entradatmp']);
}

?>

<table  cellpadding="0" cellspacing="0" border="0">
   <thead>
      <tr>
         <th>Pieza</th>
         <th>Material Vegetal</th>
         <th>Producto</th>
         <th>Variedad</th>
         <th>Fecha Vencimiento</th>
         <th>Cantidad</th>
         <th></th>
      </tr>
   </thead>
   <tbody>
      <?php $c = 0; ?>
      <?php $vencido = 0; ?>
      <?php foreach($lista as $l): ?>
      <tr>
         <td><?php echo $l->getPieza(); ?></td>
         <td><?php echo $mdao->getById($l->getVegetal())->getNombre(); ?></td>
         <td><?php echo $pdao->getById($l->getProducto())->getNombre(); ?></td>
         <td><?php echo $vdao->getById($l->getVariedad())->getNombre(); ?></td>
         <?php $l_ = explode(" ",$l->getFecha()); ?>
         <td>
            <?php if($l_[0] < date('Y-m-d')):
               $vencido = 1;
               $color = "red";
            else:
               $color = "black";
            endif; ?>
            <span style="color:<?php echo $color; ?>"><?php echo $l_[0]; ?></span>
         </td>
         <td><?php echo $l->getCantidad(); ?></td>
         <td>
            <button class="btn_editar" onclick="delSessionsalida(<?php echo $c; ?>)">&nbsp;&nbsp;Eliminar</button>
            
         </td>
      </tr>
      <?php $c++; ?>
      <?php endforeach; ?>
      <tr>
         <td>
         <input type="hidden" value="<?php echo $vencido; ?>" id="vencido">
         <input type="hidden" value="<?php echo $c; ?>" id="countah">
         </td>
      </tr>
   </tbody>
</table>