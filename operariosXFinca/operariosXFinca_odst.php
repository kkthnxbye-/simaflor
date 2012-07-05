<?php
include '../includes/header.php';
$empresasDAO = new empresasDAO();
$empresa = $empresasDAO->getById($_SESSION['finca']);
$operariosDAO = new operariosDAO();


$operariosXFincaDAO = new operariosXFincaDAO();
$buscador = $_REQUEST['buscador'];

if ($buscador == "") {
    $operarios = $operariosDAO->gets();
} else {

    $operarios = $operariosDAO->getsbybuscar("Nombre", "parte", $buscador);
}
?>

<script>
    function cambia_todos(){
        var todos = document.getElementById('total').value;
        var estado = false;
	
        if (document.getElementById('ck_todos').checked){
            estado=true;
        }
        else{
            estado=false;
        }
        var s=1;
        while (s<=todos){
            $('#ck_'+s).attr('checked', estado);
            //document.getElementById().checked = estado;
            //alert(document.getElementById('ck_'+s).checked);
            s++;
        }
    }
</script>

<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Fincas / <?php echo $empresa->getNombre(); ?> / Operarios </h4>

           


        </div>



        <div class="portlet-content">
            <div class="portlet-content">





                <form onSubmit="return valida_cod()" action="../php/action/operariosXFincaOdst.php" method="post" class="form label-inline">




                    <div class="field">
                        <label for="fname">Operarios</label>
                        <input type="hidden" id="idFinca" name="idFinca" value="<?php echo $_SESSION['finca'] ?>" />
                        <input type="hidden" id="total" name="total" value="<?php echo count($operarios); ?>" />														
                        <div style=" width:400px;">
                            <table><tr><td><input type="text" name="buscar_p" id="buscar_p" value="<?php echo $buscador ?>" /></td><td><button class="btn btn-black" type="button" onclick="location.href='operariosXFinca_odst.php?buscador='+document.getElementById('buscar_p').value">Buscar</button>

                                    </td>
                                    <td><button class="btn btn-black" type="button" onclick="location.href='operariosXFinca_odst.php?buscador='">Limpiar Filtro</button></td>
                                </tr></table>
                            <table>

                                <tr><td></td><td><b>Operario</b></td></tr>
                                <?php
                                $dd = 0;
                                foreach ($operarios as $operario) :
                                    $dd++;
                                    ?>
                                    <tr><td><input type="checkbox" name="ck_<?php echo $dd; ?>" id="ck_<?php echo $dd; ?>" <?php if ($operariosXFincaDAO->Confirmas($_SESSION['finca'], $operario->getId())) { ?> checked="checked" <?php } ?>  value="on"/><input type="hidden" name="ope_<?= $dd ?>" id="ope_<?= $dd ?>" value="<?= $operario->getId() ?>"  /></td><td><?= $operario->getNombre() ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                    <br />
                    <div class="buttonrow">

                        <button class="btn btn-grey">Guardar</button>

                        <button class="btn btn-black" type="button" onclick="location.href='../empresas/lista.php'">Cancelar</button>

                    </div>

                </form>



                <br /><br />

                <br /><br />



            </div>



        </div>

    </div>







</div> <!-- #content -->

<?php include '../includes/footer.php'; ?>