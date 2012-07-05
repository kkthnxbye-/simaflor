<?php include '../includes/header.php'; ?>
<?php

$id = $_REQUEST['id'];
$productos = new productos();
$productosDAO = new productosDAO();
$productoss = $productosDAO->gets();
$total = $productosDAO->total();

$colorDAO = new coloresDAO();
$color = new colores();
$colors = $colorDAO->gets();
$total2 = $colorDAO->total();

$variedadDAO = new VariedadesDAO();
$variedad = new Variedades();
$variedad = $variedadDAO->getById($id);
?>
<div id="content" class="xfluid">
    <div class="portlet x9">
        <div class="portlet-header"><h4>Editar Variedades</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/variedadesEdit.php" method="post" class="form label-inline">
                <div class="field">
                    <label for="fname">Producto</label>
                    <select name="IDProducto" id="idGrupoUsuario">
                        <?php if ($total > 0):?>
                        <?php foreach ($productoss as $productos) : ?>
                        <option value="<?= $productos->getId() ?>" <?php if( $productos->getId()  == $variedad->getIdProducto()):?>selected<?php endif;?>><?= $productos->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
                <div class="field">
                    <label for="fname">Color</label>
                    <select name="IDColor" id="idGrupoUsuario">
                        <?php if ($total > 0):?>
                        <?php foreach ($colors as $color) : ?>
                        <option value="<?= $color->getId() ?>" <?php if($color->getId() == $variedad->getIdColor()):?>selected<?php endif;?>><?= $color->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
                <div class="field"><label for="lname">Codigo </label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$variedad->getCodigo()?>"/></div>               
                <div class="field"><label for="lname">Nombre </label> <input id="contrasena" name="nombre" size="50" type="text" class="medium" value="<?=$variedad->getNombre()?>"/></div>
                <div class="field"><label for="lname">Descripcion </label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$variedad->getDescripcion()?></textarea></div>
                <div class="field">
<label for="lname">Foto </label> 
<?php if ($variedad->getFoto()){?>
<img src="img/<?php echo $variedad->getFoto()?>" width="200px" />
<?php }?>
<input id="foto" name="foto" type="file" class="medium" /></div><div class="field"><label for="lname">Habilitado </label> <input id="habilitado" name="habilitado" type="checkbox" class="medium" value="on"  <?php if ($variedad->getHabilitado() > 0){?> checked="checked"
<?php }?>
/></div>               
               
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$id?>" />
                    <button class="btn btn-grey">Guardar</button>
                    <a href="VariedadesList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>