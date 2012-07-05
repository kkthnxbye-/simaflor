<?php include '../includes/header.php'; ?>
<?php

$variedadesDAO = new variedadesDAO();

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
if (!empty($_REQUEST['producto'])){

$_SESSION['producto'] = $_REQUEST['producto'];
}


if ($_SESSION['page'] != "variedades"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$variedades = $variedadesDAO->getsbybuscar($_SESSION['producto'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>

	<script>
	
	function cambia_busq(){
		var campo = document.getElementById('campo').value;
		if (campo.indexOf("Hab") !=  -1){
			$('#div_bus1').load("filtro.php?f_busq=1&campo="+campo);			
		}else{
			$('#div_bus1').load("filtro.php?f_busq=2&campo="+campo);
		}
	}
	
	
		setTimeout("cambia_busq()","1000");
	
	
	</script>
	
	
	<div id="content" class="xfluid">
		
		<div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de Variedades</h4> 

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div> 

                Ayuda</a></div>

            

            </div>

			

			<div class="portlet-content"><a name="plugin"></a>				

				<div class="user_tit"><h2>VARIEDAD</h2></div>

                <div class="btn_left"><button class="btn btn-grey" onclick="location.href='variedad_crear.php'">Nueva</button></div>

				<div class="btn_right" >
				
				</div>

              <div class="line"></div>	

                <br/> 

				<div class="user_tit" id="div_bus1">

				<form onSubmit="return valida_cod()" name="busqueda" id="busqueda" method="post"  action="lista.php" >
				Campo <select name="campo" id="campo" onchange="cambia_busq()">
				<option value="todos" <?php if ($_SESSION['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
				<option value="Color" <?php if ($_SESSION['campo'] == 'Colores.Nombre'){?> selected="selected"<?php }?>>Color</option>
				<option value="Codigo" <?php if ($_SESSION['campo'] == 'Variedades.Codigo'){?> selected="selected"<?php }?>>C&oacute;digo</option>
				<option value="Nombre" <?php if ($_SESSION['campo'] == 'Variedades.Nombre'){?> selected="selected"<?php }?>>Nombre</option>
				<option value="Descripcion" <?php if ($_SESSION['campo'] == 'Variedades.Descripcion'){?> selected="selected"<?php }?>>Descripcion</option>
				<option value="Habilitado" <?php if ($_SESSION['campo'] == 'Variedades.Habilitado'){?> selected="selected"<?php }?>>Habilitado</option>
				</select>
				
				<input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
				Valor
				<input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor']?>"/>
							
				<input type="hidden" name="page" id="page" value="variedades" />
				
				<button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
				</form>
				
				</div>

                <div style="display:inline"  style="padding-left:10px">
				<div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
				<a href="lista.php?page_bus=2" class="btn_editar l">
				
			  <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>

                    Limpiar Filtro

             	</a>
				</div>

                <div class="btn_right">
				
				

              <a href="excel.php" class="btn_editar">

                <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div> 

                Exportar (CSV)</a>

              <br/><br/>

              </div>	
				
				<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
					<thead>
						<tr>
							<th>C&oacute;digo</th>
							<th>Color</th>
							<th>Nombre</th>
							<th>Habilitado</th>
							<th>Acci&oacute;n</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($variedades as $variedad){?>
						<tr class="odd gradeX">							
							<td><?php echo $variedad->getCodigo();?></td>
							<td><?php echo $variedad->getNombre()?></td>
							<td><?php echo str_replace('1','Si',str_replace('0','No',$variedad->getHabilitado()));?></td>
							<td><a href="variedad_editar.php?id=<?php echo $variedad->getId();?>" class="btn_editar">

                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div> 

                    Editar</a>

                    <a onClick="return confirma(this)" href="../php/action/variedad_eliminar.php?id=<?php echo $variedad->getId();?>" class="btn_black">

                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                    Eliminar</a>
							 </td>
						</tr>
						<?php }?>
					</tbody>
				</table>
				
				
				
				
				
				
			
		  </div>
		</div>
		

		
	</div> <!-- #content -->
	<?php include '../includes/footer.php'; ?>	