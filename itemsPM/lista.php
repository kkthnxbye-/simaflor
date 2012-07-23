<?php include '../includes/header.php'; ?>
<script type="text/javascript" src="functions.js"></script>
<?php
$UsuariosXEmpresaDAO = new UsuariosXEmpresaDAO();
$listaUsuariosXempresa = new UsuariosXEmpresa();
$listaUsuariosXempresa = $UsuariosXEmpresaDAO->getsByUsuario($usuario->getId());
$empresasDAO = new empresasDAO();

if(!empty($_GET['f'])){
   $_SESSION['fincaproduccion'] = $_GET['f'];
}

if(isset($_GET['clear'])){
   $_SESSION['fincaproduccion'] = '';
}

?>
<div id="content" class="xfluid">

   <div class="portlet x12">

      <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4> 

         <div class="help">
<?php if ($archiv_ayuda != ""): ?>
               <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
            <? endif; ?> 
         </div>



      </div>



      <div class="portlet-content"><a name="plugin"></a>				





         <div class="btn_right">

         </div>


         <div class="user_tit">

            <form name="busqueda" action="lista.php" id="busqueda" method="post">
               Finca producci&oacute;n
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
               Tipo de plano
               <select name="tipoplano" id="tipoplano">
                  <option value="">Enraizamiento</option>
               </select>
               Campo <select name="campo" id="campo">
                  <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                  <option value="Codigo" <?php if ($_SESSION['campo'] == 'Codigo') { ?> selected="selected"<?php } ?>>C&oacute;digo</option>
                  <option value="Nombre" <?php if ($_SESSION['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                  <option value="Descripcion" <?php if ($_SESSION['campo'] == 'Descripcion') { ?> selected="selected"<?php } ?>>Descripci&oacute;n</option>
               </select>
               <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
               Valor
               <input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor'] ?>"/>
               <input type="hidden" name="page" id="page" value="colores" />

               <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>


            </form>

         </div>

         <div style="display:inline"  style="padding-left:10px">
            <div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
            <a href="lista.php?page_bus=2" class="btn_editar l">

               <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>

               Limpiar Filtro

            </a>

         </div>

         <div class="btn_right">

            <?php  if(!empty($_SESSION['fincaproduccion'])): ?>
            <button style="float: left;margin-right: 5px" 
                    class="btn btn-grey" onclick="location.href='item_crear.php'">
               Nuevo
            </button>
            <?php endif; ?>
            <br/><br/>
         </div>	
         <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Acci&oacute;n</th>
               </tr>
            </thead>
            <tbody>

            </tbody>
         </table>
      </div>
   </div>
</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>	