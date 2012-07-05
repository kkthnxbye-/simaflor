<?php include '../includes/header.php'; ?>
<?php
$areaspmxbloquepmDAO = new areaspmxbloquepmDAO();
$areaspmxbloquepm = $areaspmxbloquepmDAO->getById($_REQUEST['id']);


$tipoAreaDAO = new TiposAreaPMDAO();
$tipoArea = new TiposAreaPM();

$tipoArea = $tipoAreaDAO->gets($campo, $tipoBusqueda, $valor);
?>

<style type="text/css">
    #AreadeCultivo,#AreadeCamino,#capacidad{
        border: 1px solid green;
        width: 150px
    }
</style>

<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Areas / Editar</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 





            <div class="portlet-content">
                <form action="../php/action/areaspmxbloquepmEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">									
                    <div class="field"><label for="codigo">C&oacute;digo <strong style="color: red">*</strong> </label>
                        <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?php echo $areaspmxbloquepm->getCodigo(); ?>" required/></div>							


                    <div class="field">
                        <label for="codigo">Tipos de Area <strong style="color: red">*</strong></label>
                        <select name="idTipoArea">
                            <option value="0" >Seleccione</option>
                            <?php foreach ($tipoArea as $item) { ?>
                            <option value="<?= $item->getId() ?>" <?php if($item->getId() == $areaspmxbloquepm->getIdTipoArea() ){echo "selected";}?> ><?= $item->getNombre() ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="field"><label for="nombre">Nombre <strong style="color: red">*</strong> </label>
                        <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $areaspmxbloquepm->getNombre(); ?>" required /></div>							

                    <div class="field"><label for="capacidad">Capacidad <strong style="color: red">*</strong> </label>
                        <input id="capacidad" name="capacidad" size="50" type="text" class="medium" value="<?php echo $areaspmxbloquepm->getCapacidad(); ?>" required/></div>							

                    <div class="field"><label for="AreadeCultivo">Area de Cultivo <strong style="color: red">*</strong> </label>
                        <input id="AreadeCultivo" name="AreadeCultivo" size="50" type="text" class="medium" value="<?php echo $areaspmxbloquepm->getAreaCultivo(); ?>" required /></div>							

                    <div class="field"><label for="AreadeCamino">Area de Camino <strong style="color: red">*</strong> </label> 
                        <input id="AreadeCamino" name="AreadeCamino" size="50" type="text" class="medium" value="<?php echo $areaspmxbloquepm->getAreaCamino(); ?>" required /></div>							

                    <div class="field"><label for="habilitado">Habilitado</label> 
                        <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium"  <?php if ($areaspmxbloquepm->getHabilitado() == "1") { ?> checked="checked" <?php } ?>/></div>
                    <br />
                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>" />
                    <input type="hidden" id="bloque" name="bloque" value="<?php echo $_SESSION['bloque'] ?>" />
                    <div class="buttonrow">								
                        <button class="btn btn-grey">Guardar</button>
                        <button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>
                    </div>
                </form>											

                <br /><br />

                <br /><br />



            </div>



        </div>

    </div>







</div> <!-- #content -->

<?php include '../includes/footer.php'; ?>