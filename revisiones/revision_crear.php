<?php
include '../includes/header.php';
include '../php/entities/revisiones.php';

$pedido_id = $_GET['pedido_id'];

$ciclosDAO = new ciclosDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$productosDAO = new productosDAO();
//$productos = $productosDAO->gets();
//$materiales_vegetales = $materialesVegetalesDAO->gets();
//$servicios = $serviciosDAO->gets();
//$ciclos = $ciclosDAO->gets();

$pedidosDAO = new pedidosDAO();
$pedidos = new pedidos();
$pedidos = $pedidosDAO->getById($pedido_id);

$VariedadesDAO = new VariedadesDAO();
$variedades = $VariedadesDAO->gets("IDProducto", $tipob, $pedidos->getProducto());

$tiposUnidadDAO = new TiposUnidadesPMDAO();
$tiposUnidad = $tiposUnidadDAO->gets($campo, $tipoBusqueda, $valor);

$gradosDAO = new gradosDAO();
$grados = new grados();
$grados = $gradosDAO->gets();

$causaDAO = new causasnacionalDAO();
$causa = $causaDAO->gets();

$operariosDAO = new operariosDAO();
$operarios = $operariosDAO->gets();


unset($_SESSION['lista_revisiones']);

if (empty($_SESSION['lista_revisiones'])) {
    $listadetalles = new Revisiones();
} else {
    $listadetalles = unserialize($_SESSION['lista_revisiones']);
}

foreach ($listadetalles as $lis_det) {
    $tu_ = $lis_det->getIdTipoUnidadPM();
    $va_ = $lis_det->getIdVariedad();
    $gr_ = $lis_det->getIdGrado();
}
?>

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

<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] . " / Revisando" ?></h4>





        </div>



        <div class="portlet-content">


            <div class="portlet x12">





                <div class="portlet-content">

                    <div id="div_form_detalle1">

                        <div class="form label-inline">
                            <div style="float: left;-border: 1px solid red;width: 300px">
                                <div class="field">
                                    <input type="hidden" name="mant" id="mant" value="<?php
