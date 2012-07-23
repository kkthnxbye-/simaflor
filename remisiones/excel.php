<?php session_start();
include_once '../php/dao/daoConnection.php';

include_once '../php/dao/remisionesDAO.php';
include_once '../php/entities/remisiones.php';

include_once '../php/dao/pedidosDAO.php';
include_once '../php/entities/pedidos.php';

include_once '../php/dao/VariedadesDAO.php';
include_once '../php/entities/Variedades.php';

$remisionesDAO = new remisionesDAO();
$remisiones = new remisiones();
$remisiones = $remisionesDAO->getAll($_SESSION['IDPedido']);


header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Remisiones.xls");
header("Pragma: no-cache");
header("Expires: 0");



?>
    <table>
          <tr>
                  <th>ID</th>
                  <th>No Remision</th>
                  <th>Fecha Remision</th>
                  <th>Fecha Registro</th>
               </tr>
        <?php foreach ($remisiones as $r): ?>
                  <tr class="odd gradeX">
                     <td><?php echo $r->getId(); ?></td>
                     <td><?php echo $r->getNoRemision(); ?></td>
                     <?php $fecha1 = explode(" ",$r->getFechaRemision()); ?>
                     <td><?php echo $fecha1[0]; ?></td>
                     <?php $fecha2 = explode(" ",$r->getFechaRegistro()); ?>
                     <td><?php echo $fecha2[0]; ?></td>
                  </tr>
              <?php endforeach; ?> 

      </table>
