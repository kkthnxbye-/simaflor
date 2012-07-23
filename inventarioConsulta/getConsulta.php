<?php
session_start();

include '../php/dao/daoConnection.php';

include '../php/dao/documentoInventarioPMDAO.php';
include '../php/dao/inventariosPMDAO.php';
include '../php/dao/movimientosInventarioDAO.php';
include '../php/dao/productosDAO.php';
include '../php/dao/VariedadesDAO.php';
include '../php/dao/materialesVegetalesDAO.php';
include '../php/dao/TiposMovimientoInventarioDAO.php';
include '../php/dao/empresasDAO.php';
include '../php/dao/UsuariosDAO.php';

include '../php/entities/documentoInventarioPM.php';
include '../php/entities/inventariosPM.php';
include '../php/entities/movimientosInventarioPM.php';
include '../php/entities/productos.php';
include '../php/entities/Variedades.php';
include '../php/entities/materialesVegetales.php';
include '../php/entities/TiposMovimientoInventario.php';
include '../php/entities/empresas.php';
include '../php/entities/usuarios.php';

foreach($_POST as $key => $value){
   $$key = $value;
}

$daoD = new documentoInventarioPMDAO();
$daoI = new InventariosPMDAO();
$daoM = new MovimientosInventarioDAO();

$daoV = new materialesVegetalesDAO();
$daoP = new productosDAO();
$daoVa = new VariedadesDAO();
$daoU = new UsuariosDAO();
$daoE = new empresasDAO();

$inventario = new inventariosPM();
$inventario = $daoI->getById($pieza);

$movimientoInventario = new movimientosInventarioPM();
$movimientoInventario = $daoM->getByIdInventario($inventario->getId());

$documentoinventario = new DocumentoInventarioPM();

$tipomovimiento = new TiposMovimientoInventarioDAO();

foreach ($movimientoInventario as $get) {
   $movimiento = $tipomovimiento->getById($get->getIdTipoMovimientoInventarioPM());
   
   if($movimiento->getSuma() == 1){
      $usuarioEntrada = $get->getIdUsuario();
   }
}



?>
<table cellpadding="0" cellspacing="0" border="0">
   <thead>
      <tr>
         <td colspan="9"><h3>Informaci&oacute;n de la pieza.</h3></td>
      </tr>
      <tr>
         <td colspan="9">&nbsp;</td>
      </tr>
      <tr>
         <th>Pieza</th>
         <th>M. vegetal</th>
         <th>Variedad</th>
         <th>Producto</th>
         <th>Alias</th>
         <th>Fecha ingreso</th>
         <th>Fecha vencimiento</th>
         <th>Saldo</th>
         <th>Usuario</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td align="center"><?php echo $inventario->getId(); ?></td>
         <td align="center"><?php echo $daoV->getById($inventario->getIdMaterialVegetal())->getNombre(); ?></td>
         <td align="center"><?php echo $daoVa->getById($inventario->getIdVariedad())->getNombre(); ?></td>
         <td align="center"><?php echo $daoP->getById($daoVa->getById($inventario->getIdVariedad())->getIdProducto())->getNombre(); ?></td>
         <td align="center"><?php echo $inventario->getAliasItem(); ?></td>
         <td align="center"><?php echo substr($inventario->getFechaIngreso(),0,10); ?></td>
         <td align="center"><?php echo substr($inventario->getFechaVencimiento(),0,10); ?></td>
         <td align="center"><?php echo $inventario->getSaldo(); ?></td>
         <td align="center"><?php echo $daoU->getById($usuarioEntrada)->getNombre(); ?></td>
      </tr>
   </tbody>
</table>


<table cellpadding="0" cellspacing="0" border="0">
   <thead>
      <tr>
         <td colspan="9"><h4>Movimientos de la pieza.</h4></td>
      </tr>
      <tr>
         <td colspan="9">&nbsp;</td>
      </tr>
      <tr>
         <th>Consecutivo</th>
         <th>Fecha</th>
         <th>Tipo Movimiento</th>
         <th>Cantidad</th>
         <th>Cliente</th>
         <th>Usuario</th>
         <th>Anulado?</th>
         <th>&nbsp;</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach($movimientoInventario as $l): ?>
      <?php 
         $movimiento = $tipomovimiento->getById($l->getIdTipoMovimientoInventarioPM());
         $documentoinventario = $daoD->getOne($l->getIdDocumentoInventarioPM());
         
         if($movimiento->getSuma() == 0):
      ?>
      <tr>
         <td align="center"><?php echo $documentoinventario->getConsecutivo(); ?></td>
         <td align="center"><?php echo substr($l->getFechaRegistro(),0,10); ?></td>
         <td align="center"><?php echo $movimiento->getNombre(); ?></td>
         <td align="center"><?php echo $l->getCantidad(); ?></td>
         <td align="center"><?php echo $daoE->getById($l->getIdCliente())->getNombre(); ?></td>
         <td align="center"><?php echo $daoU->getById($l->getIdUsuario())->getNombre(); ?></td>
         <td align="center"><?php if($l->getHabilitado() == 1): echo 'No'; else: echo 'Si'; endif; ?></td>
         <td align="center">
            <?php if($l->getHabilitado() == 1): ?>
               <a href="#" onclick="anular(<?php echo $l->getId(); ?>)" class="btn btn_black">
                  &nbsp;&nbsp;Anular
               </a>
            <?php endif; ?>
         </td>
      </tr>
      <?php endif; ?>
      <?php endforeach; ?>
   </tbody>
</table>