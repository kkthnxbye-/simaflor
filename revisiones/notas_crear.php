<?php
include '../includes/header.php';
include '../php/dao/revisionesDAO.php';
include '../php/entities/revisiones.php';

$pedido_id = $_GET['pedido_id'];

$pedidosDAO = new pedidosDAO();
$pedidos = new pedidos();
$pedidos = $pedidosDAO->getById($pedido_id);

$VariedadesDAO = new VariedadesDAO();
$variedades = $VariedadesDAO->gets("IDProducto", $tipob, $pedidos->getProducto());
?>


<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] . " / Nueva nota" ?></h4>





        </div>



        <div class="portlet-content">


            <div class="portlet x12">





                <div class="portlet-content">

                    <div id="div_form_detalle1">

                        <div class="form label-inline">

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
                                <label for="fname">Nota <strong style="color: red">*</strong></label> 
                                <textarea id="nota" name="nota" cols="40" rows="5" ></textarea>
                            </div>





                            <div class="buttonrow">
                                <input type="hidden" name="idUsuario" value="<?= $usuario->getId() ?>">
                                <input type="hidden" name="idPedidoPm" value="<?= $pedido_id ?>">
                                <button class="btn btn-grey" onclick="saveNota()">Agregar</button>

                                <br/><br/>

                            </div>





                        </div>
                    </div>






                    <script>



                        setTimeout("carga_lista_detalle()","1000");

                        function carga_lista_detalle(){
                            $.ajax({
                                url: "lista_notas.php",
                                type: "POST",
                                data: {
                                    pedido_id : <?= $pedido_id ?>
                                },
                                success: function(msg){
                                    $("#div_list_detalle").html(msg);                                   	
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
                                        url: "../php/action/notasXPedidoDel.php",
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
                        
                        
                        
                        function saveNota(){
                        
                        if($('#idVariedad').val() == 0 || $('#nota').val() == ''){
                            $(function(){  msn.error().mostrar('Los campos marcados (*) son obligatorios');  });
                            return false;
                        }
                        
                            $.ajax({
                                url:'../php/action/notasXPedidoAdd.php',
                                type:'POST',
                                data:{
                                    idPedidoPm : <?= $pedido_id ?>,
                                    idUsuario : <?= $usuario->getId() ?>,
                                    idVariedad : $('#idVariedad').val(),
                                    nota : $('#nota').val()
                                    
                                },
                                success:function(resp){
                                    
                                    $('#nota').val('');
                                
                                    if(resp == 1){
                                        $(function(){  msn.ok().mostrar('Proceso Exitoso.');  }); 
                                        carga_lista_detalle();
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



