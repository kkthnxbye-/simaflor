<?php include '../includes/header.php'; ?>
<?php
$TiposConfiguracionUsuarioDAO = new TiposConfiguracionUsuarioDAO();
$TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
$TiposConfiguracionUsuario = $TiposConfiguracionUsuarioDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposConfiguracionUsuarioEdit.php" method="post" class="form label-inline">
                <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$TiposConfiguracionUsuario->getCodigo()?>" required/></div>
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$TiposConfiguracionUsuario->getNombre()?>" required/></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$TiposConfiguracionUsuario->getDescripcion()?></textarea></div>
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$TiposConfiguracionUsuario->getId()?>"/>
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposConfiguracionUsuarioList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>