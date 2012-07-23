<?php
include_once '../php/dao/daoConnection.php';

include_once '../php/dao/remisionesDAO.php';
include_once '../php/entities/remisiones.php';

include_once '../php/dao/pedidosDAO.php';
include_once '../php/entities/pedidos.php';

include_once '../php/dao/VariedadesDAO.php';
include_once '../php/entities/Variedades.php';

$remisionesDAO = new remisionesDAO();
$pedidosDAO = new pedidosDAO();

//if (!empty($_REQUEST['page'])) {
//   $_SESSION['page'] = $_REQUEST['page'];
//}
//if (!empty($_REQUEST['page_bus'])) {
//   $_SESSION['page'] = "busk_sin";
//}
//if (!empty($_POST['campo'])) {
//   $_SESSION['campo'] = $_POST['campo'];
//}
//if (!empty($_POST['tipo_b'])) {
//   $_SESSION['tipo_b'] = $_POST['tipo_b'];
//}
//if (!empty($_POST['valor'])) {
//   $_SESSION['valor'] = $_POST['valor'];
//}

if (!empty($_REQUEST['modulo'])) {
   $_SESSION['modulo'] = $_REQUEST['modulo'];
}

//if (!empty($_GET['fincaproduccion'])) {
//   $_SESSION['fincaproduccion'] = $_GET['fincaproduccion'];
//}

//if ($_SESSION['page'] != "remisionesPM") {
//   $_SESSION['fincaproduccion'] = '';
//   $_SESSION['campo'] = "todos";
//   $_SESSION['valor'] = "";
//   $_SESSION['tipo_b'] = "parte";
//}

if(!empty($_GET['pedido_id'])){
   $_SESSION['IDPedido'] = $_GET['pedido_id'];
}

$remisiones = new remisiones();
$remisiones = $remisionesDAO->getAll($_SESSION['IDPedido']);


$pedidos = new pedidos();
$pedidos = $pedidosDAO->getById($_SESSION['IDPedido']);

$producto_id_ = $pedidos->getProducto();

$vDAO = new VariedadesDAO();

$variedades_lista = new Variedades();
$variedades_lista = $vDAO->gets('IDProducto','asd',$producto_id_);


//echo '<pre>';
//print_r($remisiones);
//echo '</pre>';
//exit;

?>

<?php foreach ($remisiones as $r): ?>
                  <tr class="odd gradeX">
                     <td><?php echo $r->getId(); ?></td>
                     <td><?php echo $r->getNoRemision(); ?></td>
                     <?php $fecha1 = explode(" ",$r->getFechaRemision()); ?>
                     <td><?php echo $fecha1[0]; ?></td>
                     <?php $fecha2 = explode(" ",$r->getFechaRegistro()); ?>
                     <td><?php echo $fecha2[0]; ?></td>
                     <td class="final">
                        <a href="edit_remision.php?id=<?php echo $r->getId(); ?>" class="btn_editar">&nbsp;&nbsp;&nbsp;Editar</a>
                        <a onclick="delete_remision_(<?php echo $r->getId(); ?>)" class="btn btn-grey">Eliminar</a>
                     </td>
                  </tr>
              <?php endforeach; ?>    
            <script>
                  $('.btn_editar').openDOMWindow({ 
                     width: 870,
                     height:550,
                     positionType:'absolute', 
                     positionTop:50, 
                     eventType:'click', 
                     positionLeft:250, 
                     windowSource:'iframe', 
                     windowPadding:0, 
                     loader:1, 
                     loaderImagePath:'animationProcessing.gif', 
                     loaderHeight:16, 
                     loaderWidth:17,
                     draggable:true
                   });
                  </script>
