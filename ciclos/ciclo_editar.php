<?php include '../includes/header.php'; ?>
<?php
$ciclosDAO = new ciclosDAO();
$ciclo = $ciclosDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 





            <div class="portlet-content">					
                <form onSubmit="return valida_cod()" action="../php/action/cicloEdit.php" method="post" class="form label-inline">



                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $ciclo->getNombre() ?>" required/></div>



                    <div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $ciclo->getDescripcion() ?></textarea>
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