<?php
include '../includes/header.php';

$tipoAreaDAO = new TiposAreaPMDAO();
$tipoArea = new TiposAreaPM();

$tipoArea = $tipoAreaDAO->gets($campo, $tipoBusqueda, $valor);

?>

<style type="text/css">
    #AreadeCultivo,#AreadeCamino,#capacidad{
        border: 1px solid green;
        width: 150px
    }
</style>

<div id="content" class="xfluid">		

    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Areas / Nuevo</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 


            <div class="portlet-content">						
                <form action="../php/action/areaspmxbloquepmAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">									
                    <div class="field">
                        <label for="codigo">C&oacute;digo <strong style="color: red">*</strong></label>
                        <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?= $_GET['c'] ?>" required />
                    </div>							

                   
                        
                    <div class="field">
                        <label for="codigo">Tipos de Area <strong style="color: red">*</strong></label>
                        <select name="idTipoArea">
                            <option value="o" >Seleccione</option>
                            <?php foreach ($tipoArea as $item) {?>
                            <option value="<?= $item->getId() ?>" <?php if($_GET['ta']==$item->getId()){echo "selected";} ?> ><?= $item->getNombre() ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="field"><label for="nombre">Nombre <strong style="color: red">*</strong></label>
                        <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?= $_GET['n'] ?>" required /></div>							

                    <div class="field"><label for="capacidad">Capacidad <strong style="color: red">*</strong></label>
                        <input id="capacidad" name="capacidad" title="Digita solo numeros enteros" size="50" type="text" class="medium" value="<?= $_GET['ca'] ?>" required /></div>							

                    <div class="field"><label for="AreadeCultivo">Area de Cultivo <strong style="color: red">*</strong></label>
                        <input id="AreadeCultivo" name="AreadeCultivo" title="Digita solo numeros enteros" size="50" type="text" class="medium" value="<?= $_GET['acu'] ?>" required /></div>							

                    <div class="field"><label for="AreadeCamino">Area de Camino <strong style="color: red">*</strong></label> 
                        <input id="AreadeCamino" name="AreadeCamino" title="Digita solo numeros enteros" size="50" type="text" class="medium" value="<?= $_GET['aca'] ?>" required /></div>							

                    <div class="field"><label for="habilitado">Habilitado </label> 
                        <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium" <?php if($_GET['h'] == "on"){echo "checked";}?> />
                        <input type="hidden" id="bloque" name="bloque" value="<?php echo $_SESSION['bloque'] ?>" />
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