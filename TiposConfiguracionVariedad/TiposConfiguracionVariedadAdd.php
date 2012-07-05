<?php include '../includes/header.php'; ?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposConfiguracionVariedadAdd.php" method="post" class="form label-inline">
                <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong> </label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$_GET['c'];?>" required/></div>
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$_GET['n'];?>" required/></div>               
                <div class="field"><label for="description">Descripción</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$_GET['d'];?></textarea></div>
                <br />
                <div class="buttonrow">
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposConfiguracionVariedadList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>
