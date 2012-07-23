<?php
session_start();

include '../php/dao/daoConnection.php';


include '../php/dao/arqueoInventarioPMDAO.php';
include '../php/entities/arqueoInventarioPM.php';

include '../php/dao/detalleArqueoInventarioPMDAO.php';
include '../php/entities/detalleArqueoInventarioPM.php';

include '../php/dao/VariedadesDAO.php';
include '../php/entities/Variedades.php';

include '../php/dao/productosDAO.php';
include '../php/entities/productos.php';

include '../php/dao/materialesVegetalesDAO.php';
include '../php/entities/materialesVegetales.php';

include '../php/dao/ciclosDAO.php';
include '../php/entities/ciclos.php';

include '../php/dao/TiposUnidadesPMDAO.php';
include '../php/entities/TiposUnidadesPM.php';

include '../php/dao/movimientosInventarioDAO.php';
include '../php/entities/movimientosInventarioPM.php';

include '../php/dao/TiposMovimientoInventarioDAO.php';
include '../php/entities/TiposMovimientoInventario.php';

include '../php/dao/UsuariosDAO.php';
include '../php/entities/usuarios.php';

include '../php/entities/detalleArqueoInventarioPMJOIN.php';

include '../php/dao/inventariosPMDAO.php';
include '../php/entities/inventariosPM.php';

foreach ($_POST as $key => $value) {
   $$key = $value;
}

function dump($a){
   echo '<pre>';
   print_r($a);
   echo '</pre>';
}




/*Dao's*/

$daoD = new detalleArqueoInventarioPMDAO();
$daoI = new InventariosPMDAO();
$daoV = new VariedadesDAO();
$daoP = new productosDAO();
$daoM = new materialesVegetalesDAO();
$daoC = new ciclosDAO();
$daoU = new TiposUnidadesPMDAO();
$daoMI = new MovimientosInventarioDAO();
$daoUS = new UsuariosDAO();
$daoT = new TiposMovimientoInventarioDAO();

$archivos = $daoD->getWithArqueo('IDArqueoInventarioPM', $idArqueo,$finca);
$inventarios = $daoI->getFinca($finca);

/*Lista de ID's Que vienen de un archivo*/
$listaArchivo = array();

foreach ($archivos as $archivo) {
   $listaArchivo[] = $archivo->getIdInventarioPM();
}

/*Lista de ID's que estan en la tabla Inventario con saldo mayor a cero*/
$listaInventarioMayoresCero = array();

foreach ($inventarios as $inventarioMayoresCero) {
   if($inventarioMayoresCero->getIdFincaProduccion() == $finca){
      if($inventarioMayoresCero->getSaldo() > 0){
         $listaInventarioMayoresCero[] = $inventarioMayoresCero->getId();
      } 
   }
}

/*Lista de ID's que estan en la tabla Inventario con saldo igual a cero*/
$listaInventarioIgualCero = array();

foreach ($inventarios as $inventarioIgualCero) {
   if($inventarioIgualCero->getIdFincaProduccion() == $finca){
      if($inventarioIgualCero->getSaldo() == 0){
         $listaInventarioIgualCero[] = $inventarioIgualCero->getId();
      } 
   }
}




$uno = array();
$dos = array();
$tre = array();


/*quito valores repetidos e imprimo*/
$listaArchivo = array_unique($listaArchivo);
$listaInventarioMayoresCero = array_unique($listaInventarioMayoresCero);
$listaInventarioIgualCero = array_unique($listaInventarioIgualCero);
$uno = array_unique($uno);
$dos = array_unique($dos);
$tre = array_unique($tre);


/*******************************************************************************/

foreach($listaArchivo as $la){
   if(!in_array($la,$listaInventarioMayoresCero)){
      $uno[] = $la;
   }
}

/*******************************************************************************/

/*******************************************************************************/

foreach($listaInventarioMayoresCero as $li){
   if(!in_array($li,$listaArchivo)){
      $tre[] = $li;
   }
}

/*******************************************************************************/

