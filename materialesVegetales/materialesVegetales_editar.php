
<?php include '../includes/header.php'; ?>
<?php
$materialesVegetalesDAO = new materialesVegetalesDAO();
$mat = $materialesVegetalesDAO->getById($_REQUEST['id']);

$TiposMaterialVegetalDAO = new TiposMaterialVegetalDAO();
$TiposMaterialVegetales = $TiposMaterialVegetalDAO->gets();
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/>





            <div class="portlet-content">








                <form onSubmit="return valida_cod()" action="../php/action/materialesVegetalesEdit.php" method="post" class="form label-inline">

                    <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $mat->getCodigo() ?>" required/></div>

                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $mat->getNombre() ?>" required/></div>

                    <div class="field">
                        <label for="fname">Tipo material vegetal <strong style="color: red">*</strong></label>
                        <select name="idTipoMaterialVegetal" id="idTipoMaterialVegetal">
                            <option value=<?= $mat->getIdTipoMaterialVegetal() ?>><?= $TiposMaterialVegetalDAO->getById($mat->getIdTipoMaterialVegetal())->getNombre() ?></option>
<?php foreach ($TiposMaterialVegetales as $tip) : ?>
                                <?php if ($tip->getId() != $mat->getIdTipoMaterialVegetal()): ?>
                                    <option value=<?= $tip->getId() ?>><?= $tip->getNombre() ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $mat->getDescripcion() ?></textarea>
                        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />
                    </div>

                    <br />
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