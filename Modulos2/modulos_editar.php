<?php include '../includes/header.php'; ?>
<?php
$modulosDAO = new modulosDAO();
$modulo = $modulosDAO->getById($_REQUEST['id']);

$mDAO = new Menu_raizDAO();

$menus = $mDAO->getByOrder();
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Editar</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/>





            <div class="portlet-content">

                <form onSubmit="return valida_cod()" action="../php/action/modulosEdit.php" method="post" class="form label-inline">

                    <div class="field">
                        <label for="lname">Modulo Raiz <strong style="color: red">*</strong></label>
                        <select id="modulo_raiz" name="modulo_raiz">
                            <?php foreach ($menus as $m): ?>
                                <option <?php if ($modulo->getIdMenuRaiz() == $m->getId()): echo 'selected';
                                endif; ?>  value="<?= $m->getId() ?>"><?= $m->getNombre(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $modulo->getNombre() ?>" required/></div>
                    <input type="hidden" name="id" id="id" value="<?= $_GET['id']; ?>" />

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