//dump($listaArchivo);
//dump($listaInventarioMayoresCero);
//echo "<hr>";
//dump($uno);
//echo "<hr>";
//dump($listaInventarioIgualCero);
//echo "<hr>";
//dump($tre);
?>
<table cellspacing="0" cellpadding="0" border="0">
   <thead>
      <tr>
         <td colspan="9"></td>
         <td>
            <a id="refescar" class="btn btn_black" onclick="revision(<?php echo $idArqueo; ?>)">&nbsp;&nbsp;Refrescar pantalla</a>
         </td>
      </tr>
      <tr>
         <td colspan="10">
            <strong>Piezas que no estan en el sistema:</strong><br>
            <?php echo implode(',',$uno); ?>
         </td>
      </tr>
      <tr>
         <td colspan="10">&nbsp;</td>
      </tr>
      <tr>
         <td colspan="10">
            <strong>Piezas que no estan en el inventario pero si en sistema:</strong>
         </td>
      </tr>
      <?php if(count($listaInventarioIgualCero) > 0): ?>
      <tr>
         <td colspan="9" align="right"></td>
         <td><a href="exceldos.php?data=<?php echo implode(',',$listaInventarioIgualCero); ?>" class="btn btn_black">&nbsp;&nbsp;Excel</a></td>
      </tr>
      <?php endif; ?>
      <tr>
         <th>ID</th>
         <th>Variedad</th>
         <th>Producto</th>
         <th>Mat. vegetal</th>
         <th>Ciclo</th>
         <th>Unidad</th>
         <th>Fecha entrega</th>
         <th>Fecha vencimiento</th>
         <th>Saldo/cantidad</th>
         <th>Usuario</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach($listaInventarioIgualCero as $cero): ?>
      <?php $data = $daoI->getById($cero); ?>
       <?php $data2 = $daoMI->getByIdInventario($cero); ?>
         
         <?php foreach($data2 as $d2): ?>
            <?php $idMovIn = $d2->getIdTipoMovimientoInventarioPM(); ?>
            <?php $dataTipo = $daoT->getById($idMovIn); ?>
            <?php if($dataTipo->getSuma() == 0): ?>
            <?php $idUsuario = $d2->getIdUsuario(); ?>
            <?php $cantidad = $d2->getCantidad(); ?>
            <?php endif; ?>

         <?php endforeach; ?>
       <tr>
            <td><?php echo $data->getId(); ?></td>
            <td><?php echo $daoV->getById($data->getIdVariedad())->getNombre(); ?></td>
            <td><?php echo $daoP->getById($daoV->getById($data->getIdVariedad())->getIdProducto())->getNombre(); ?></td>
            <td><?php echo $daoM->getById($data->getIdMaterialVegetal())->getNombre(); ?></td>
            <td><?php echo $daoC->getById($data->getIdCiclo())->getNombre(); ?></td>
            <td><?php echo $daoU->getById($data->getIdTipoUnidadPM())->getNombre(); ?></td>
            <td><?php echo substr($data->getFechaIngreso(),0,10); ?></td>
            <td><?php echo substr($data->getFechaVencimiento(),0,10); ?></td>
            <td><?php echo $data->getSaldo(); ?>/<?php echo $cantidad ?></td>
            <td><?php echo $daoUS->getById($idUsuario)->getNombre(); ?></td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>

<table cellspacing="0" cellpadding="0" border="0">
   <thead>
      <tr>
         <td colspan="10">
            <strong>Piezas sin scann:</strong>
         </td>
      </tr>
      <?php if(count($tre) > 0): ?>
      <tr>
         <td colspan="9" align="right"></td>
         <td><a href="exceldos.php?data=<?php echo implode(',',$tre); ?>" class="btn btn_black">&nbsp;&nbsp;Excel</a></td>
      </tr>
      <?php endif; ?>
      <tr>
         <th>ID</th>
         <th>Variedad</th>
         <th>Producto</th>
         <th>Mat. vegetal</th>
         <th>Ciclo</th>
         <th>Unidad</th>
         <th>Fecha entrega</th>
         <th>Fecha vencimiento</th>
         <th>Saldo/cantidad</th>
         <th>Usuario</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach($tre as $t): ?>
       <?php $data = $daoI->getById($t); ?>
         <?php $data2 = $daoMI->getByIdInventario($t); ?>
         
         <?php foreach($data2 as $d2): ?>
            <?php $idMovIn = $d2->getIdTipoMovimientoInventarioPM(); ?>
            <?php $dataTipo = $daoT->getById($idMovIn); ?>
            <?php if($dataTipo->getSuma() == 0): ?>
            <?php $idUsuario = $d2->getIdUsuario(); ?>
            <?php $cantidad = $d2->getCantidad(); ?>
            <?php endif; ?>

         <?php endforeach; ?>
       <tr>
            <td><?php echo $data->getId(); ?></td>
            <td><?php echo $daoV->getById($data->getIdVariedad())->getNombre(); ?></td>
            <td><?php echo $daoP->getById($daoV->getById($data->getIdVariedad())->getIdProducto())->getNombre(); ?></td>
            <td><?php echo $daoM->getById($data->getIdMaterialVegetal())->getNombre(); ?></td>
            <td><?php echo $daoC->getById($data->getIdCiclo())->getNombre(); ?></td>
            <td><?php echo $daoU->getById($data->getIdTipoUnidadPM())->getNombre(); ?></td>
            <td><?php echo substr($data->getFechaIngreso(),0,10); ?></td>
            <td><?php echo substr($data->getFechaVencimiento(),0,10); ?></td>
            <td><?php echo $data->getSaldo(); ?>/<?php echo $cantidad ?></td>
            <td><?php echo $daoUS->getById($idUsuario)->getNombre(); ?></td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>
<table>
   <tr>
      <td><a onclick="endRevision(<?php echo $idArqueo; ?>)" class="btn btn_black">&nbsp;&nbsp;Confirmar revisi&oacute;n</a></td>
   </tr>
</table>