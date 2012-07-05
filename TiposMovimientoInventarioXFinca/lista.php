<?php
include '../includes/header.php';
include_once '../php/dao/TiposMovimientosInventarioXFincaDAO.php';

$_SESSION['finca'] = $_GET['finca'];

$empresasDAO = new empresasDAO();
$empresa = $empresasDAO->getById($_SESSION['finca']);

$TiposMovimientoInventarioXFincaDAO = new TiposMovimientoInventarioXFincaDAO();
$TiposMovimientoInventarioXFinca = new TiposMovimientoInventarioXFinca();
$TiposMovimientoInventarioXFinca = $TiposMovimientoInventarioXFincaDAO->gets();

$tipoMovimientoDAO = new TiposMovimientoInventarioDAO();
$tipoMovimientos = new TiposMovimientoInventario();

$tipoMovimientos = $tipoMovimientoDAO->gets("IDFinca", $tipoBusqueda, $_SESSION['finca']);
$total = $tipoMovimientoDAO->total($campo, $tipoBusqueda, $valor);
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

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Tipos de movimiento de inventarios / <?= $empresa->getNombre() ?></h4>

            <div class="help"></div>



        </div>



        <div class="portlet-content">



            <div class="portlet-content">





                <form onsubmit="return confirmaFor(this)" action="../php/action/tipoMovimientoInventarioXFincaEdit.php" method="post" class="form label-inline">

<div class="field">
    <input type="hidden" id="idFinca" name="idFinca" value="<?php echo $_SESSION['finca'] ?>" />
    <input type="hidden" id="total" name="total" value="<?= $total ?>" />														
    <div style=" width:400px;">
        <table style="text-align: center">
            <tr>
                <td><b>Seleccionados</b></td>
                <td><b>Por Defecto</b></td>
                <td><b>Tipo de movimiento</b></td>
                <td><b>Consecutivo</b></td>
            </tr>

            <?php
            $dd = 0;
            foreach ($tipoMovimientos as $producto) :
                $dd++;
                  $TiposMovimientoInventarioXFinca = $TiposMovimientoInventarioXFincaDAO->getByIdTipoMovimiento($producto->getId(),$_SESSION['finca']);
                  
                  
                  if($TiposMovimientoInventarioXFinca != null){
                      $defecto = $TiposMovimientoInventarioXFinca->getEsPorDefecto();
                      $consecutivo = $TiposMovimientoInventarioXFinca->getConsecutivo();
                  }else{
                      $consecutivo = 0;
                  }
                  
                ?>
                <tr>
                    <td>
                        <?php if($consecutivo != 0):?>
                        <img src="chulo_verde.png" >
                        <span style="display: none">
                        <?php endif; ?>
                            <input type="checkbox" name="ck_<?php echo $dd; ?>" id="ck_<?php echo $dd; ?>" <?php if ($TiposMovimientoInventarioXFincaDAO->Confirmas($_SESSION['finca'], $producto->getId())) { echo 'checked';  } ?>  />
                        <?php if($consecutivo != 0):?>
                        </span>
                        <?php endif; ?>
                    </td>    
                    <td>
                        <input type="radio" name="esPorDefecto" value="<?=$producto->getId() ?>" <?php if($producto->getId() == $defecto){echo "checked='true' ";}?> onclick="document.getElementById('defe').value=<?=$producto->getId()?>">
                        <input type="hidden" name="prod_<?= $dd ?>" id="prod_<?= $dd ?>" value="<?= $producto->getId() ?>"  />
                        
                    </td>
                    <td>
                        <div style="width: 300px;position: relative;-border: 1px solid red"> <?= $producto->getNombre() ?></div>
                    </td>
                    <td>
                        <input type="text" name="con_<?= $dd ?>" id="con_<?= $dd ?>" value="<?= $consecutivo ?>" <?php if($consecutivo != 0){echo 'readonly style="border: none;color: green;font-weight: bold;text-align: center"';}?> >
                    </td>
                </tr>
            <?php endforeach; ?>
                <input type="hidden" name="defe" id="defe" value="<?=$defecto?>">
                
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