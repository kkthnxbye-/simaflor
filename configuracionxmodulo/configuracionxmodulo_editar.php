<?php include '../includes/header.php'; 

$configuracionxmoduloDAO = new configuracionxmoduloDAO();
$configuracionxmodulo = $configuracionxmoduloDAO->getById($_REQUEST['id']);

$tipoParametroDAO = new TiposParametrosDAO();
$tipoParametro = new TiposParametros();

$tipoParametro = $tipoParametroDAO->gets($campo, $tipoBusqueda, $valor);
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Configuracion por modulo / Editar</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 





            <div class="portlet-content">
                <form onSubmit="return valida_cod()" action="../php/action/configuracionxmoduloEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">									
                    
                    <div class="field">
                        <label for="valor">Valor <strong style="color: red">*</strong></label>														
                        <input id="valor" name="valor" size="50" type="text" class="medium" value="<?php echo $configuracionxmodulo->getValor(); ?>" />
                    </div>							

                     <label for="valor">Tipo de Parametro <strong style="color: red">*</strong></label>
                        <select name="TipoDeParametro" >
                            <option value="0">Seleccione</option>
                            <?php foreach ($tipoParametro as $item) {?>
                            <option value="<?= $item->getId()?>" <?php if($item->getId() == $configuracionxmodulo->getIdTipoParametro()){echo "selected";}?>><?= $item->getNombre() ?></option>
                            <?php } ?>
                        </select>


                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>" />
                    <input type="hidden" id="modulo" name="modulo" value="<?php echo $_SESSION['modulo'] ?>" />

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