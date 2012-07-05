<?php include '../includes/header.php'; ?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposAreaPMAdd.php" method="post" class="form label-inline">
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$_GET['n'];?>" required/></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$_GET['d'];?></textarea></div>
                <br />
                <div class="buttonrow">
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposAreaPMList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>
