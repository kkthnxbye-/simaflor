<?php 
	session_start();
?>				
	<form onSubmit="return valida_cod()" name="busqueda" id="busqueda" method="post"  action="lista.php" >Campo
		<select name="campo" id="campo" onchange="cambia_busq()">
			<option value="todos" <?php if ($_REQUEST['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
		
			<option value="IDTipoParametro" <?php if ($_REQUEST['campo'] == 'IDTipoParametro'){?> selected="selected"<?php }?>>Tipo de Parametro</option>
			<option value="Valor" <?php if ($_REQUEST['campo'] == 'Valor'){?> selected="selected"<?php }?>>Valor</option>		
		</select>				
	<?php 
		if ($_REQUEST['f_busq'] == 1){
	?>
		<input type="hidden" name="tipo_b" id="tipo_b"  value="completa"/>Valor
		<select name="valor" id="valor">
			<option value="" <?php if ($_REQUEST['valor'] == ''){?> selected="selected"<?php }?>>Todos</option>
			<option value="si" <?php if ($_REQUEST['valor'] == '1'){?> selected="selected"<?php }?>>Si</option>
			<option value="no" <?php if ($_REQUEST['valor'] == '0'){?> selected="selected"<?php }?>>No</option>				
		</select>
	<?php
		}else{
	?>
		<input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
		Valor
		<input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor']?>"/>
	<?php
		}
	?>
		<input type="hidden" name="page" id="page" value="configuracionxmodulo" />
		<button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
	</form>