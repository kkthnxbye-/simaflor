<?php
include '../includes/header.php';
include '../php/entities/revisiones.php';

$pedido_id = $_GET['pedido_id'];

$ciclosDAO = new ciclosDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$productosDAO = new productosDAO();

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

<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] . " / Editar" ?></h4>





        </div>



        <div class="portlet-content">










            <div class="portlet x12">
                <div id="div_list_detalle_edit"></div>
            </div>

        </div>







    </div> <!-- #content -->

<script>



                        setTimeout("carga_lista_detalle_edit()","1000");

                        function carga_lista_detalle_edit(){
                            $.ajax({
                                url: "lista_edit.php",
                                type: "POST",
                                data: {
                                    pedido_id : <?= $_GET['pedido_id']; ?>
                                },
                                success: function(msg){
                                    $("#div_list_detalle_edit").html(msg);                                   	
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
                                desechado == "undefined" || idCausaNacional == 0 || idOperario == 0){
                                
                                $(function(){  msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');  });
                                return false;    
                            }
                            
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
                                    
                                    $('#cantidad').val('');
                                    $("input[name='estaBueno']:checked").removeAttr('checked');
                                    $("input[name='desechado']:checked").removeAttr('checked');
                                    $('#idCausaNacional').val(0);
                                    $('#idOperario').val(0);
                                    $('#idOperario').val(0);
                                    $("input[name='habilitado']:checked").removeAttr('checked');
                                    
                                    carga_lista_detalle();
                                    carga_form_detalle();
                                    $(function(){  msn.ok().mostrar('Proceso Exitoso.');  });                                    
                                }
                            });
                        }

              
                        
                        
                        
                        function editRevision(total){
                        
                        
                        for(i=1;i<=total;i++){
                            if($('#cant'+i).val() <= 0){$(function(){  msn.error().mostrar('Ha ocurrido un error inesperado, por favor revise los datos ingresados en las cantidades.');  });return false;}
                        }
                        
                        
                        for(i=1;i<=total;i++){
                            
                         $.ajax({
                                url:'../php/action/revisionesEdit.php',
                                type:'POST',
                                data: data,
                                success:function(resp){
                                
                                    if(resp == 1){
                                        $(function(){  msn.ok().mostrar('Proceso Exitoso.');  }); 
                                        carga_lista_detalle_edit();
                                    }else{
                                        $(function(){  msn.error().mostrar('Ha ocurrido un error inesperado, recargue la pagina y vuelva a intentarlo.');  });
                                    }
                                }
                            });
//                            return true;
                        }
                        
                        
                        
                        }
                        
                    
                    
                    </script>

    
                    
