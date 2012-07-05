<script>
   
   function isNumber(num){
      var xpression = /^(?:\+|-)?\d+$/;
      if(xpression.test(num)){
         return true;
      }else{
         return false;
      }
   }
   
    function reconfirm(){
        var c = "Esta seguro de cambiar el estado de este pedido?";
            if(confirm(c)){
                var c1 = "Si cambia el estado de un pedido no podra volver al estado anterior. Esta seguro?";
                if(confirm(c1)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
    }
    
//    function showStatus(id,estado){
//       $("#Status").fadeIn();
//       $("#id").val(id);
//       $("#estado").val(estado);
//    }
    
    function getDetalle(id){
       $.ajax({
          url:'getDetalle.php',
          type:'POST',
          data:{
             'id':id
          },
          success:function(data){
             $("#detalleLive").html(data);
          }
       });
    }
    
    function unforgiven(){
      contador = parseInt($('#countah').val());
      
      for(i=1;i<=contador;i++){
         cantidad = parseInt($('#cantidad'+i).val());
         cantidad_ = parseInt($('#cantidad_'+i).val());
         
         if(isNumber(cantidad_) || cantidad_ < 0){
            alert('Solo puedes introducir numeros enteros mayores o iguales a cero');
            return false;
         }
         
         if(cantidad_ > cantidad){
            alert('El valor de cantidades aprobadas no pueden ser mayor al numero de cantidades dadas. ');
            return false;
         }
      }
      
      reconfirm();
      
      return true;
    }


</script>

<style>
   #Status,#detalleLive{
      padding: 10px;
      border:1px solid silver;
      border-radius: 15px 0px 15px 0px;
      margin-bottom: 10px;
      background-color: #f5f5f5;
}
</style>

<?php include '../includes/header.php'; ?>
<?php

$pedidosDAO = new pedidosDAO();
$empresasDAO = new empresasDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$estadospedidoDAO = new estadospedidoDAO();
$productosDAO = new productosDAO();
if (!empty($_POST['page'])){
	$_SESSION['page'] = $_POST['page'];
}
if (!empty($_REQUEST['page_bus'])){
	$_SESSION['page'] = "busk_sin";
}
if (!empty($_POST['campo'])){
$_SESSION['campo'] = $_POST['campo'];
}
if (!empty($_POST['tipo_b'])){
$_SESSION['tipo_b'] = $_POST['tipo_b'];
}
if (!empty($_POST['valor'])){
$_SESSION['valor'] = $_POST['valor'];
}

if (!empty($_REQUEST['modulo'])){
$_SESSION['modulo'] = $_REQUEST['modulo'];
}




if ($_SESSION['page'] != "opciones"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if(isset($_SESSION['finca'])){
   $pedidos = $pedidosDAO->getsbybuscar("IDFincaProduccion",'',$_SESSION['finca']);
}else{

$pedidos = $pedidosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
}
?>




	<div id="content" class="xfluid">

		<div class="portlet x12">

		<div class="portlet-header"><h4>PEDIDOS</h4>

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../../images/icon_help.png" width="22" height="23" /></div>

                Ayuda</a></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

				<div class="user_tit"><h2>PEDIDOS</h2></div>

                <div class="btn_left"><button class="btn btn-grey" onclick="location.href='pedidos_crear.php'">Nuevo</button></div>
                 <div class="btn_right">

				</div>

              <div class="line"></div>

                <br/>
				<div class="user_tit">
				<form name="busqueda" action="lista.php" id="busqueda" method="post">
				Campo <select name="campo" id="campo">
				<option value="todos" <?php if ($_SESSION['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
				<option value="IDFincaProveedor" <?php if ($_SESSION['campo'] == 'IDFincaProveedor'){?> selected="selected"<?php }?>>Proveedor</option>
				<option value="IDFincaCliente" <?php if ($_SESSION['campo'] == 'IDFincaCliente'){?> selected="selected"<?php }?>>Cliente</option>
				<option value="IDMaterialVegetal" <?php if ($_SESSION['campo'] == 'IDMaterialVegetal'){?> selected="selected"<?php }?>>Material Vegetal</option>
				<option value="IDProducto" <?php if ($_SESSION['campo'] == 'IDProducto'){?> selected="selected"<?php }?>>Producto</option>
				<option value="IDEstadoPedidoPM" <?php if ($_SESSION['campo'] == 'IDEstadoPedidoPM'){?> selected="selected"<?php }?>>Estado</option>
				<option value="IDServicio" <?php if ($_SESSION['campo'] == 'IDServicio'){?> selected="selected"<?php }?>>Servicio</option>
				</select>
				<input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
				Valor
				<input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor']?>"/>
				<input type="hidden" name="page" id="page" value="opciones" />

				<button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
				</form>
				</div>

             

                <div style="display:inline"  style="padding-left:10px">
				<div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
				<a href="lista.php?page_bus=2" class="btn_editar l">

			  <div class="icon_botn" style="height:25px;"><img src="../../images/icon_null.png" width="22" height="25" /></div>

                    Limpiar Filtro

             	</a>
				</div>

                <div class="btn_right">



              <a href="excel.php" class="btn_editar">

                <div class="icon_botn"><img src="../../images/icon_export.png" width="22" height="23" /></div>

                Exportar (CSV)</a>

              <br/><br/>

              </div>
                
                        

				<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
					<thead>
<!--                                    <tr>
                                       <td colspan="8">&nbsp;</td>
                                       <td colspan="1">
                                          <div id="Status">
                                             <form method="GET" action="../php/action/changePedidoEstado.php" onsubmit="return reconfirm()">
                                                <span><strong>Seleccione un estado</strong></span>
                                                <br><br>
                                                <ol>
                                                   <li> <input type="radio" name="estado_id" value="3" checked="checked"> Aprobado Parcial</li>
                                                   <li> <input type="radio" name="estado_id" value="4"> Aprobado</li>
                                                   <li> <input type="radio" name="estado_id" value="5"> Rechazado</li>
                                                </ol>
                                                <input type="hidden" value="" name="pedido_id" id="id">
                                                <input type="hidden" value="" name="estado_id" id="estado">
                                                <input type="submit" value="Aceptar">
                                             </form>
                                          </div>
                                       </td>
                                    </tr>-->
                                    <tr>
                                    <td colspan="9">
                                       <div id="detalleLive"></div>
                                    </td>
                                    </tr>
						<tr>
                                          <th>Anular</th>
							<th>id</th>
							<th>Proveedor</th>
							<th>Cliente</th>
							<th>Material Vegetal</th>
							<th>Producto</th>
                                          <th>Estado</th>
                                          <th>Servicios</th>
                                          <th>Opciones</th>
						</tr>
					</thead>
					<tbody>
                                            <? $c=0; ?>
					<?php foreach ($pedidos as $pedido){?>
                                            <? $c++; ?>
						<tr class="odd gradeX">
                <td>
                    <? if($pedido->getEstadopedido() == 3 or $pedido->getEstadopedido() == 4){ ?>
                            <a onclick="return reconfirm();" 
                               href="../php/action/AnularPedidoEstado.php?pedido_id=<?= $pedido->getId(); ?>&estado_id=<?= $pedido->getEstadopedido(); ?>" 
                               class="btn_black">

                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Anular</a>
                            <? } ?>
                </td>
                <td><?= $c; ?></td>
                <td><?php echo $empresasDAO->getById($pedido->getFincaproveedor())->getNombre();?></td>
                <td><?php echo $empresasDAO->getById($pedido->getFincacliente())->getNombre();?></td>
                <td><?php echo $materialesVegetalesDAO->getById($pedido->getMaterialvegetal())->getNombre();?></td>
                <td><?php echo $productosDAO->getById($pedido->getProducto())->getNombre();?></td>
                <td><?php echo $estadospedidoDAO->getById($pedido->getEstadopedido())->getNombre();?></td>
                <td><?php echo $serviciosDAO->getById($pedido->getServicio())->getNombre();?></td>
		<td><a href="pedidos_editar.php?id=<?php echo $pedido->getId();?>" class="btn_editar"><div class="icon_botn"><img src="../images/pencil.png" width="16" height="16" /></div> Editar</a>

<!--                            <a href="" class="btn_editar">

                            <div class="icon_botn"><img src="../images/page_white_copy.png" width="16" height="16" /></div> 

                            Detalles</a>-->

                             <? if($pedido->getEstadopedido() == 1): ?>
                                    
    <a onclick="return reconfirm();" href="../php/action/changePedidoEstado.php?pedido_id=<?= $pedido->getId(); ?>&estado_id=<?= $pedido->getEstadopedido(); ?>" 
                                       class="btn_black">

                                    <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Enviar Pedido</a> 

                              <? elseif($pedido->getEstadopedido() == 2): ?>

<a onclick="getDetalle(<?= $pedido->getId(); ?>);" class="btn_black">

                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Aprobar Parcial</a>




                            <a onclick="return reconfirm();" 
                               href="../php/action/changePedidoEstado.php?aprobado&pedido_id=<?= $pedido->getId(); ?>&estado_id=<?= $pedido->getEstadopedido(); ?>" 
                               class="btn_black">

                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Aprobar</a>
                            <a onclick="return reconfirm();" 
                               href="../php/action/changePedidoEstado.php?rechazado&pedido_id=<?= $pedido->getId(); ?>&estado_id=<?= $pedido->getEstadopedido(); ?>" 
                               class="btn_black">

                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Rechazar</a>

                              <? elseif($pedido->getEstadopedido() == 4): ?>

<a onclick="return reconfirm();" 
                               href="../php/action/AnularPedidoEstado.php?pedido_id=<?= $pedido->getId(); ?>&estado_id=<?= $pedido->getEstadopedido(); ?>" 
                               class="btn_black">

                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Anular</a>

<a onclick="return reconfirm();" 
                               href="../php/action/AnularPedidoEstado.php?pedido_id=<?= $pedido->getId(); ?>&estado_id=<?= $pedido->getEstadopedido(); ?>" 
                               class="btn_black">

                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Registrar Recepcion</a>

                              <? elseif($pedido->getEstadopedido() == 5): ?>
                              
<a onclick="return reconfirm();" href="../php/action/changePedidoEstado.php?pedido_id=<?= $pedido->getId(); ?>&estado_id=<?= $pedido->getEstadopedido(); ?>" 
                                       class="btn_black">

                                    <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Finalizar Recepcion</a> 

                              <? elseif($pedido->getEstadopedido() == 6): ?>

                              <? elseif($pedido->getEstadopedido() == 7): ?>

                              <? elseif($pedido->getEstadopedido() == 8): ?>

                            <? endif; ?>

                            <? //if($pedido->getEstadopedido() == 2){ ?>
<!--                            <a 
                               href="toPdf.php?pedido_id=<?//= $pedido->getId(); ?>" 
                               class="btn_black" target="_blank">

                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 

                            Documento de compra</a>-->
                            <? //} ?>

                            <a href="documentos_pedido.php?pedido_id=<?= $pedido->getId(); ?>" class="btn_editar">

                            <div class="icon_botn"><img src="../images/page_white_go.png" width="16" height="16" /></div> 

                            Adjuntar</a>
							 </td>
						</tr>
                              
						<?php }?>
					</tbody>
				</table>
                
                        








		  </div>
		</div>



	</div> <!-- #content -->
	<?php include '../includes/footer.php'; ?>