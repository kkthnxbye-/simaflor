<?php session_start(); ?>
<?php 
include '../php/dao/daoConnection.php';
include '../php/entities/remisiones.php';
include '../php/entities/detalleRemision.php';
include '../php/dao/remisionesDAO.php';
include '../php/entities/pedidos.php';
include '../php/dao/pedidosDAO.php';
include '../php/entities/Variedades.php';
include '../php/dao/VariedadesDAO.php';


$id = $_GET['id'];

$remisionesDAO = new remisionesDAO();
$remision = new remisiones();

$remision = $remisionesDAO->getOne($id);


/*************************************************************************************/

$pedidosDAO = new pedidosDAO();
$pedido = new pedidos();

$pedido = $pedidosDAO->getById($remision->getIDPedidoPM());

/*************************************************************************************/

$variedadesDAO = new VariedadesDAO();
$variedades_lista = new Variedades();

$variedades_lista = $variedadesDAO->gets('IDProducto','asd',$pedido->getProducto());

/*************************************************************************************/

$detalles = new detalleRemision();
$detalles = $remisionesDAO->getAllDetalle($id);

/*************************************************************************************/

?>

<table width="800" cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                     <thead>
                        <tr>
                           <th width="200">Variedad</th>
                           <th width="200">Cantidad</th>
                           <th width="200">Cantidad Acumulada</th>
                           <th width="200">Opciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($detalles as $d): ?>
                           <tr class="odd gradeX">
                              <td class="center" width="200">
                                 <?php echo $variedadesDAO->getById($d->getIDVariedad())->getNombre(); ?>
                              </td>
                              <td width="200">
                                 <?php echo $d->getCantidad(); ?>
                              </td>
                              <td width="200">
                                 <?php 
                                 $suma = $remisionesDAO->sumVariedades($remision->getIDPedidoPM(),$d->getIDVariedad());
                                 echo $suma;
                                 ?>
                              </td>
                              <td class="center" width="200">
                                 <a href="javascript:;" onclick="delete_detalleremision_(<?php echo $d->getId(); ?>)" class="btn_black">
                                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 
                                    Eliminar
                                 </a>
                              </td>
                           </tr>
                     <?php endforeach; ?>
                           <tr>
                              <td colspan="4" align="center">

                                 <button class="btn btn-grey" onclick="return update_remision(<?php echo $id; ?>)">Guardar</button>
                              </td>
                           </tr>
                     </tbody>
                  </table>
