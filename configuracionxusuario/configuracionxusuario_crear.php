<?php
include '../includes/header.php';
$UsuariosDAO = new UsuariosDAO();
$obj_usuario = $UsuariosDAO->getById($_SESSION['usuario']);

$TipoDeConfiguracionDAO = new TiposConfiguracionUsuarioDAO();
$TipoDeConfiguracion = $TipoDeConfiguracionDAO->gets($campo, $tipoBusqueda, $valor);
?>

<div id="content" class="xfluid">		

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_']; ?> / Nuevo</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 


            <div class="portlet-content">						
                <form  action="../php/action/configuracionxusuarioAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">									

                    <div class="field">

                        <label for="valor">Valor <strong style="color: red">*</strong></label>
                        <input id="valor" name="valor" size="50" type="text" class="medium" value="<?=$_GET['v']?>" required/>
                    </div>

                    <div class="field">

                        <label for="valor">Tipo de Configuraci&oacute;n <strong style="color: red">*</strong></label>
                        <select name="TipoDeConfiguracion">
                            <option value="0">Seleccione</option>
                            <?php foreach ($TipoDeConfiguracion as $item) { ?>
                            <option value="<?= $item->getId() ?>" <?php if($_GET['t']==$item->getId()){echo "selected";}?>><?= $item->getNombre() ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION['usuario'] ?>" />

            </div>							
            <br />

            <div class="buttonrow">								
                <button class="btn btn-grey">Guardar</button>
                <button class="btn btn-black" type="button" onclick="location.href='lista.php?usuario=<?=$_SESSION['usuario']?>'">Cancelar</button>
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