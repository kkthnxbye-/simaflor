<?php include '../includes/header.php'; ?>
<?php
$serviciosDAO = new serviciosDAO();
$servicios = new servicios();
$servicios = $serviciosDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4></div>
        <div class="portlet-content">
            <form action="../php/action/servicioEdit.php" method="post" class="form label-inline">
                <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$servicios->getCodigo()?>" required/></div>
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$servicios->getNombre()?>" required/></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$servicios->getDescripcion()?></textarea></div>
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$servicios->getId()?>"/>
                    <button class="btn btn-grey">Guardar</button>
                    <a href="ServiciosList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>