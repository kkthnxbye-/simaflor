<?php include '../includes/header.php'; ?>
<?php

include_once '../php/dao/TiposMovimientosInventarioXFincaDAO.php';

if(isset($_GET['page_'])){
   $_SESSION['fincaproduccion'] = '';
}

if(!empty($_GET['f'])){
   $_SESSION['fincaproduccion'] = $_GET['f'];
}

$empresasDAO = new empresasDAO();
$TiposXfincaDAO = new TiposMovimientoInventarioXFincaDAO();
$UsuariosXEmpresaDAO = new UsuariosXEmpresaDAO();
$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
$prodsXfincaDAO = new productosXFincaDAO();
$prodsDAO = new productosDAO();
$unidadesDAO = new TiposUnidadesPMDAO();
$ciclosDAO = new ciclosDAO();
$gradosDAO = new gradosDAO();

$listaUsuariosXempresa = new UsuariosXEmpresa();
$unidades = new TiposUnidadesPM();
$ciclos = new ciclos();
$grados = new grados();

$listaUsuariosXempresa = $UsuariosXEmpresaDAO->getsByUsuario($usuario->getId());

if(!empty($_SESSION['fincaproduccion'])){
  $TiposXfincaList = new TiposMovimientoInventarioXFinca();
  $TiposXfincaList = $TiposXfincaDAO->getByIdFinca($_SESSION['fincaproduccion']);
  $prodList = $prodsXfincaDAO->getsbybuscar($_SESSION['fincaproduccion'],'','','');
  $unidades = $unidadesDAO->gets('','','');
  $ciclos = $ciclosDAO->gets();
  $grados = $gradosDAO->gets();
}



?>


