<?php include '../includes/header.php'; ?>
<?php
$TiposUnidadesPMDAO = new TiposUnidadesPMDAO();
$TiposUnidadesPM = new TiposUnidadesPM();
$TiposUnidadesPM = $TiposUnidadesPMDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposUnidadesPMEdit.php" method="post" class="form label-inline">
                <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$TiposUnidadesPM->getCodigo()?>" required/></div>
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$TiposUnidadesPM->getNombre()?>" required/></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$TiposUnidadesPM->getDescripcion()?></textarea></div>
				<div class="field"><label for="lname">Habilitado </label> <input id="habilitado" name="habilitado" type="checkbox" class="medium" value="on" <?php if ($TiposUnidadesPM->getHabilitado() > 0){?> checked="checked" <?php }?> /></div> 
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$TiposUnidadesPM->getId()?>"/>
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposUnidadesPMList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>