<?php
include '../includes/header.php';
include '../php/entities/TiposConfiguracionVariedad.php';

$TiposConfiguracionVariedadDAO = new TiposConfiguracionVariedadDAO();
$TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
$TiposConfiguracionVariedad = $TiposConfiguracionVariedadDAO->getListNoRepeat($_SESSION['variedad']);
?>
<style type="text/css">
    #valor{
        width: 150px;
        border: 1px solid green;
    }
</style>

<div id="content" class="xfluid">		

    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo </h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">


            <div class="portlet-content">						
                <form  action="../php/action/configuracionxvariedadAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">									

                    <div class="field">
                        <label for="valor">Valor <strong style="color: red">*</strong></label>
                        <input id="valor" name="valor" type="text" class="medium"  required title="Numero de dias, digitar solo nuneros enteros"/>
                    </div>							


                    <div class="field">
                        <label for="Tipo de Configuraci&oacute;n">Tipo de Configuraci&oacute;n <strong style="color: red">*</strong></label>
                        <?php if($TiposConfiguracionVariedad != null): ?>
                        <select name="TipoDeVariedad">
                            <option value="0">Seleccione</option>
                            <?php foreach ($TiposConfiguracionVariedad as $item): ?>
                            <option value="<?= $item->getId() ?>" ><?= $item->getNombre() ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php elseif ($TiposConfiguracionVariedad == null): 
                                echo "<span style='color:red'>No hay mas configuraciones disponibles</span>";
                            endif; ?>
                    </div>


                    

                    <input type="hidden" id="variedad" name="variedad" value="<?php echo $_SESSION['variedad'] ?>" />

            </div>							
            <br />

            <div class="buttonrow">								
                <button class="btn btn-grey">Guardar</button>
                <button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>
            </div>
            </form>
            <br />
            <br />
            <br />
            <br />
        </div>
    </div>
</div>
</div> <!-- #content -->

<?php include '../includes/footer.php'; ?>