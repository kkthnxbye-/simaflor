<?php include '../includes/header.php'; ?>
<?php
$breedersDAO = new breedersDAO();
$breeders = $breedersDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 





            <div class="portlet-content">
                <form onSubmit="return valida_cod()" action="../php/action/breedersEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">									
                    <div class="field"><label for="codigo">C&oacute;digo <strong style="color: red">*</strong></label>
                        <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?php echo $breeders->getCodigo(); ?>" required/></div>	

                    <div class="field"><label for="nombre">Nombre <strong style="color: red">*</strong></label>
                        <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $breeders->getNombre(); ?>" required/></div>							

                    <div class="field"><label for="descripcion">Descripcion <strong style="color: red">*</strong></label>
                    <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$breeders->getDescripcion()?></textarea>    
                    </div>              
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