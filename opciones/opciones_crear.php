<?php
include '../includes/header.php';
$modulosDAO = new modulosDAO();
$modulos = $modulosDAO->gets();
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Opciones / Nuevo</h4>

            <div class="help">
              
            </div>



        </div>



        <div class="portlet-content">

            <br/>





            <div class="portlet-content">





                <form onSubmit="return valida_cod()" action="../php/action/opcionesAdd.php" method="post" class="form label-inline">





                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label>
                        <input type="hidden" name="idModulo" id="idModulo" value="<?php echo $_SESSION['modulo'] ?>" />
                        <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$_GET['n']?>" required /></div>
                    <div class="field"><label for="lname">URL menu <strong style="color: red">*</strong></label> <input id="urlMenu" name="urlMenu" size="50" type="text" class="medium" value="<?=$_GET['u']?>" required /></div>
                    <div class="field">
<label for="lname">Ruta archivo de ayuda </label> 
                       <!--                   <input id="rutaArchivoAyuda" name="rutaArchivoAyuda" size="50" type="text" 
                              class="medium" value="<?//=$_GET['r']?>" required/>-->
<input type="file" name="archivo" class="medium"> 
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