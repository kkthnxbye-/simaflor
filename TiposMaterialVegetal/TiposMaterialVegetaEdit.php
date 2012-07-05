<?php include '../includes/header.php'; ?>
<?php
$TiposMateriaVegetalDAO = new TiposMateriaVegetalDAO();
$TiposMateriaVegetal = new TiposMateriaVegetal();
$TiposMateriaVegetal = $TiposMateriaVegetalDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">
    <div class="portlet x9">
        <div class="portlet-header"><h4>Editar TiposMateriaVegetal</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposMateriaVegetalEdit.php" method="post" class="form label-inline">
                <div class="field"><label for="fname">Codigo </label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$TiposMateriaVegetal->getCodigo()?>"/></div>
                <div class="field"><label for="lname">Nombre </label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$TiposMateriaVegetal->getNombre()?>" /></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$TiposMateriaVegetal->getDescripcion()?></textarea></div>
                <br />
                <div class="buttonrow">
                    <input type="hidden" name="id" id="id" value="<?=$TiposMateriaVegetal->getId()?>"/>
                    <button class="btn btn-grey">Editar TiposMateriaVegetal</button>
                    <a href="TiposMateriaVegetalList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    <div class="portlet x3">
        <div class="portlet-header"><h4>TiposMateriaVegetal</h4></div>
        <div class="portlet-content">
            <p> 
                [Descripcion de TiposMateriaVegetal o algun texto acompañativo.]
            </p>
        </div>			
    </div>
</div>
<?php include '../includes/footer.php'; ?>