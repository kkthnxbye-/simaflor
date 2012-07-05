<?php include '../includes/header.php'; ?>
<?php
$TiposParametrosDAO = new TiposParametrosDAO();
$TiposParametros = new TiposParametros();

if (!empty($_POST['page'])){
	$_SESSION['page'] = $_POST['page'];
}
if (!empty($_REQUEST['page_bus'])){
	$_SESSION['page'] = "busk_sin";
}
if (!empty($_POST['campo'])){
$_SESSION['campo'] = $_POST['campo'];
}
if (!empty($_POST['tipo_b'])){
$_SESSION['tipo_b'] = $_POST['tipo_b'];
}
if (!empty($_POST['valor'])){

$_SESSION['valor'] = $_POST['valor'];
}


if ($_SESSION['page'] != "TiposParametros"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "ocurrencias";
}

$TiposParametross = $TiposParametrosDAO->gets($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
$total = $TiposParametrosDAO->total($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
?>
<div id="content" class="xfluid">		
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4>
            <div class="help">
               <?php if($archiv_ayuda != ""): ?>
               <a target="_blank" href="../pdf_ayuda/<?=$archiv_ayuda?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
               <? endif; ?> 
            </div>
        </div>			
        <div class="portlet-content">
            <a name="plugin"></a>
            
            
            
            <div class="user_tit">
                <form onSubmit="return valida_cod()" name="busqueda" action="TiposParametrosList.php" id="busqueda" method="post">
                    Campo <select name="campo" id="campo">
                        <option value="todos" <?php if ($_REQUEST['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="Nombre" <?php if ($_REQUEST['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                        <option value="Descripcion" <?php if ($_REQUEST['campo'] == 'Descripcion') { ?> selected="selected"<?php } ?>>Descripci&oacute;n</option>
                    </select>
                    <input type="hidden" name="page" value="TiposParametros" />
                    <input type='hidden' name='tipo_b' id='tipo_b' value='ocurrencias' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_REQUEST['valor'] ?>"/>
                    <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
                    
                </form>
            </div>
            <div style="display:inline"  style="padding-left:10px">
				<div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
				<a href="TiposParametrosList.php?page_bus=2" class="btn_editar l">
				
			  <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>

                    Limpiar Filtro

             	</a>
				</div>
            <div class="btn_right">
                
                <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='TiposParametrosAdd.php'">Nuevo</button>
                
            <a href="excel.php" class="btn_editar">
                     <div class="icon_botn">
                        <img src="../images/icon_export.png" width="22" height="23" />
                     </div> 
                     Exportar (CSV)
               </a>                    
            
            </div><br/><br/>
           
            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th width="25%">Nombre</th>
                        <th width="35%">Descripci&oacute;n</th>
                        <th width="20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($total > 0): ?>
                        <?php foreach ($TiposParametross as $TiposParametros): ?>
                            <tr class="odd gradeX">
                                <td><?= $TiposParametros->getNombre() ?></td>
                                <td><?= $TiposParametros->getDescripcion() ?></td>
                                <td class="center">
                                   <? if($modificar == 1){ ?>
                                    <a href="TiposParametrosEdit.php?id=<?= $TiposParametros->getId() ?>" class="btn_editar">
                                        <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>Editar</a>
                                   <? } ?> 
                                   <a onClick="return confirma(this)" href="../php/action/TiposParametrosDelete.php?id=<?= $TiposParametros->getId() ?>" class="btn_black">
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