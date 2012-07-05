<?php include '../includes/header.php'; ?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposMaterialVegetalAdd.php" method="post" class="form label-inline">
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" required/></div>               
                <br />
                <div class="buttonrow">
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
