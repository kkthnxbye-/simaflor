<?php 
	session_start();
?>				
	<form onSubmit="return valida_cod()" name="busqueda" id="busqueda" method="post"  action="lista.php" >Campo
		<select name="campo" id="campo" onchange="cambia_busq()">
			<option value="todos" <?php if ($_REQUEST['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
			<option value="IDProducto" <?php if ($_REQUEST['campo'] == 'IDProducto'){?> selected="selected"<?php }?>>Producto</option>
			<option value="IDMaterialVegetal" <?php if ($_REQUEST['campo'] == 'IDMaterialVegetal'){?> selected="selected"<?php }?>>Material Vegetal</option>
			<option value="IDFincaCliente" <?php if ($_REQUEST['campo'] == 'IDFincaCliente'){?> selected="selected"<?php }?>>Cliente</option>
			<option value="IDFincaProveedor" <?php if ($_REQUEST['campo'] == 'IDFincaProveedor'){?> selected="selected"<?php }?>>Proveedor</option>
			
			
		</select>				
	<?php 
		if ($_REQUEST['f_busq'] == 1){
	?>
		<input type="hidden" name="tipo_b" id="tipo_b"  value="completa"/>Valor
		<select name="id_finca_cliente" id="id_finca_cliente">
			<option value="" <?php if ($_REQUEST['id_finca_cliente'] == ''){?> selected="selected"<?php }?>>Todos</option>
			<option value="si" <?php if ($_REQUEST['id_finca_cliente'] == '1'){?> selected="selected"<?php }?>>Si</option>
			<option value="no" <?php if ($_REQUEST['id_finca_cliente'] == '0'){?> selected="selected"<?php }?>>No</option>				
		</select>
	<?php
		}else{
	?>
		<input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
		Valor
		<input type="text" name="id_finca_cliente" id="id_finca_cliente"  value="<?php echo $_SESSION['id_finca_cliente']?>"/>
	<?php
		}
	?>
		<input type="hidden" name="page" id="page" value="configuracionproveedoresxfincapm" />
		<button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
	</form>