<script src="jquery.uniform.js" type="text/javascript"></script>
<link rel="stylesheet" href="uniform.default.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="inventarioentrada.css" media="all">
<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4>

            <div class="help">
                <?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> 
            </div>



        </div>
        <div class="portlet-content">
        <div id="fincap">
              <div class="caja">
                 <label>Finca Producci&oacute;n</label>
                 <select id="fincaproduccion" name="fincaproduccion">
                    <option value="">Seleccione</option>
                    <?php foreach ($listaUsuariosXempresa as $fs): ?>
                  <?php $fincas = new empresas(); ?>
                  <?php $fincas = $empresasDAO->getById($fs->getIdEmpresa()); ?>
                  <?php if ($fincas->getEsProveedor() == 1): ?>
                     <option 
                        <?php 
                           if ($_SESSION['fincaproduccion'] == $fincas->getId()): 
                              echo 'selected';
                           endif; ?> 
                        value="<?php echo $fincas->getId(); ?>"><?php echo $fincas->getNombre(); ?></option>
                  <?php endif; ?>
               <?php endforeach; ?>
                 </select>
              </div>
        </div>
        <?php if(!empty($_SESSION['fincaproduccion'])): ?>
           <div id="contenedor">
              <div id="master">
                    <div class="caja">
                       <label>Tipo Entrada <strong>*</strong></label>
                       <input type="hidden" id="tipoentrada_" />
                       <select id="tipoentrada" name="tipoentrada">
                          <option value="">Seleccione</option>
                          <?php foreach($TiposXfincaList as $tipos_a): ?>
                          <?php $tipo = $TiposMovimientoInventarioDAO->getById($tipos_a->getIdTipoMovimiento()); ?>
                          <?php if($tipo->getSuma() == 1): ?>
                          <option value="<?php echo $tipo->getId(); ?>">
                             <?php echo $tipo->getNombre(); ?>
                          </option>
                          <?php endif; ?>
                          <?php endforeach; ?>
                       </select>
                    </div>
                    
                    <div class="caja">
                       <label>Producto <strong>*</strong></label>
                       <input type="hidden" id="producto_" />
                       <select id="producto" name="producto">
                          <option value="">Seleccione</option>
                          <?php foreach($prodList as $p): ?>
                          <?php $prod = $prodsDAO->getById($p->getIdProducto()); ?>
                          <option value="<?php echo $prod->getId(); ?>">
                             <?php echo $prod->getNombre(); ?>
                          </option>
                          <?php endforeach; ?>
                       </select>
                       
                    </div>
                    
                    <div class="caja">
                       <label>Material Vegetal <strong>*</strong></label>
                       <input type="hidden" id="vegetal_" />
                       <select id="vegetal" name="vegetal">
                          <option value="">Seleccione</option>
                       </select>
                    </div>
                    
                    <div class="caja">
                       <label>Proveedor <strong>*</strong></label>
                       <input type="hidden" id="proveedor_id_" />
                       <input type="text" name="proveedor" autocomplete="off" id="proveedor">
                       <input type="hidden" name="proveedor_id" id="proveedor_id">
                       <div id="busquedaproveedor"></div>
                    </div>
                    
                    <div class="caja">
                       <label>Cliente <strong>*</strong></label>
                       <input type="hidden" id="cliente_id_" />
                       <input type="text" name="cliente" autocomplete="off" id="cliente">
                       <input type="hidden" name="cliente_id" id="cliente_id">
                       <div id="busquedacliente"></div>
                    </div>
                    
                    <div class="caja">
                       <label>Ciclo <strong>*</strong></label>
                       <input type="hidden" id="ciclo_" />
                       <select id="ciclo" name="ciclo">
                          <option value="">Seleccione</option>
                          <?php foreach($ciclos as $c): ?>
                          <option value="<?php echo $c->getId(); ?>"><?php echo $c->getNombre(); ?></option>
                          <?php endforeach; ?>
                       </select>
                    </div>
                    
                    <div class="caja">
                       <label>Fecha Ingreso <strong>*</strong></label>
                       <input type="hidden" id="fechaingreso_" />
                       <input type="text" name="fechaingreso" id="fechaingreso">
                    </div>
                    
                    <div class="caja">
                       <button id="next" class="btn_black">&nbsp;&nbsp;Siguiente</button>
                    </div>
              </div>
              
              <!------------------------------------------------------------------------------>
              
              
              <div id="detail">
                 <div class="caja">
                       <label>Unidad <strong>*</strong></label>
                       <select id="unidad" name="unidad">
                          <option value="">Seleccione</option>
                          <?php foreach($unidades as $u): ?>
                          <option value="<?php echo $u->getId(); ?>"><?php echo $u->getNombre(); ?></option>
                          <?php endforeach; ?>
                       </select>
                    </div>
                    
                    <div class="caja">
                       <label>Variedad <strong>*</strong></label>
                       <select id="variedad" name="variedad">
                          <option value="">Seleccione</option>
                       </select>
                       
                    </div>
                    
                    <div class="caja">
                       <label>Grado <strong>*</strong></label>
                       <select id="grado" name="grado">
                          <option value="">Seleccione</option>
                          <?php foreach($grados as $g): ?>
                          <option value="<?php echo $g->getId(); ?>"><?php echo $g->getNombre(); ?></option>
                          <?php endforeach; ?>
                       </select>
                    </div>
                    
                    <div class="caja">
                       <label>Cantidad / Unidad <strong>*</strong></label>
                       <input type="text" name="cantidadunidad" class="green-box" id="cantidadunidad">
                       
                    </div>
                    
                    <div class="caja">
                       <label>No Unidades <strong>*</strong></label>
                       <input type="text" name="nounidades" class="green-box" id="nounidades">
                    </div>
                    
                    <div class="caja">
                       <button id="nextunidad" class="btn_black">&nbsp;&nbsp;Siguiente Unidad</button>
                       <button id="close" class="btn_black">&nbsp;&nbsp;Cerrar</button>
                    </div>
              </div>
           </div>
           <?php endif; ?>
        </div>
    </div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
<script src="../js/calendario_k.js" type="text/javascript"></script>
<script src="functions.js" type="text/javascript"></script>
