<?php session_start();?>				
				<form onSubmit="return valida_cod()" name="busqueda" id="busqueda" method="post"  action="lista.php" >
				Campo <select name="campo" id="campo" onchange="cambia_busq()">
				<option value="todos" <?php if ($_REQUEST['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
				<option value="Codigo" <?php if ($_REQUEST['campo'] == 'Codigo'){?> selected="selected"<?php }?>>C&oacute;digo</option>
				<option value="Nombre" <?php if ($_REQUEST['campo'] == 'Nombre'){?> selected="selected"<?php }?>>Nombre</option>
				<option value="Ancho" <?php if ($_REQUEST['campo'] == 'Ancho'){?> selected="selected"<?php }?>>Ancho</option>
				<option value="Alto" <?php if ($_REQUEST['campo'] == 'Alto'){?> selected="selected"<?php }?>>Alto</option>
				<option value="Area" <?php if ($_REQUEST['campo'] == 'Area'){?> selected="selected"<?php }?>>Area</option>
				<option value="Habilitado" <?php if ($_REQUEST['campo'] == 'Habilitado'){?> selected="selected"<?php }?>>Habilitado</option>
				</select>
				
				
<?php if ($_REQUEST['f_busq'] == 1){ 
?>
<input type="hidden" name="tipo_b" id="tipo_b"  value="completa"/>
Valor<select name="valor" id="valor">
				<option value="" <?php if ($_SESSION['valor'] == ''){?> selected="selected"<?php }?>>Todos</option>
				<option value="si" <?php if ($_SESSION['valor'] == '1'){?> selected="selected"<?php }?>>Si</option>
				<option value="no" <?php if ($_SESSION['valor'] == '0'){?> selected="selected"<?php }?>>No</option>				
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
<input type="hidden" name="page" id="page" value="bloquespmxfinca" />
				
				<button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
				</form>