<?php include '../includes/header.php'; ?>
<?php

include_once '../php/dao/TiposMovimientosInventarioXFincaDAO.php';
include_once '../php/dao/movimientosInventarioDAO.php';
include_once '../php/entities/MovimientoInventarioJoin.php';
include_once '../php/dao/documentoInventarioPMDAO.php';
include_once '../php/entities/movimientosInventarioPM.php';
include_once '../php/entities/documentoInventarioPM.php';

$datosMo = new DocumentoInventarioPM();

if(isset($_GET['page_bus'])){
   $_SESSION['fincaproduccion'] = '';
}

if(!empty($_GET['f'])){
   $_SESSION['fincaproduccion'] = $_GET['f'];
}

$movimientosDAO = new MovimientosInventarioDAO();
$listaMovimientos = new movimientosInventarioJoin();
$empresasDAO = new empresasDAO();
$tipoMovimientoDAO = new TiposMovimientoInventarioDAO();
$TiposMovimientoInventarioXFincaDAO = new TiposMovimientoInventarioXFincaDAO();
$documentoi = new documentoInventarioPMDAO();

if(isset($_POST['tipomovimiento'])){
   $tipoMov = $_POST['tipomovimiento'];
}else{
   $tipoMov = '';
}

if(isset($_POST['fechasearch'])){
   $fecha = $_POST['fechasearch'];
}else{
   $fecha = '';
}

if(isset($_POST['cliente_id'])){
   $cliente = $_POST['cliente_id'];
}else{
   $cliente = '';
}

if(isset($_GET['clear'])){
   $tipoMov = '';
   $fecha = '';
   $cliente = '';
}

if(!empty($_SESSION['fincaproduccion'])){
  $listaTipos = $TiposMovimientoInventarioXFincaDAO->getByIdFinca($_SESSION['fincaproduccion']);
  $consucutivo = $documentoi->get('IDFinca', $_SESSION['fincaproduccion'], 'MAX', 'consecutivo');
  $consucutivo++;
  $_SESSION['consecutivo'] = $consucutivo; 
  $listaMovimientos = $movimientosDAO->getsfiltro('','','',$_SESSION['fincaproduccion'],$tipoMov,$fecha,$cliente);
}else{
  $listaMovimientos = array(); 
}

$UsuariosXEmpresaDAO = new UsuariosXEmpresaDAO();
$listaUsuariosXempresa = new UsuariosXEmpresa();
$listaUsuariosXempresa = $UsuariosXEmpresaDAO->getsByUsuario($usuario->getId());

?>

<script src="jquery.uniform.js" type="text/javascript"></script>
<link rel="stylesheet" href="uniform.default.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="inventariosalida.css" media="all">
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
              
              <button class="btn_editar" id="addsalida">&nbsp;&nbsp;Registrar nueva salida</button>
              <br><br>
              <div class="caja_buscar">
                 <form action="salida.php" method="POST">
                 <div class="caja-child">
                     <label>Tipo de movimiento:</label>
                     <select id="tipomovimiento" name="tipomovimiento">
                        <option value="">Seleccionar</option>
                        <?php foreach($listaTipos as $lt): ?>
                        <?php $tipos = $tipoMovimientoDAO->getById($lt->getIdTipoMovimiento()); ?>
                        <?php if($tipos->getSuma() == 0): ?>
                        <option <?php if(isset($_POST['tipomovimiento']) && $_POST['tipomovimiento'] == $tipos->getId()): echo " selected "; endif; ?> value="<?php echo $tipos->getId(); ?>"><?php echo $tipos->getNombre() ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                     </select>
                 </div>
                 
                 <div class="caja-child">
                    <label>Fecha:&nbsp;&nbsp;</label>
                    <input type="text" id="fechasearch" name="fechasearch" <?php if(isset($_POST['fechasearch'])): echo " value='".$_POST['fechasearch']."' "; endif; ?> >
                 </div>
                 
                 <div class="caja-child">
                    <label>Cliente:&nbsp;&nbsp;</label>
                    <input type="text" id="cliente" autocomplete="off" name="cliente" <?php if(isset($_POST['cliente'])): echo " value='".$_POST['cliente']."' "; endif; ?> >
                    <input type="hidden" id="cliente_id" name="cliente_id" <?php if(isset($_POST['cliente_id'])): echo " value='".$_POST['cliente_id']."' "; endif; ?> />
                     <div id="clienteShow">
                     </div>
                 </div>
                 
                 <div class="caja-child">
                     <button class="btn_black">&nbsp;&nbsp;Buscar</button>
                 </div>
                 </form>
                 <div class="caja-child">
                    <button class="btn_black" onclick="window.location.href='salida.php?clear'">&nbsp;&nbsp;Limpiar Filtro</button>
                 </div>
              </div>
              
              <div>
               <table cellpadding="0" cellspacing="0" border="0">
                  <thead>
                     <tr>
                           <th>Id Documento</th>
                           <th>Tipo Movimiento</th>
                           <th>Fecha</th>
                           <th>Cliente</th>
                           <th>Acción</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($listaMovimientos as $lm): ?>
                     <?php 
                        $datosMo = $documentoi->getOne($lm->getIdDocumentoInventarioPM());                       
                     ?>
                        <tr class="odd gradeX">
                           <td><?php echo $lm->getIdDocumentoInventarioPM(); ?></td>
                           <td><?php echo $tipoMovimientoDAO->getById($lm->getIdTipoMovimientoInventarioPM())->getNombre(); ?></td>
                           <td><?php echo $lm->getFechaRegistro(); ?></td>
                           <td><?php echo $empresasDAO->getById($lm->getIdCliente())->getNombre(); ?></td>
                           <td>
                              <button class="btn_editar" 
                                      onclick="window.location.href='editsalida.php?idDocumento=<?php echo $lm->getIdDocumentoInventarioPM(); ?>'">&nbsp;&nbsp;Editar</button>
                              <a class="btn_black" href="delete.php?id=<?php echo $lm->getId(); ?>" onclick="return confirma();">&nbsp;&nbsp;Eliminar</a>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                  </tbody>
               </table>
              </div>
           </div>   
           <?php endif; ?>
        </div>
    </div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
<script src="../js/calendario_k.js" type="text/javascript"></script>
<script src="functions.js" type="text/javascript"></script>
