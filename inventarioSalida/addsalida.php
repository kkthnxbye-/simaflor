<?php
include '../includes/header.php';
include_once '../php/dao/TiposMovimientosInventarioXFincaDAO.php';

$TiposMovimientoInventarioXFincaDAO = new TiposMovimientoInventarioXFincaDAO();
$tipoMovimientoDAO = new TiposMovimientoInventarioDAO();

$listaTipos = $TiposMovimientoInventarioXFincaDAO->getByIdFinca($_SESSION['fincaproduccion']);
?>
<script src="jquery.uniform.js" type="text/javascript"></script>
<script src="functionSalida.js" type="text/javascript"></script>
<link rel="stylesheet" href="uniform.default.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="inventariosalida.css" type="text/css" media="screen" charset="utf-8" />
<div id="content" class="xfluid">
   <div class="portlet x12">
      <div class="portlet-header"><h4><?php echo $_SESSION['url_'] ?> / Nuevo</h4>
      </div>
      <div class="portlet-content">
         <div class="portlet-content">
            <div class="form label-inline">
               <div class="field">
                  <label>Tipo de movimiento: <span style="color:red">(*)</span></label>
                  <select id="tipomovimiento">
                     <option value="">Seleccione</option>
                     <?php foreach($listaTipos as $lt): ?>
                     <?php $tipos = $tipoMovimientoDAO->getById($lt->getIdTipoMovimiento()); ?>
                     <?php if($tipos->getSuma() == 0): ?>
                     <option value="<?php echo $tipos->getId(); ?>"><?php echo $tipos->getNombre() ?></option>
                     <?php endif; ?>
                     <?php endforeach; ?>
                  </select>
               </div>
               
               <div class="field">                  
                  <label>Consecutivo</label>
                  <?php echo '#'.$_SESSION['consecutivo']; ?>
               </div>
               
               <div class="field">
                  <label for="fname">Cliente: <span style="color:red">(*)</span></label>
                  <input type="text" id="cliente" name="cliente" />
                  <input type="hidden" id="cliente_id" name="cliente_id" />
                  <div id="clienteShowAdd"></div>
                  <button class="btn btn-grey" id="next">Siguiente</button>
               </div>
               <div><hr style="width: 100%"></div>
               <div id="detail">
                  <div class="field">
                  <label for="fname">Pieza: <span style="color:red">(*)</span></label>
                  <input type="text" id="pieza" name="pieza" />
                  
                  <strong>Cant. Salida: <span style="color:red">(*)</span></strong>
                  <input type="text" id="cantidadsalida" name="cantidadsalida" />
                  <input type="hidden" id="cantidadsalida_hidden" name="cantidadsalida_hidden" />
                  <button class="btn btn-grey" id="addToSession">Adicionar</button>
                  </div>
               
                  <div id="session_data">
                     
                  </div>   
                  
               </div>
               
               <div class="buttonrow">
                  <button class="btn btn-grey" id="savesalida">Registrar Salida</button>
                  <button class="btn btn-black" id="cancelar" type="button" onclick="location.href='salida.php'">Cancelar</button>
               </div>
            </div>
            <br /><br />
            <br /><br />
         </div>
      </div>
   </div>
</div> <!-- #content -->

<?php include '../includes/footer.php'; ?>