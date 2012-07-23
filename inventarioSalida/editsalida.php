<?php
include '../includes/header.php';


include_once '../php/dao/TiposMovimientosInventarioXFincaDAO.php';
include_once '../php/dao/TiposMovimientoInventarioDAO.php';

include_once '../php/dao/movimientosInventarioDAO.php';
include_once '../php/entities/movimientosInventarioPM.php';

include_once '../php/dao/documentoInventarioPMDAO.php';
include_once '../php/entities/documentoInventarioPM.php';
include_once '../php/entities/MovimientoInventarioJoin.php';

include_once '../php/entities/empresas.php';
include_once '../php/dao/empresasDAO.php';

include_once '../php/dao/inventariosPMDAO.php';
include_once '../php/entities/inventariosPM.php';

include_once '../php/dao/VariedadesDAO.php';
include_once '../php/entities/Variedades.php';

include_once '../php/dao/productosDAO.php';
include_once '../php/entities/productos.php';

include_once '../php/dao/materialesVegetalesDAO.php';
include_once '../php/entities/materialesVegetales.php';


$pdao = new productosDAO();
$mdao = new materialesVegetalesDAO();
$vdao = new VariedadesDAO();

$idao = new InventariosPMDAO();

$TiposMovimientoInventarioXFincaDAO = new TiposMovimientoInventarioXFincaDAO();
$tipoMovimientoDAO = new TiposMovimientoInventarioDAO();

$listaTipos = $TiposMovimientoInventarioXFincaDAO->getByIdFinca($_SESSION['fincaproduccion']);

if (!empty($_GET['idDocumento'])) {
   
}

$daoM = new MovimientosInventarioDAO();
$daoD = new documentoInventarioPMDAO();
$daoE = new empresasDAO();

$data = $daoM->getsfiltro('m.IDDocumentoInventarioPM', '%', $_GET['idDocumento'], '', '', '', '');

//echo '<pre>';
//print_r($data);
//echo '</pre>';

$cliente = $daoE->getById($data[0]->getIdCliente())->getNombre();

$consecutivo = $daoD->get('IDFinca', $_SESSION['fincaproduccion'], 'MAX', 'consecutivo');
$consecutivo_old = $consecutivo;
$consecutivo++;
?>
<script src="jquery.uniform.js" type="text/javascript"></script>
<script src="functionSalida.js" type="text/javascript"></script>
<link rel="stylesheet" href="uniform.default.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="inventariosalida.css" type="text/css" media="screen" charset="utf-8" />
<div id="content" class="xfluid">
   <div class="portlet x12">
      <div class="portlet-header"><h4><?php echo $_SESSION['url_'] ?> / Editar</h4>
      </div>
      <div class="portlet-content">
         <div class="portlet-content">
            <div class="form label-inline">
               <div class="field">
                  <label>Tipo de movimiento: <span style="color:red">(*)</span></label>
                  <select id="tipomovimiento">
                     <option value="">Seleccione</option>
                     <?php foreach ($listaTipos as $lt): ?>
                        <?php $tipos = $tipoMovimientoDAO->getById($lt->getIdTipoMovimiento()); ?>
                        <?php if ($tipos->getSuma() == 0): ?>
                           <option value="<?php echo $tipos->getId(); ?>"><?php echo $tipos->getNombre() ?></option>
                        <?php endif; ?>
<?php endforeach; ?>
                  </select>
               </div>

               <div class="field">                  
                  <label>Consecutivo</label>
<?php echo '#' . $_SESSION['consecutivo']; ?>
               </div>

               <div class="field">
                  <label for="fname">Cliente:</label>
<?php echo $cliente; ?>
               </div>
               <div><hr style="width: 100%"></div>
               <div id="detailEdit">

                  <div id="session_dataEdit">
                     <table  cellpadding="0" cellspacing="0" border="0">
                        <thead>
                           <tr>
                              <th>Pieza</th>
                              <th>Material Vegetal</th>
                              <th>Producto</th>
                              <th>Variedad</th>
                              <th>Fecha Vencimiento</th>
                              <th>Cantidad</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $c = 0; ?>
                           <?php $vencido = 0; ?>
<?php foreach ($data as $l): ?>
                              <tr>
                                 <td><?php echo $l->getIdInventarioPM(); ?></td>
                                 <?php $data_single = $idao->getById($l->getIdInventarioPM()); ?>
                                 <td><?php echo $mdao->getById($data_single->getIdMaterialVegetal())->getNombre(); ?></td>
                                 <?php $pro = $mdao->getById($data_single->getIdMaterialVegetal()); ?>
                                 <td><?php echo $pro->getNombre(); ?></td>
                                 <td><?php echo $vdao->getById($data_single->getIdVariedad())->getNombre(); ?></td>
                                    <?php $l_ = explode(" ", $data_single->getFechaVencimiento()); ?>
                                 <td>
                                    <?php
                                    if ($l_[0] < date('Y-m-d')):
                                       $vencido = 1;
                                       $color = "red";
                                    else:
                                       $color = "black";
                                    endif;
                                    ?>
                                    <span style="color:<?php echo $color; ?>"><?php echo $l_[0]; ?></span>
                                 </td>
                                 <td><?php echo $l->getCantidad(); ?></td>
                                 
                              </tr>
   <?php $c++; ?>
<?php endforeach; ?>
                           <tr>
                              <td>
                                 <input type="hidden" value="<?php echo $_SESSION['fincaproduccion']; ?>" id="fincaproduccion">
                                 <input type="hidden" value="<?php echo $consecutivo_old; ?>" id="consecutivo_old">
                                 <input type="hidden" value="<?php echo $_GET['idDocumento']; ?>" id="documento_id">
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>   

               </div>

               <div class="buttonrow">
                  <button class="btn btn-grey" id="updatesalida">Actualizar Salida</button>
                  <button class="btn btn-black" id="cancelar" type="button" onclick="location.href='salida.php'">Cancelar</button>
               </div>
            </div>
            <br /><br />
            <br /><br />
         </div>
      </div>
   </div>
</div> <!-- #content -->

<?php include_once '../include_onces/footer.php'; ?>