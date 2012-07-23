<?php session_start();
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


header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=RevisionArqueo.xls");
header("Pragma: no-cache");
header("Expires: 0");

$data_ = explode(",",$_GET['data']);

//print_r($data_);

?>
    <table>
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
        <?php foreach($data_ as $cero): ?>
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
      </table>
