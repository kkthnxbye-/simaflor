<?php include '../includes/header.php'; ?>

<style type="text/css">
    #ancho,#largo,#area{
        border: 1px solid green;
        width: 150px
    }
</style>

<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_']." / Nuevo" ?></h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 





            <div class="portlet-content">





                <form action="../php/action/bloquespmxfincaAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">

                    <div class="field"><label for="lname">C&oacute;digo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?= $_GET['c'] ?>" required/></div>
                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?= $_GET['n'] ?>" required/></div>
                    <div class="field"><label for="lname">Ancho <strong style="color: red">*</strong></label> <input title="Campo Entero" id="ancho" name="ancho" size="50" type="text" class="medium enteros" value="<?= $_GET['a'] ?>" required/></div>
                    <div class="field"><label for="lname">Largo <strong style="color: red">*</strong></label> <input title="Campo Entero" id="largo" name="largo" size="50" type="text" class="medium enteros" value="<?= $_GET['l'] ?>" required/></div>
                    <div class="field"><label for="lname">Area <strong style="color: red">*</strong></label> 
                        <input type="hidden" id="idfinca" name="idfinca" value="<?= $_SESSION['finca'] ?>" />
                        <input title="Campo Entero" id="area" name="area" size="50" type="text" class="medium enteros" value="<?= $_GET['ar'] ?>" required/></div>			


                    <div class="field"><label for="fname">Habilitado</label> <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium" <?php if ($_GET['h'] == "on") {
    echo "checked";
} ?>/></div>							
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