<?php 
	session_start();
?>				
	<form onSubmit="return valida_cod()" name="busqueda" id="busqueda" method="post"  action="lista.php" >Campo
		<select name="campo" id="campo" onchange="cambia_busq()">
			<option value="todos" <?php if ($_REQUEST['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
			<option value="IDTipoArea" <?php if ($_REQUEST['campo'] == 'IDTipoArea'){?> selected="selected"<?php }?>>Tipo de Area</option>
			<option value="Codigo" <?php if ($_REQUEST['campo'] == 'Codigo'){?> selected="selected"<?php }?>>C&oacute;digo</option>
			<option value="Nombre" <?php if ($_REQUEST['campo'] == 'Nombre'){?> selected="selected"<?php }?>>Nombre</option>
			<option value="Capacidad" <?php if ($_REQUEST['campo'] == 'Capacidad'){?> selected="selected"<?php }?>>Capacidad</option>
			<option value="AreaDeCultivo" <?php if ($_REQUEST['campo'] == 'AreaDeCultivo'){?> selected="selected"<?php }?>>Area de Cultivo</option>
			<option value="AreaDeCamino" <?php if ($_REQUEST['campo'] == 'AreaDeCamino'){?> selected="selected"<?php }?>>Area de Camino</option>
			<option value="Habilitado" <?php if ($_REQUEST['campo'] == 'Habilitado'){?> selected="selected"<?php }?>>Habilitado</option>
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
		<input type="hidden" name="page" id="page" value="areaspmxbloquepm" />
		<button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
	</form>