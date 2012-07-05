<?php
include '../includes/header.php';
$gruposOperariosDAO = new gruposOperariosDAO();
$gruposOperarios = $gruposOperariosDAO->gets();
?>


<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Nuevo</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/>





            <div class="portlet-content">





                <form  action="../php/action/operariosAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">

                    <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$_GET['c']?>" required/></div>
                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$_GET['n']?>" required/></div>
                    <div class="field"><label for="lname">Foto <strong style="color: red">*</strong></label> <input id="foto" name="foto" size="50" type="file" class="medium" required/></div>


                    <div class="field">
                        <label for="fname">Grupo Operario <strong style="color: red">*</strong></label>
                        <select name="idGrupoOperario" id="idGrupoOperario">
                            <option value="0">Seleccione</option>
                            <?php foreach ($gruposOperarios as $grupoOperario) : ?>
                                <option value=<?= $grupoOperario->getId() ?>  <?php if($grupoOperario->getId() == $_GET['g']){echo "selected";}?> ><?= $grupoOperario->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
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