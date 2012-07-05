<?php include '../includes/header.php'; ?>
<?php
$TiposDocumentoXTipoMovimientoInventarioDAO = new TiposDocumentoXTipoMovimientoInventarioDAO();
$TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
$TiposDocumentoXTipoMovimientoInventarios = $TiposDocumentoXTipoMovimientoInventarioDAO->gets($_REQUEST['campo'], $_REQUEST['tipo_b'], $_REQUEST['valor']);
$total = $TiposDocumentoXTipoMovimientoInventarioDAO->total($_REQUEST['campo'], $_REQUEST['tipo_b'], $_REQUEST['valor']);


$tiposDocumentoDAO = new TiposDocumentoDAO();
$tiposMovimientosDAO = new TiposMovimientoInventarioDAO();
?>
<div id="content" class="xfluid">		
    <div class="portlet x12">
        <div class="portlet-header"><h4>Administrador de TiposDocumentoXTipoMovimientoInventario</h4>
            <div class="help">
               <?php if($archiv_ayuda != ""): ?>
               <a target="_blank" href="../pdf_ayuda/<?=$archiv_ayuda?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
               <? endif; ?> 
            </div>
        </div>			
        <div class="portlet-content"><br />			            					
            <a name="plugin"></a>
            <div class="user_tit"><h2>TiposDocumentoXTipoMovimientoInventario</h2></div>
            <div class="btn_left"><button class="btn btn-grey" onclick="location.href='TiposDocumentosInventariosAdd.php'">Nuevo</button></div>
            <div class="line"></div><br/>
            <div class="user_tit">
                <form onSubmit="return valida_cod()" name="busqueda" action="TiposDocumentoXTipoMovimientoInventarioList.php" id="busqueda" method="post">
                    Campo <select name="campo" id="campo">
                        <option value="todos" <?php if ($_REQUEST['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="Codigo" <?php if ($_REQUEST['campo'] == 'Codigo') { ?> selected="selected"<?php } ?>>C&oacute;digo</option>
                        <option value="Nombre" <?php if ($_REQUEST['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                        <option value="Descripcion" <?php if ($_REQUEST['campo'] == 'Descripcion') { ?> selected="selected"<?php } ?>>Descripci&oacute;n</option>
                    </select>
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_REQUEST['valor'] ?>"/>
                    <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
                </form>
            </div>
            <div class="btn_right">
                <a href="TiposDocumentoXTipoMovimientoInventarioList.php" class="btn_editar l"><div class="icon_botn"><img src="../images/icon_null.png" width="22" height="23" /></div>Limpiar Filtro</a>                
            </div><br/><br/>
            <?php if (isset($_REQUEST['ok1'])): ?>
                <h3 style="color: green"> TiposDocumentoXTipoMovimientoInventario Agregado Satisfactoriamente</h3>
            <?php endif; ?>
            <?php if (isset($_REQUEST['ok2'])): ?>
                <h3 style="color: blue"> TiposDocumentoXTipoMovimientoInventario Editado Satisfactoriamente</h3>
            <?php endif; ?>
            <?php if (isset($_REQUEST['ok3'])): ?>
                <h3 style="color: red"> TiposDocumentoXTipoMovimientoInventario Eliminado Satisfactoriamente</h3>
            <?php endif; ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th width="35%">TipoDocumento</th>
                        <th width="25%">TipoMovimientoInventario</th>                        
                        <th width="20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($total > 0): ?>
                        <?php foreach ($TiposDocumentoXTipoMovimientoInventarios as $TiposDocumentoXTipoMovimientoInventario): ?>
                            <tr class="odd gradeX">                                
                                <td><?=$tiposDocumentoDAO->getById($TiposDocumentoXTipoMovimientoInventario->getTipoDocumento())->getNombre()?></td>
                                <td><?= $tiposMovimientosDAO->getById($TiposDocumentoXTipoMovimientoInventario->getTipoMovimientoInventario())->getNombre() ?></td>
                                <td class="center">
                                    <a href="TiposDocumentosInventariosEdit.php?id=<?= $TiposDocumentoXTipoMovimientoInventario->getId() ?>" class="btn_editar">
                                        <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>Editar</a>
                                    <a onClick="return confirma(this)" href="../php/action/TiposDocumentosInventariosDelete.php?id=<?= $TiposDocumentoXTipoMovimientoInventario->getId() ?>" class="btn_black">
                                        <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 
                                        Eliminar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>		
                </tbody>
            </table>
        </div>
    </div>	
</div> <!-- #content -->	
<?php include '../includes/footer.php'; ?>	