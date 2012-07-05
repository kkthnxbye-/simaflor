<?php
include '../includes/header.php';
$UsuariosDAO = new UsuariosDAO();
$usuario = $UsuariosDAO->getById($_REQUEST['id_usuario']);
$empresasDAO = new empresasDAO();
$empresas = $empresasDAO->gets();
$UsuariosXEmpresaDAO = new UsuariosXEmpresaDAO();
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

        <div class="portlet-header"><h4><?= $_SESSION['url_']; ?> / Finca</h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/>





            <div class="portlet-content">





                <form action="../php/action/usuariosXEmpresaOdst.php" method="post" class="form label-inline">




                    <div class="field">
                        
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_REQUEST['id_usuario'] ?>" />
                        <input type="hidden" id="total" name="total" value="<?php echo count($empresas); ?>" />														
                        <div style=" width:400px;">
                            <table>
                                <tr><td></td><td><b>Finca</b></td></tr>
                                <?php
                                $dd = 0;
                                foreach ($empresas as $empresa) :
                                    $dd++;
                                    ?>
                                    <tr><td><input type="checkbox" name="ck_<?php echo $dd; ?>" id="ck_<?php echo $dd; ?>" <?php if ($UsuariosXEmpresaDAO->Confirmas($_REQUEST['id_usuario'], $empresa->getId())) { ?> checked="checked" <?php } ?>  value="on"/><input type="hidden" name="prod_<?= $dd ?>" id="prod_<?= $dd ?>" value="<?= $empresa->getId() ?>"  /></td><td><?= $empresa->getNombre() ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                    <br />
                    <div class="buttonrow">

                        <button class="btn btn-grey">Guardar</button>

                        <button class="btn btn-black" type="button" onclick="location.href='../Usuarios/UsuariosList.php'">Cancelar</button>

                    </div>

                </form>



                <br /><br />

                <br /><br />



            </div>



        </div>

    </div>







</div> <!-- #content -->

<?php include '../includes/footer.php'; ?>