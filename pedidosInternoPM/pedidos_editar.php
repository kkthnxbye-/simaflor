<?php
include '../includes/header.php';
$id = $_REQUEST['id'];
$pedidosDAO = new pedidosDAO();
$empresasDAO = new empresasDAO();
$ciclosDAO = new ciclosDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$productosDAO = new productosDAO();
$productos = $productosDAO->gets();
$materiales_vegetales = $materialesVegetalesDAO->gets();
$servicios = $serviciosDAO->gets();
$ciclos = $ciclosDAO->gets();
$dat_pedido = $pedidosDAO->getById($id);
$dat_cliente = $empresasDAO->getById($dat_pedido->getFincacliente());
$dat_proveedor = $empresasDAO->getById($dat_pedido->getFincaproveedor());

$estado_pedido = $dat_pedido->getEstadopedido();
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

      <div class="portlet-header"><h4><?php echo $_SESSION['url_'] ?> /  Editar</h4>

         <div class="help"></div>



      </div>



      <div class="portlet-content">





         <div class="portlet x6">

            <div class="portlet-header"><h4>Informaci&oacute;n del pedido</h4></div>



            <div class="portlet-content">



               <form action="../php/action/pedido_edit.php" method="post" class="form label-inline">



                  <div class="field">

                     <label for="fname">Cliente <strong style="color:red">*</strong></label> 

                     <input id="cliente" name="cliente" size="50" type="text" class="medium" autocomplete="off" onkeyup="buscar_cliente();" value="<?php echo $dat_cliente->getNombre() . " - " . $dat_cliente->getNit(); ?>" />
                     <input id="id_cliente" name="id_cliente" value="<?php echo $dat_pedido->getFincacliente(); ?>" type="hidden" />
                     <div id="busqueda_clientes" style="width:425px; float:right; border:none"></div>
                  </div>



                  <div class="field">

                     <label for="lname">Proveedor  <strong style="color:red">*</strong></label> 

                     <input id="proveedor" name="proveedor" size="50"  autocomplete="off"  type="text" value="<?php echo $dat_proveedor->getNombre() . " - " . $dat_proveedor->getNit(); ?>" class="medium" onkeyup="buscar_proveedor();" />
                     <input id="id_proveedor" name="id_proveedor" value="<?php echo $dat_pedido->getFincaproveedor(); ?>" type="hidden" />
                     <div id="busqueda_proveedores" style="width:425px; float:right; border:none"></div>
                  </div>
                  <input type="hidden" id="producto" name="producto" value="<?php echo $dat_pedido->getProducto(); ?>" />
<!--                  <div class="field">

                     <label for="type">Producto </label>

                     <select size="1" class="medium" id="producto" name="producto">
                        <option value="0">Seleccione</option>  
                        <?php
//                        foreach ($productos as $prod) {
//                           $sel = "";
//                           if ($prod->getId() == $dat_pedido->getProducto()) {
//                              $sel = "selected";
//                           }
                           ?>
                           <option value="<?php //echo $prod->getId(); ?>" <?php //echo $sel; ?>><?php 
                           ////echo $prod->getNombre(); ?></option>
