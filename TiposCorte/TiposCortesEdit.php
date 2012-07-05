<?php include '../includes/header.php'; ?>
<?php
$TiposCorteDAO = new TiposCorteDAO();
$TiposCorte = new TiposCorte();
$TiposCorte = $TiposCorteDAO->getById($_REQUEST['id']);

$productos = new productos();
$productosDAO = new productosDAO();
$productoss = $productosDAO->gets();
$total = $productosDAO->total();
?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposCortesEdit.php" method="post" class="form label-inline">
                <div class="field">
                    <label for="fname">Producto <strong style="color: red">*</strong></label>
                    <select name="idProducto" id="idProducto" required>
                        <?php if ($total > 0):?>
                        <?php foreach ($productoss as $productos) : ?>
                        <option value="<?= $productos->getId() ?>" <?php if($productos->getId() == $TiposCorte->getIdProducto()):?>selected<?php endif;?>><?= $productos->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
                <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$TiposCorte->getCodigo()?>" required/></div>
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$TiposCorte->getNombre()?>" required/></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$TiposCorte->getDescripcion()?></textarea></div>
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$TiposCorte->getId()?>"/>
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposCorteList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>