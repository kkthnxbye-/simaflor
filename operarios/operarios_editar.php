
<?php include '../includes/header.php'; ?>
<?php
$operariosDAO = new operariosDAO();
$operario = $operariosDAO->getById($_REQUEST['id']);
$gruposOperariosDAO = new gruposOperariosDAO();
$gruposOperarios = $gruposOperariosDAO->gets();
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Editar</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/>

            <div class="portlet-content">

                <form action="../php/action/operariosEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">
                    <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?php echo $operario->getCodigo() ?>" required/></div>

                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $operario->getNombre() ?>" required/></div>
                    <div class="field">
                        <label for="lname">Foto</label> 
                        <input type="hidden" name="pic" value="<?=$operario->getFoto() ?>">
                        <img src="img/<?=$operario->getFoto() ?>" width="250">
                        <input id="foto" name="foto" size="50" type="file" class="medium" value="<?php echo $operario->getFoto() ?>" />
                    </div>

                    <div class="field">
                        <label for="fname">Grupo Operario <strong style="color: red">*</strong></label>
                        <select name="idGrupoOperario" id="idGrupoOperario">
                            <option value=<?= $operario->getIdGrupoOperarios() ?>><?= $gruposOperariosDAO->getById($operario->getIdGrupoOperarios())->getNombre() ?></option>
<?php foreach ($gruposOperarios as $grupoOperario) : ?>
                                <?php if ($grupoOperario->getId() != $operario->getIdGrupoOperarios()): ?>
                                    <option value=<?= $grupoOperario->getId() ?>><?= $grupoOperario->getNombre() ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />


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