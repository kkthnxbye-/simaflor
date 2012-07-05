<?php include '../includes/header.php'; ?>
<?php
$opcionesDAO = new opcionesDAO();
$opcion = $opcionesDAO->getById($_REQUEST['id']);

$modulosDAO = new modulosDAO();
$modulos = $modulosDAO->gets();
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Opciones / Editar</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/>





            <div class="portlet-content">








               <form onSubmit="return valida_cod()" action="../php/action/opcionesEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">




                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> 
                        <input type="hidden" name="idModulo" id="idModulo" value="<?php echo $_SESSION['modulo'] ?>" required/>
                        <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $opcion->getNombre() ?>" /></div>
                    <div class="field"><label for="lname">URL menu <strong style="color: red">*</strong></label> <input id="urlMenu" name="urlMenu" size="50" type="text" class="medium" value="<?php echo $opcion->getUrlMenu() ?>" required/></div>
                    <div class="field">
                       <label for="lname">Ruta archivo de ayuda</label> 
<!--                       <input id="rutaArchivoAyuda" name="rutaArchivoAyuda" size="50" type="text" 
                              class="medium" value="<?php //echo $opcion->getUrlMenu() ?>" />-->
                       <input type="file" name="archivo" class="medium"><br>
                       <label for="lname">Archivo Actual</label>
                       <?php echo $opcion->getUrlMenu(); ?>
                    </div>

                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />


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