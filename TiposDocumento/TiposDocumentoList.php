<?php include '../includes/header.php'; ?>
<?php
$TiposDocumentoPedidosPMDAO = new TiposDocumentoPedidosPMDAO();
$TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
$TiposDocumentoPedidosPMs = $TiposDocumentoPedidosPMDAO->gets($_REQUEST['campo'], $_REQUEST['tipo_b'], $_REQUEST['valor']);
$total = $TiposDocumentoPedidosPMDAO->total($_REQUEST['campo'], $_REQUEST['tipo_b'], $_REQUEST['valor']);
?>
<div id="content" class="xfluid">		
    <div class="portlet x12">
        <div class="portlet-header"><h4>Administrador de TiposDocumentoPedidosPM</h4>
            <div class="help">
                <a href="" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
            </div>
        </div>			
        <div class="portlet-content"><br />			            					
            <a name="plugin"></a>
            <div class="user_tit"><h2>TiposDocumentoPedidosPM</h2></div>
            <div class="btn_left"><button class="btn btn-grey" onclick="location.href='TiposDocumentoPedidosPMAdd.php'">Nuevo</button></div>
            <div class="line"></div><br/>
            <div class="user_tit">
                <form onSubmit="return valida_cod()" name="busqueda" action="TiposDocumentoPedidosPMList.php" id="busqueda" method="post">
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
                <a href="TiposDocumentoPedidosPMList.php" class="btn_editar l"><div class="icon_botn"><img src="../images/icon_null.png" width="22" height="23" /></div>Limpiar Filtro</a>                
            </div><br/><br/>
            <?php if (isset($_REQUEST['ok1'])): ?>
                <h3 style="color: green"> TiposDocumentoPedidosPM Agregado Satisfactoriamente</h3>
            <?php endif; ?>
            <?php if (isset($_REQUEST['ok2'])): ?>
                <h3 style="color: blue"> TiposDocumentoPedidosPM Editado Satisfactoriamente</h3>
            <?php endif; ?>
            <?php if (isset($_REQUEST['ok3'])): ?>
                <h3 style="color: red"> TiposDocumentoPedidosPM Eliminado Satisfactoriamente</h3>
            <?php endif; ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>                   
                        <th>ID</th>
                        <th width="10%">Codigo</th>
                        <th width="25%">Nombre</th>
                        <th width="35%">Descripci&oacute;n</th>
                        <th width="10%">Habilitado</th>
                        <th width="20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($total > 0): ?>
                        <?php foreach ($TiposDocumentoPedidosPMs as $TiposDocumentoPedidosPM): ?>
                            <tr class="odd gradeX">
                                <td><?= $TiposDocumentoPedidosPM->getId();?></td>
                                <td><?= $TiposDocumentoPedidosPM->getCodigo() ?></td>
                                <td><?= $TiposDocumentoPedidosPM->getNombre() ?></td>
                                <td><?= $TiposDocumentoPedidosPM->getDescripcion() ?></td>
                                <td><?php echo str_replace('1','Si',str_replace('0','No',$TiposDocumentoPedidosPM->getHabilitado()));?></td>        
                                <td class="center">
                                    <a href="TiposDocumentoPedidosPMEdit.php?id=<?= $TiposDocumentoPedidosPM->getId() ?>" class="btn_editar">
                                        <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>Editar</a>
                                    <a onClick="return confirma(this)" href="../php/action/TiposDocumentoPedidosPMDelete.php?id=<?= $TiposDocumentoPedidosPM->getId() ?>" class="btn_black">
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