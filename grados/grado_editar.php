
<?php include '../includes/header.php'; ?>
<?php
$gradosDAO = new gradosDAO();
$grado = $gradosDAO->getById($_REQUEST['id']);

$productosDAO = new productosDAO();
$productos = $productosDAO->gets();

$procesosDAO = new procesosDAO();
$procesos = $procesosDAO->gets();
?>

<script>
    function validateSelect(){
        if(document.getElementById('idProceso').value == 0 || document.getElementById('idProducto').value == 0){
            document.location="grados_crear.php?id=<?=$_REQUEST['id']?>&pd="+document.getElementById('idProceso').value+"&pc="+document.getElementById('idProducto').value+"&c="+document.getElementById('codigo').value+"&n="+document.getElementById('nombre').value+"&d="+document.getElementById('descripcion').value+"&er1";
            return false;         
        }
       
        return true;
    }
</script>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">
            <br/>





            <div class="portlet-content">








                <form action="../php/action/gradosEdit.php" method="post" class="form label-inline"
                      onsubmit="return validateSelect()"
                      >

                    <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $grado->getCodigo() ?>" required/></div>

                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $grado->getNombre() ?>" required/></div>

                    <div class="field">
                        <label for="fname">Proceso <strong style="color: red">*</strong></label>
                        <select name="idProceso" id="idProceso" required>
                            <option value=<?= $grado->getIdProceso() ?>><?= $procesosDAO->getById($grado->getIdProceso())->getNombre() ?></option>
                            <?php foreach ($procesos as $proceso) : ?>
                                <?php if ($proceso->getId() != $grado->getIdProceso()): ?>
                                    <option value=<?= $proceso->getId() ?>><?= $proceso->getNombre() ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Producto <strong style="color: red">*</strong></label>
                        <select name="idProducto" id="idProducto" required>
                            <option value=<?= $grado->getIdProducto() ?>><?= $productosDAO->getById($grado->getIdProducto())->getNombre() ?></option>
                            <?php foreach ($productos as $producto) : ?>
                                <?php if ($producto->getId() != $grado->getIdProducto()): ?>
                                    <option value=<?= $producto->getId() ?>><?= $producto->getNombre() ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $grado->getDescripcion() ?></textarea>
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