if (isset($_SESSION['lista_revisiones'])) {
    echo '1';
} else {
    echo '0';
}
?>" >


                                    <label for="fname">Tipo unidad <strong style="color: red">*</strong></label> 
                                    <select size="1" class="medium" id="idTipoUnidad" name="idTipoUnidad" <?php if (isset($_SESSION['lista_revisiones'])) echo "disabled"; ?>>
                                        <option value="0">Seleccione</option>  
                                        <?php foreach ($tiposUnidad as $item): ?>
                                            <option value="<?= $item->getId() ?>"><?= $item->getNombre() ?></option>  
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" id="idTipoUnidadH" value="<?php if (isset($_SESSION['lista_revisiones'])) echo $tu_; ?>">
                                </div>

                                <div class="field">

                                    <label for="type">Variedad <strong style="color: red">*</strong></label>

                                    <select size="1" class="medium" id="idVariedad" name="idVariedad" <?php if (isset($_SESSION['lista_revisiones'])) echo "disabled"; ?>>
                                        <option value="0">Seleccione</option>  
                                        <?php foreach ($variedades as $vari) { ?>
                                            <option value="<?php echo $vari->getId(); ?>"><?php echo $vari->getNombre(); ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" id="idVariedadH" value="<?php if (isset($_SESSION['lista_revisiones'])) echo $va_; ?>">

                                </div>
                                <div class="field">

                                    <label for="lname">Grado <strong style="color: red">*</strong></label> 
                                    <select size="1" class="medium" id="idGrado" name="idGrado" <?php if (isset($_SESSION['lista_revisiones'])) echo "disabled"; ?>>
                                        <option value="0">Seleccione</option>  
                                        <?php foreach ($grados as $grado): ?>
                                            <option value="<?= $grado->getId() ?>"><?= $grado->getNombre() ?></option>  
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" id="idGradoH" value="<?php if (isset($_SESSION['lista_revisiones'])) echo $gr_; ?>">
                                    <hr>
                                </div>

                                <div class="field">
                                    <label for="fname">Cantidad <strong style="color: red">*</strong></label> 
                                    <input type="text" name="cantidad" id="cantidad" required>
                                </div>


                                <div class="field">

                                    <label for="fname">Estado <strong style="color: red">*</strong></label> 
                                    Bueno <input type="radio" name="estaBueno" id="estaBueno" value="1" onclick="setAtrrEnabled()">
                                    Malo <input type="radio" name="estaBueno" id="estaBueno" value="0" onclick="setAtrrDisabled()" >

                                </div>
                            </div>
                            <div style="float: left;-border: 1px solid red;width: 300px">


                                <div class="field">

                                    <label for="fname">Reclamar </label> 
                                    Si <input type="radio" name="desechado" id="desechado1" value="1" disabled>
                                    No <input type="radio" name="desechado" id="desechado2" value="0" disabled>

                                </div>

                                <div class="field">

                                    <label for="type">Causa nacional </label>

                                    <select size="1" class="medium" id="idCausaNacional" name="idCausaNacional" disabled >
                                        <option value="0">Seleccione</option>  
                                        <?php foreach ($causa as $item) { ?>
                                            <option value="<?php echo $item->getId(); ?>"><?php echo $item->getNombre(); ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="field">

                                    <label for="type">Operario <strong style="color: red">*</strong></label>

                                    <select size="1" class="medium" id="idOperario" name="idOperario">
                                        <option value="0">Seleccione</option>  
                                        <?php foreach ($operarios as $item) { ?>
                                            <option value="<?php echo $item->getId(); ?>"><?php echo $item->getNombre(); ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="field">

                                    <label for="type">Habilitado</label>

                                    <input type="checkbox" name="habilitado" id="habilitado">

                                </div>



                                <br />

                                <div class="buttonrow">

                                    <button class="btn btn-grey" onclick="addDeta()">Agregar</button>

                                    <br/><br/>

                                </div>
                            </div>




                        </div>
                    </div>






                    <script>



                        setTimeout("carga_lista_detalle()","1000");

                        function carga_lista_detalle(){
                            $.ajax({
                                url: "lista_detalles.php",
                                type: "POST",
                                data: {

                                },
                                success: function(msg){
                                    $("#div_list_detalle").html(msg);                                   	
                                }
                            });
                        }

                        function select_cliente(id,texto){
                            document.getElementById('id_cliente').value = id;
                            document.getElementById('cliente').value = texto;
                            $("#busqueda_clientes").html("");
                        }

                        function select_proveedor(id,texto){
                            document.getElementById('id_proveedor').value = id;
                            document.getElementById('proveedor').value = texto;
                            $("#busqueda_proveedores").html("");
                        }

                        function buscar_cliente(){
                            //alert('dgd');
                            var cliente = document.getElementById('cliente').value;
                            //alert(cliente);
                            $.ajax({
                                url: "buscar_clientes.php",
                                type: "POST",
                                data: {
                                    nombre:cliente,
                                    tipo : 1
                                },
                                success: function(msg){
                                    $("#busqueda_clientes").html(msg);                                   	
                                }
                            });
                        }

                        function buscar_proveedor(){

                            var proveedor = document.getElementById('proveedor').value;

                            $.ajax({
                                url: "buscar_clientes.php",
                                type: "POST",
                                data: {
                                    nombre:proveedor,
                                    tipo : 2
                                },
                                success: function(msg){
                                    $("#busqueda_proveedores").html(msg);                                   	
                                }
                            });
                        }

                        function addDeta(){
                            
                            
                            var 
                            idTipoUnidad = $('#idTipoUnidad').val();
                            idVariedad = $('#idVariedad').val();
                            idGrado = $('#idGrado').val();
                            cantidad = $('#cantidad').val();
                            estaBueno = $("input[name='estaBueno']:checked").val();
                            desechado = $("input[name='desechado']:checked").val();
                            idCausaNacional = $('#idCausaNacional').val();
                            idOperario = $('#idOperario').val();
                            habilitado = $("input[name='habilitado']:checked").val();
                            
                            if(idTipoUnidad == 0 || idVariedad == 0 || idGrado == 0 || cantidad == "" || estaBueno == "undefined" ||
                                idOperario == 0){
                                
                                $(function(){  msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');  });
                                return false;    
                            }
                            
                            
                            
                            if(desechado == undefined){desechado = 'null';idCausaNacional = 'null';}
                            
                            
                            
                            $("#mant").val(1);
                            if($("#mant").val() == 1){
                                $('#idTipoUnidadH').val(idTipoUnidad);
                                $('#idVariedadH').val(idVariedad);
                                $('#idGradoH').val(idGrado);
                                
                                idTipoUnidad = $('#idTipoUnidadH').val();
                                idVariedad = $('#idVariedadH').val();
                                idGrado = $('#idGradoH').val();
                            }
                            $('#idTipoUnidad').attr('disabled', 'true');
                            $("#idVariedad").attr('disabled','true');
                            $("#idGrado").attr('disabled','true');
    

                            $.ajax({
                                url: "../php/action/revisionesAdd.php",
                                type: "POST",
                                data: {
                                    idTipoUnidad : idTipoUnidad, 
                                    idVariedad : idVariedad,
                                    idGrado : idGrado,
                                    cantidad : cantidad,
                                    estaBueno : estaBueno,
                                    desechado : desechado,
                                    idCausaNacional : idCausaNacional,
                                    idOperario : idOperario,
                                    habilitado : habilitado
                                },
                                success: function(msg){
                                    
                                    
                                    setAtrrEnabled();
                                    $('#cantidad').val('');
                                    $("input[name='estaBueno']:checked").removeAttr('checked');
                                    $("input[name='desechado']:checked").removeAttr('checked');
                                    $('#idCausaNacional').val(0);
                                    $('#idOperario').val(0);
                                    $('#idOperario').val(0);
                                    $("input[name='habilitado']:checked").removeAttr('checked');
                                    
                                    carga_lista_detalle();
                                    carga_form_detalle();
                                      
                                    
                                }
                            });
                        }

                        function detalle_eliminar(id){

                            if(!confirm("Si elimina este ítem no hay forma de devolver esta acción. Si desea \ncontinuar Click en Aceptar, Si no Click en Cancelar")) { 
                                return false;
                            }else{
                                if(!confirm("¿Está seguro de realizar esta acción?")){
                                    return false;
                                }else{
                                    $.ajax({
                                        url: "../php/action/revisionesDel.php",
                                        type: "POST",
                                        data: {
                                            id:id
                                        },
                                        success: function(msg){

                                            carga_lista_detalle();                            	
                                        }
                                    });
                                    return true;
                                }
                            }



                        }
                        
                        
                        
                        
                        function setAtrrDisabled(){
                            $('#idCausaNacional').removeAttr('disabled');
                            $('#desechado1').removeAttr('disabled');
                            $('#desechado2').removeAttr('disabled');
                        }
                        function setAtrrEnabled(){
                            $('#idCausaNacional').attr('disabled','true');
                            $('#desechado1').attr('disabled','true');
                            $('#desechado2').attr('disabled','true');
                        }
                        
                        function saveRevision(){
                        
                        
                        
                            $.ajax({
                                url:'../php/action/revisionesAddDB.php',
                                type:'POST',
                                data:{
                                    pedidoId : <?= $pedido_id ?>,
                                    idUsuario : <?= $usuario->getId() ?>
                                    
                                },
                                success:function(resp){
                                    
                                    $('#idTipoUnidad').removeAttr('disabled');
                                    $("#idVariedad").removeAttr('disabled');
                                    $("#idGrado").removeAttr('disabled');
                                    $('#idTipoUnidad').val(0);
                                    $('#idVariedad').val(0);
                                    $('#idGrado').val(0);
                                    $('#cantidad').val('');
                                    $("input[name='estaBueno']:checked").removeAttr('checked');
                                    $("input[name='desechado']:checked").removeAttr('checked');
                                    $('#idCausaNacional').val(0);
                                    $('#idOperario').val(0);
                                    $('#idOperario').val(0);
                                    $("input[name='habilitado']:checked").removeAttr('checked');
                                
                                    if(resp == 1){
                                        $(function(){  msn.ok().mostrar('Proceso Exitoso.');  }); 
                                        carga_lista_detalle();
                                        carga_form_detalle();
                                    }else{
                                        $(function(){  msn.error().mostrar('Ha ocurrido un error inesperado, recargue la pagina y vuelva a intentarlo.');  });
                                    }
                                }
                            });
                            return true;
                        }

                    </script>



                    <div class="buttonrow">



                    </div>
                </div>

            </div>








            <div class="portlet x12">
                <div id="div_list_detalle"></div>
            </div>

        </div>







    </div> <!-- #content -->



