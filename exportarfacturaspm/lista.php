<?php
include '../includes/header.php';
require_once '../php/dao/movimientosInventarioDAO.php';
require_once '../php/entities/movimientosInventarioPM.php';
require_once '../php/dao/empresasDAO.php';
require_once '../php/entities/empresas.php';
require_once '../php/dao/documentoInventarioPMDAO.php';
require_once '../php/entities/documentoInventarioPM.php';
require_once '../php/dao/facturasPMDAO.php';
require_once '../php/entities/facturasPM.php';


$movimientoInventarioDAO = new MovimientosInventarioDAO();
$movimientoInventario = new movimientosInventarioPM();
$empresasDAO = new empresasDAO();
$empresas = new empresas();
$documentosDAO = new documentoInventarioPMDAO();
$tipoMovimientoDAO = new TiposMovimientoInventarioDAO();
$tipoMovimiento = new TiposMovimientoInventario();

$tipoMovimiento = $tipoMovimientoDAO->gets($campo, $tipoBusqueda, $valor);

$facturasPMDAO = new FacturasPMDAO();

$_SESSION['all'] = "all";

if (!empty($_POST['page'])) {
    $_SESSION['page'] = $_POST['page'];
}
if (!empty($_REQUEST['page_bus'])) {
    $_SESSION['page'] = "busk_sin";
}
if (!empty($_POST['campo'])) {
    $_SESSION['campo'] = $_POST['campo'];
    $_SESSION['all'] = "";
}
if (!empty($_POST['tipo_b'])) {
    $_SESSION['tipo_b'] = $_POST['tipo_b'];
}
if (!empty($_POST['valor'])) {
    $_SESSION['valor'] = $_POST['valor'];
}
if (!empty($_POST['fechaingreso'])) {
    $_SESSION['fechaingreso'] = $_POST['fechaingreso'];
}
if (!empty($_POST['id_cliente'])) {
    $_SESSION['id_cliente'] = $_POST['id_cliente'];
    $empresas = $empresasDAO->getById($_SESSION['id_cliente']);
}


if (isset($_REQUEST['page_bus'])) {
    unset($_SESSION['campo']);
    unset($_SESSION['valor']);
    unset($_SESSION['tipo_b']);
    unset($_SESSION['fechaingreso']);
    unset($_SESSION['id_cliente']);
    $_SESSION['all'] = "all";
}



$_SESSION['fechaingreso'] = str_replace("/", "-", $_SESSION['fechaingreso']);

$movimientoInventario = $movimientoInventarioDAO->getSearchFactu($_SESSION['all'], $_SESSION['campo'], $_SESSION['fechaingreso'], $_SESSION['id_cliente']);
?>




<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4>

            <div class="help">
                <?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> 
            </div>



        </div>



        <div class="portlet-content">
            <div class="user_tit">
                Desde
                <input type="text" name="from" id="from">
                
                Hasta
                <input type="text" name="to" id="to">
                
                Fecha Facturaci&oacute;n
                <input type="text" name="date" id="date">
                
                TRM
                <input type="text" name="trm" id="trm">
                <button class="btn btn-grey" id="generate">Generar</button>
            </div>
           
           <br/><br/><br/><br/>
           
           <div id="facturas">
              
           </div> 

            

            
        </div>
    </div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
<style>
    .capacalendario{
        width: 219px;
        position: absolute;
        display: none;
        background-color: #fff;
        z-index:50000;
    }
    .capacalendarioborde{
        padding: 3px;
        border: 1px solid #ddd;
    }
    .diassemana{
        overflow: hidden;
        margin: 3px 0;
        clear: both;
        background-image: url(../img/back_blue.png);
        background-repeat: repeat-x;
    }
    .diasmes{
        overflow: hidden;
    }
    .diassemana span, .diasmes span{
        margin: 3px;
        width: 25px;
        display: block;
        float: left;
        text-align: center;
        height: 1.5em;
        line-height: 1.5em;
        font-size: 0.875em;
    }
    .diassemana span{
        text-transform: uppercase;
        color: #fff;
        font-weight: bold;
        height: 1.8em;
        line-height: 1.8em;
    }
    .diasmes span{
        background: #ddd;
        cursor: pointer;
    }
    .diasmes span.diainvalido{
        cursor: default;
        background-color: #FFF;
    }
    .diasmes span.domingo{
        color: #c00;
    }
    .capacalendario span.primero{
        margin-left:0 !important;
    }
    .capacalendario span.ultimo{
        margin-right:0 !important;
    }

    a.botoncal{
        margin-left: 5px;
        background: transparent url(../img/calendario.png) no-repeat;
    }
    a.botoncal span{
        display: inline-table;
        width: 16px;
        height: 16px;
    }
    a.botonmessiguiente{
        float: right;
        background: transparent url(../img/105.png) no-repeat;
        margin: 5px 5px 0 5px;
        height:10px;
    }
    a.botonmessiguiente span, a.botonmesanterior span, a.botoncambiaano span{
        display: inline-table;
        width: 10px;
        height: 10px;
    }
    a.botonmesanterior{
        float: left;
        background: transparent url(../img/106.png) no-repeat;
        margin: 5px 5px 0 5px;
        height:10px;
    }
    a.botoncambiaano{
        background: transparent url(../img/193.png) no-repeat;
        margin: 5px 5px 0 5px;
        font-size: 0.8em;
    }
    .textomesano{
        background-color: #FFF;
        overflow: hidden;
        padding: 2px;
        font-size: 0.8em;
        font-weight: bold;
        text-align: center
    }
    .mesyano{
        margin-top: 3px;
    }
    .visualmesano{
        display: inline;
    }
    .capacerrar{
        background-color: #EAEAEA;
        overflow: hidden;
        padding: 2px;
        font-size: 0.5em;
    }
    a.calencerrar{
        float: right;
        margin: 2px 5px 0 5px;
        background-color: #E0E0E0;
        background-image: url(../img/101.png);
        background-repeat: no-repeat;
    }
    a.calencerrar span{
        display: inline-table;
        width: 10px;
        height: 10px;
    }
    .capaselanos{
        width: 50px;
        display: none;
        font-size: 0.8em;
        text-align: center;
        position: absolute;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .capaselanos a{
        display: block;
        text-decoration: none;
        border-bottom: 1px solid #ddd;
        padding: 2px 0;
    }
    .capaselanos a.seleccionado{
        background-color: #069;
        font-weight: bold;
        color: #FFF;
    }
    .capaselanos a.ultimo{
        border: 0;
    }
</style>
<script src="../js/calendario_k.js" type="text/javascript"></script>
<!--<script src="../inventarioEntrada/functions.js" type="text/javascript"></script>-->
<script>
    
    $(document).ready(function(){
        
        $('#from').calendarioDW("2011-01-01","2020-12-31");
        $('#to').calendarioDW("2011-01-01","2020-12-31");
        $('#date').calendarioDW("2011-01-01","2020-12-31");
        
        jQuery('#generate').on('click',function(){
           var from  =  jQuery('#from').val();
               to    =  jQuery('#to').val();
               date  =  jQuery('#date').val();
               TRM   =  jQuery('#trm').val();
           if(((from != '' && to != '') || date != '') && TRM != ''){
              jQuery.ajax({
                 url :  'getFiles.php',
                 type:  'GET',
                 data:  {
                    'from' :  from,
                    'to'   :  to,
                    'date' :  date,
                    'trm'  : TRM
                 },
                 success:function(data){
                    jQuery('#facturas').html(data);
                 }
              });
           }
        });
        
    });
</script>