<?php include '../includes/header.php'; ?>
<?php
$bloquespmxfincaDAO = new bloquespmxfincaDAO();
$bloquespmxfinca = $bloquespmxfincaDAO->getById($_REQUEST['id']);
?>
<style type="text/css">
    #ancho,#largo,#area{
        border: 1px solid green;
        width: 150px
    }
</style>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_']." / Editar" ?></h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 





            <div class="portlet-content">





                <form action="../php/action/bloquespmxfincaEdit.php" method="post" class="form label-inline"  enctype="multipart/form-data">

                    <div class="field"><label for="fname">C&oacute;digo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $bloquespmxfinca->getCodigo(); ?>" required /></div>
                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium"  value="<?php echo $bloquespmxfinca->getNombre(); ?>" required/></div>



                    <div class="field"><label for="lname">Ancho <strong style="color: red">*</strong></label> <input id="ancho" name="ancho" size="50" type="text" class="medium"  value="<?php echo $bloquespmxfinca->getAncho(); ?>" required/></div>
                    <div class="field"><label for="lname">Largo <strong style="color: red">*</strong></label> <input id="largo" name="largo" size="50" type="text" class="medium"  value="<?php echo $bloquespmxfinca->getLargo(); ?>" required/></div>
                    <div class="field"><label for="lname">Area <strong style="color: red">*</strong></label> 
                        <input id="area" name="area" size="50" type="text" class="medium" value="<?php echo $bloquespmxfinca->getArea(); ?>"  required/></div>

                    <div class="field"><label for="fname">Habilitado</label> <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium"  <?php if ($bloquespmxfinca->getHabilitado() == "1") { ?> checked="checked" <?php } ?>/></div>							
                    <br />
                    <div class="buttonrow">
                        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>" />
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