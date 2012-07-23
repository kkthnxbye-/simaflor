<?php include '../includes/header.php'; ?>
<?php
$UsuariosXEmpresaDAO = new UsuariosXEmpresaDAO();
$listaUsuariosXempresa = new UsuariosXEmpresa();
$listaUsuariosXempresa = $UsuariosXEmpresaDAO->getsByUsuario($usuario->getId());
$empresasDAO = new empresasDAO();

if(isset($_GET['finca'])){
   $_SESSION['fincaproduccion'] = $_GET['finca'];
}

if(isset($_GET['clear'])){
   $_SESSION['fincaproduccion'] = '';
}

?>

<script src="jquery.uniform.js" type="text/javascript"></script>
<link rel="stylesheet" href="uniform.default.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="all">
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
                        endif;
                        ?> 
                           value="<?php echo $fincas->getId(); ?>"><?php echo $fincas->getNombre(); ?></option>
                        <?php endif; ?>
                     <?php endforeach; ?>
               </select>
            </div>
         </div>
         <?php if(!empty($_SESSION['fincaproduccion'])): ?>
         <div id="contenedor">
            <div class="caja_buscar">
               <label>Estato:&nbsp;&nbsp;</label>
               <select id="estado" name="estado">
                  <option value="">Seleccione</option>
                  <option value="1">Revisado</option>
                  <option value="0">Sin Revisar</option>
               </select>
            </div>
         </div>
         <div id="revision">
               Revision goes here.
         </div>
         <div id="setContent"></div>
      </div>   
      <?php endif; ?>
   </div>
</div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
<script src="../js/calendario_k.js" type="text/javascript"></script>
<script src="functions.js" type="text/javascript"></script>