<?php //} ?>
                     </select>

                  </div>-->
                  
                          


                  <div class="field">

                     <label for="type">Servicio  <strong style="color:red">*</strong></label>

                     <select size="1" class="medium" id="servicio" name="servicio" onchange="return getVegetales(this.value);">
                        <option value="0">Seleccione</option>
                        <option value="-10">SIN SERVICIO</option>
                        <?php
                        foreach ($servicios as $serv) {
                           $sel = "";
                           if ($serv->getId() == $dat_pedido->getServicio()) {
                              $sel = "selected";
                           }
                           ?>
                           <option value="<?php echo $serv->getId(); ?>" <?php echo $sel; ?>><?php echo $serv->getNombre(); ?></option>
<?php } ?>
                     </select>

                  </div>



                  <div class="field">

                     <label for="type">Material Vegetal <strong style="color:red">*</strong></label>

                     <select size="1" class="medium" id="material_vegetal" name="material_vegetal">
                        
                     </select>

                  </div>



                  <div class="field">

                     <label for="type">Ciclo</label>

                     <select size="1" class="medium" id="ciclo" name="ciclo">
                        <option value="0">Seleccione</option>  
                        <?php
                        foreach ($ciclos as $ciclo) {
                           $sel = "";
                           if ($ciclo->getId() == $dat_pedido->getCiclo()) {
                              $sel = "selected";
                           }
                           ?>
                           <option value="<?php echo $ciclo->getId(); ?>" <?php echo $sel; ?>><?php echo $ciclo->getNombre(); ?></option>
<?php } ?>
                     </select>
                     <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />




                  </div>



                  <br />

                  <div class="buttonrow">

                     <button class="btn btn-grey">Guardar</button>
                     <button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>

                  </div>



               </form>







            </div>

         </div>

         <div class="portlet x6">

            <div class="portlet-header"><h4>Detalle de Pedido</h4></div>



            <div class="portlet-content">

               <div id="div_form_detalle">

               </div>

               <div id="div_list_detalle">
               </div>



               




            </div>

         </div>

      </div>







   </div> <!-- #content -->

<?php include '../includes/footer.php'; ?>
   <script src="../js/calendario_k.js"></script>

   
   <script>
                     function getVegetales(idServicio){
                        if(idServicio == 0){
                           $(function(){  msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');  });
                           return false;
                        }else{
                           var idFinca=<?php echo $dat_pedido->getFincaProduccion(); ?>;
                           if($('#producto').val() == 0){
                              $(function(){  msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');  });
                              return false;
                           }
                           var idProducto = $('#producto').val();
                           $.ajax({
                              url:'../php/action/getVegetales.php',
                              type:'POST',
                              data:{
                                 'IDFinca' : idFinca,
                                 'IDProducto' :idProducto,
                                 'IDServicio' : idServicio
                              },
                              success:function(data){
                                 //alert(data);
                                 $('#material_vegetal').html(data);
                              }
                           });
                        }
                     }
                  </script>
                  
                  
                  <script>
			
                  setTimeout("carga_form_detalle()","1000");
                  setTimeout("carga_lista_detalle()","1000");
			
                  function carga_form_detalle(){				
                     $.ajax({
                        url: "formulario_detalle.php",
                        type: "POST",
                        data: {
                           nombre:'nombre'
                        },
                        success: function(msg){
                           $("#div_form_detalle").html(msg);  
										                                 	
                        }
                     });
                  }


                  function carga_lista_detalle(){
                     $.ajax({
                        url: "lista_detalles2.php",
                        type: "POST",
                        data: {
                           id:<?php echo $id; ?>,
                           idEstado : <?php echo $estado_pedido; ?>
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

                  function agregar_detalle(){
                     var fecha_ini = document.getElementById('fecha_entrega').value;
                     var fecha_fin = document.getElementById('fecha_recibido').value;
                     var variedad = document.getElementById('variedad').value;
                     var cantidad = document.getElementById('cantidad').value;
                     $.ajax({
                        url: "../php/action/detalle_add2.php",
                        type: "POST",
                        data: {
                           fecha_ini:fecha_ini,
                           fecha_fin : fecha_fin,
                           variedad : variedad,
                           cantidad : cantidad,
                           pedido : <?php echo $id ?>
                        },
                        success: function(msg){
                           //alert("Nuevo detalle Ingresado");
                           carga_lista_detalle();
                           carga_form_detalle();                                 	
                        }
                     });
                  }

                  function detalle_eliminar(id){
                     
                     //return confirma(this);
                     
                     $.ajax({
                        url: "../php/action/detalle_del2.php",
                        type: "POST",
                        data: {
                           id:id
                        },
                        success: function(msg){
                           $('body').append(msg);
                           carga_lista_detalle();                            	
                        }
                     });
                  }
			
               </script>