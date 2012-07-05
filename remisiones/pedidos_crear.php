<?php include '../includes/header.php';
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

		<div class="portlet-header"><h4>Pedidos</h4>

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../../images/icon_help.png" width="22" height="23" /></div>

                Ayuda</a></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

				<div class="user_tit">

			  <h2>NUEVO PEDIDO</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>

                <br/>





                <div class="portlet x6">

			<div class="portlet-header"><h4>Pedido (Nuevo / Edici&oacute;n)</h4></div>

			

			<div class="portlet-content">

			

            <form action="../php/action/pedido_add.php" method="post" class="form label-inline">

	

							<div class="field">

							  <label for="fname">Cliente</label> 

							  <input id="cliente" name="cliente" size="50" type="text" class="medium" onkeyup="buscar_cliente();" />
								<input id="id_cliente" name="id_cliente" value="0" type="hidden" />
								<div id="busqueda_clientes" style="width:425px; float:right; border:none"></div>
								</div>

				

			  <div class="field">

							  <label for="lname">Proveedor </label> 

							  <input id="proveedor" name="proveedor" size="50" type="text" class="medium" onkeyup="buscar_proveedor();" />
								<input id="id_proveedor" name="id_proveedor" value="0" type="hidden" />
								<div id="busqueda_proveedores" style="width:425px; float:right; border:none"></div>
							</div>

			  <div class="field">

				<label for="type">Producto </label>

								<select size="1" class="medium" id="producto" name="producto">
								<option value="0">Seleccione</option>  
								<?php foreach ($productos as $prod){?>
								  <option value="<?php echo $prod->getId();?>"><?php echo $prod->getNombre();?></option>
								<?php }?>
								</select>

			  </div>

              

              <div class="field">

				<label for="type">Servicio</label>

								<select size="1" class="medium" id="servicio" name="servicio">
								<option value="0">Seleccione</option>  
								<?php foreach ($servicios as $serv){?>
								  <option value="<?php echo $serv->getId();?>"><?php echo $serv->getNombre();?></option>
								<?php }?>
								</select>

			  </div>

              

              <div class="field">

				<label for="type">Material Vegetal </label>

								<select size="1" class="medium" id="material_vegetal" name="material_vegetal">
								<option value="0">Seleccione</option>  
								<?php foreach ($materiales_vegetales as $materialv){?>
								  <option value="<?php echo $materialv->getId();?>"><?php echo $materialv->getNombre();?></option>
								<?php }?>
								</select>

			  </div>

              

             <div class="field">

				<label for="type">Ciclo</label>

								<select size="1" class="medium" id="ciclo" name="ciclo">
								<option value="0">Seleccione</option>  
								<?php foreach ($ciclos as $ciclo){?>
								  <option value="<?php echo $ciclo->getId();?>"><?php echo $ciclo->getNombre();?></option>
								<?php }?>
								</select>




			  </div>

                              

              <br />

			  <div class="buttonrow">

			    <button class="btn btn-grey">Guardar</button>

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
                                url: "lista_detalles.php",
                                type: "POST",
                                data: {
                                    nombre:''
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
                                url: "../php/action/detalle_add.php",
                                type: "POST",
                                data: {
                                    fecha_ini:fecha_ini,
									fecha_fin : fecha_fin,
									variedad : variedad,
									cantidad : cantidad
                                },
                                success: function(msg){
										//alert("Nuevo detalle Ingresado");
										carga_lista_detalle();
										carga_form_detalle();                                 	
								}
               	});
			}

			function detalle_eliminar(id){
				$.ajax({
                                url: "../php/action/detalle_del.php",
                                type: "POST",
                                data: {
                                    id:id
                                },
                                success: function(msg){
										//alert("Detalle Eliminado");
										carga_lista_detalle();                            	
								}
               	});
			}
			
			</script>
                   

            

			</div>

		</div>

		</div>







	</div> <!-- #content -->

	<?php include '../includes/footer.php'; ?>
	<script src="../js/calendario_k.js"></script>
	