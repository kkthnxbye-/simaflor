<?php
include '../includes/header.php';

include '../php/entities/TiposConfiguracionVariedad.php';

$TiposConfiguracionVariedadDAO = new TiposConfiguracionVariedadDAO();
$TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
$TiposConfiguracionVariedad = $TiposConfiguracionVariedadDAO->getListNoRepeat($_SESSION['variedad']);

$configuracionxvariedadDAO = new configuracionxvariedadDAO();
$configuracionxvariedad = $configuracionxvariedadDAO->getById($_REQUEST['id']);
?>

<style type="text/css">
    #valor{
        width: 150px;
        border: 1px solid green;
    }
</style>


<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">





            <div class="portlet-content">
                <form action="../php/action/configuracionxvariedadEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">									
                    <div class="field"><label for="valor">Valor <strong style="color: red">*</strong></label>														
                        <input id="valor" name="valor" size="50" type="text" class="medium" value="<?php echo $configuracionxvariedad->getValor(); ?>" required /></div>							

                    <input type="hidden" name="TipoDeVariedad" id="TipoDeVariedad" value="<?= $configuracionxvariedad->getIdTipoConfVariedad() ?>" />
                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>" />
                    <input type="hidden" id="variedad" name="variedad" value="<?php echo $_SESSION['variedad'] ?>" />

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