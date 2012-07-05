<?php
include '../includes/header.php';
$permisosXOpcionXGrupoUsuarioDAO = new permisosXOpcionXGrupoUsuarioDAO();
$permisos = $permisosXOpcionXGrupoUsuarioDAO->gets();
$l1 = $_REQUEST['id'];
$grupoUsuarioDAO = new gruposUsuarioDAO();
$grupo = $grupoUsuarioDAO->getById($_REQUEST['id']);

$modulosDAO = new modulosDAO();
if ($_SESSION['page'] != "modulos") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}

$modulos = $modulosDAO->getsbybuscar("todos", "parte", "");

$op = new opcionesDAO();
$o = $op->gets();


$operariosXFincaDAO = new operariosXFincaDAO();
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

        <div class="portlet-header"><h4><?= $_SESSION['url_']; ?> / <?= $grupo->getNombre() ?></h4>

            <div class="help">

                <a href="../gruposUsuario/lista.php" class="btn_black">  
                    &nbsp;&nbsp;Atras
                </a>

            </div>


        </div>



        <div class="portlet-content">

            <div class="portlet-content">





                <form onSubmit="return valida_cod()" action="../php/action/permisosXOpcionXGrupoUsuarioOdst.php?id=<?= $l1 ?>" method="post" class="form label-inline">




                    <div class="field">

                        <input type="hidden" id="total" name="total" value="<?php echo count($o); ?>" />														
                        <div style=" width:400px;">
                            <table>

                                <?php
                                $dd = 0;
                                foreach ($modulos as $modulo) {
                                    ?>
                                    <tr><td colspan="3"><b><?php echo $modulo->getNombre(); ?></b></td></tr>
                                    <tr><td>Consultar</td><td>Modificar</td><td><b>Permisos</b></td></tr>
                                    <?php
                                    $opciones = $op->getsbybuscar($modulo->getId(), "todos", "parte", "");
                                    foreach ($opciones as $p) :
                                        $dd++;
                                        $dat_per = $permisosXOpcionXGrupoUsuarioDAO->Confirmas($l1, $p->getId());
                                        if ($dat_per == null) {
                                            $dat_per = new permisosXOpcionXGrupoUsuario();
                                        }
                                        ?>
                                        <tr><td><input type="checkbox" name="ckc_<?php echo $dd; ?>" id="ckc_<?php echo $dd; ?>" <?php if ($dat_per->getPermiteConsultar() == "1") { ?> checked="checked" <?php } ?>  value="on"/><input type="hidden" name="ope_<?= $dd ?>" id="ope_<?= $dd ?>" value="<?= $p->getId() ?>"  /></td>
                                            <td><input type="checkbox" name="ckm_<?php echo $dd; ?>" id="ckm_<?php echo $dd; ?>" <?php if ($dat_per->getPermiteModificar() == "1") { ?> checked="checked" <?php } ?>  value="on"/></td>
                                            <td><?= $p->getNombre() ?></td></tr>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </table>
                        </div>
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