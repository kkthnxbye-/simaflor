<?php include '../includes/header.php'; ?>
<?php
$TiposParametrosDAO = new TiposParametrosDAO();
$TiposParametros = new TiposParametros();
$TiposParametros = $TiposParametrosDAO->getById($_REQUEST['id']);

$productos = new productos();
$productosDAO = new productosDAO();
$productoss = $productosDAO->gets();
$total = $productosDAO->total();
?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposParametrosEdit.php" method="post" class="form label-inline">               
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$TiposParametros->getNombre()?>" required/></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$TiposParametros->getDescripcion()?></textarea></div>
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$TiposParametros->getId()?>"/>
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposParametrosList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>