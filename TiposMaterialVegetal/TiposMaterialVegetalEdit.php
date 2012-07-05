<?php include '../includes/header.php'; ?>
<?php
$TiposMaterialVegetalDAO = new TiposMaterialVegetalDAO();
$TiposMaterialVegetal = new TiposMaterialVegetal();
$TiposMaterialVegetal = $TiposMaterialVegetalDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposMaterialVegetalEdit.php" method="post" class="form label-inline">
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$TiposMaterialVegetal->getNombre()?>" required/></div>               
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$TiposMaterialVegetal->getId()?>"/>
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposMaterialVegetalList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>