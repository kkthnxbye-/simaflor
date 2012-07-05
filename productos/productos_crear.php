<?php
include '../includes/header.php';
$familiasDAO = new familiasDAO();
$familias = $familiasDAO->gets();
?>

<script>
    function validateSelect(){
        if(document.getElementById('idFamilia').value == 0){
            alert('Por favor seleccione una familia');
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





                <form onsubmit="return validateSelect()" action="../php/action/productosAdd.php" method="post" class="form label-inline">

                    <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?= $_GET['c'] ?>" required/></div>

                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?= $_GET['n'] ?>" required/></div>

                    <div class="field">
                        <label for="fname">Familia <strong style="color: red">*</strong></label>
                        <select name="idFamilia" id="idFamilia" required>
                            <option value="0">seleccione</option>
                            <?php foreach ($familias as $familia) : ?>
                                <option value=<?= $familia->getId() ?> <?php if ($familia->getId() == $_GET['fa']) {
                                echo "selected";
                            } ?>><?= $familia->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?= $_GET['d'] ?></textarea></div>

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