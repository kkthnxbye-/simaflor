<?php
include '../includes/header.php';

$ciclosDAO = new ciclosDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$productosDAO = new productosDAO();
$productos = $productosDAO->gets();
$materiales_vegetales = $materialesVegetalesDAO->gets();
$servicios = $serviciosDAO->gets();
$ciclos = $ciclosDAO->gets();

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

        <div class="portlet-header"><h4><?= $_SESSION['url_'] . " / Nuevo" ?></h4>





        </div>



        <div class="portlet-content">


            <div class="portlet x6">

                <div class="portlet-header"><h4>Paso # 1</h4></div>



                <div class="portlet-content">

                    <div id="div_form_detalle1"></div>






                    <script>
			
                        setTimeout("carga_form_detalle1()","1000");
                        setTimeout("carga_form_detalle2()","1000");
                        setTimeout("carga_lista_detalle()","1000");
			
                        function carga_form_detalle1(){				
                            $.ajax({
                                url: "formulario1.php",
                                type: "POST",
                                data: {
                                    nombre:'nombre'
                                },
                                success: function(msg){
                                    $("#div_form_detalle1").html(msg);  
										                                 	
                                }
                            });
                        }
                        
                        function carga_form_detalle2(){				
                            $.ajax({
                                url: "formulario2.php",
                                type: "POST",
                                data: {
                                    nombre:'nombre'
                                },
                                success: function(msg){
                                    $("#div_form_detalle2").html(msg);  
										                                 	
                                }
                            });
                        }


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
                            var cantidad = document.getElementById('cantidad').value;
                            var estaBueno = document.getElementById('estaBueno').value;
                            var reclamar = document.getElementById('reclamar').value;
                            var causa = document.getElementById('causa').value;
                            var operario = document.getElementById('operario').value;
                            var habilitado = document.getElementById('habilitado').value;
                            
alert("can: "+cantidad+" estb: "+estaBueno+" recla: "+reclamar+" causa: "+causa+" oper: "+operario+" habi: "+habilitado);
                            
                            $.ajax({
                                url: "../php/action/revisionesAdd.php",
                                type: "POST",
                                data: {
                                   cantidad : cantidad, 
                                   estaBueno : estaBueno,
                                   reclamar : reclamar,
                                   causa : causa,
                                   operario : operario,
                                   habilitado : habilitado
                                },
                                success: function(msg){
                                    alert("Nuevo detalle Ingresado: "+msg);
                                    carga_lista_detalle();
                                    carga_form_detalle();                                 	
                                }
                            });
                        }

                        function detalle_eliminar(id){
                            $.ajax({
                                url: "../php/action/revisionesDel.php",
                                type: "POST",
                                data: {
                                    id:id
                                },
                                success: function(msg){
                                    alert("Detalle Eliminado: "+msg);
                                    carga_lista_detalle();                            	
                                }
                            });
                        }
			
                    </script>



                    <div class="buttonrow">



                    </div>
                </div>

            </div>









            <div class="portlet x6">

                <div class="portlet-header"><h4>Paso # 2</h4></div>



                <div class="portlet-content">

                    <div id="div_form_detalle2"></div>

                    <div class="buttonrow"></div>
                </div>

            </div>


            <div class="portlet x12">
                <div id="div_list_detalle"></div>
            </div>

        </div>

        





    </div> <!-- #content -->
    
    

    <?php include '../includes/footer.php'; ?>
    <script src="../js/calendario_k.js"></script>
