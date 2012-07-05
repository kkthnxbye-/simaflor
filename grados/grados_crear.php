<?php
include '../includes/header.php';
$productosDAO = new productosDAO();
$productos = $productosDAO->gets();

$procesosDAO = new procesosDAO();
$procesos = $procesosDAO->gets();
?>

<script>
    function validateSelect(){
        if(document.getElementById('idProceso').value == 0 || document.getElementById('idProducto').value == 0){
            document.location="grados_crear.php?pd="+document.getElementById('idProceso').value+"&pc="+document.getElementById('idProducto').value+"&c="+document.getElementById('codigo').value+"&n="+document.getElementById('nombre').value+"&d="+document.getElementById('descripcion').value+"&er1";
            return false;         
        }
       
        return true;
    }
</script>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/>





            <div class="portlet-content">





                <form action="../php/action/gradosAdd.php" method="post" class="form label-inline"
                      onsubmit="return validateSelect()">

                    <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?= $_GET['c'] ?>" required/></div>

                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?= $_GET['n'] ?>" required/></div>

                    <div class="field">
                        <label for="fname">Proceso <strong style="color: red">*</strong></label>
                        <select name="idProceso" id="idProceso" required>
                            <option value="0">Seleccione un proceso</option>
                            <?php foreach ($procesos as $proceso) : ?>
                            <option value=<?= $proceso->getId() ?> <?php if($_GET['pc'] == $proceso->getId()){echo "selected";} ?>><?= $proceso->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field">
                        <label for="fname">Producto <strong style="color: red">*</strong></label>
                        <select name="idProducto" id="idProducto" required>
                            <option value="0">Seleccione un producto</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value=<?= $producto->getId() ?> <?php if($_GET['pd'] == $producto->getId()){echo "selected";} ?>><?= $producto->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?= $_GET['d']?></textarea></div>

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