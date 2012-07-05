<?php
include '../includes/header.php';
$variedadesDAO = new VariedadesDAO();
$laboresPMDAO = new laboresPMDAO();
$labores = $laboresPMDAO->gets();
$metricasDAO = new metricasDAO();
$metricas = $metricasDAO->gets();
$pro_single = $variedadesDAO->getById($_SESSION['variedad']);
?>

<style type="text/css">
    #cantidad{
        width: 150px;
        border: 1px solid green;
    }
</style>

<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / PM / Nuevo</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <div class="portlet-content">





                <form onSubmit="return valida_cod()" action="../php/action/laboresPMXVariedadAdd.php" method="post" class="form label-inline">


                    <div class="field">
                        <label for="fname">LaboresPM <span style="color:red">(*)</span></label>
                        <input type="hidden" id="idVeriedad" name="idVeriedad" value="<?php echo $_SESSION['variedad'] ?>" />
                        <select name="idLabor" id="idLabor">
                            <option value="0">Seleccionar</option>
                            <?php foreach ($labores as $la) : ?>
                                <option value=<?= $la->getId() ?>><?= $la->getNombre() ?></option>
<?php endforeach; ?>
                        </select>
                    </div>



                    <div class="field">
                        <label for="fname">Cantidad <span style="color:red">(*)</span>
                        </label> 
                        <input id="cantidad" name="cantidad" title="Digite solo numeros enteros" type="text" class="medium" />
                    </div>

                    <div class="field">
                        <label for="lname">Tiempo cumplimiento <span style="color:red">(*)</span></label> 
                        <select name="tp" id="tp">
                            <option value="0">Seleccionar</option>
                            <?php for ($f = 1; $f <= 100; $f++) { ?>
                                <option value="<?php echo $f ?>"><?php echo $f; ?></option>
<?php } ?>
                        </select>
                    </div>

                    <div class="field"><label for="lname">Unidad <span style="color:red">(*)</span></label>
                        <select name="unidad" id="unidad" style="display:inline">
                            <option value="0">Seleccionar</option>
                            <? foreach ($metricas as $metrica): ?>
                                <option value="<?= $metrica->getId() ?>"><?= $metrica->getNombre() ?></option>
<? endforeach; ?>   
                        </select>
                    </div>

                    <div class="field"><label for="description">Observaciones</label> <textarea rows="7" cols="50" name="ob" id="ob"></textarea></div>

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