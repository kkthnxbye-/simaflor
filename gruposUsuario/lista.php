<?php include '../includes/header.php'; ?>
<?php

$gruposUsuarioDAO = new gruposUsuarioDAO();
$UsuariosDAO= new UsuariosDAO();

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


if ($_SESSION['page'] != "gruposUsuario"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

$gruposUsuario = $gruposUsuarioDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>




	<div id="content" class="xfluid">

		<div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de grupos usuario</h4>

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>

                Ayuda</a></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

				<div class="user_tit"><h2>GRUPOS USUARIO</h2></div>

                <div class="btn_left"><button class="btn btn-grey" onclick="location.href='gruposUsuario_crear.php'">Nuevo</button></div>
                <div class="btn_right">

				</div>

                <div class="line"></div>

                <br/>
				<div class="user_tit">
				<form onSubmit="return valida_cod()" name="busqueda" action="lista.php" id="busqueda" method="post">
				Campo <select name="campo" id="campo">
				<option value="todos" <?php if ($_SESSION['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
				<option value="Nombre" <?php if ($_SESSION['campo'] == 'Nombre'){?> selected="selected"<?php }?>>Nombre</option>
				<option value="Descripcion" <?php if ($_SESSION['campo'] == 'Descripcion'){?> selected="selected"<?php }?>>Descripci&oacute;n</option>
				</select>
				<input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
				Valor
				<input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor']?>"/>
				<input type="hidden" name="page" id="page" value="gruposUsuario" />

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
							<th>Nombre</th>
							<th>Descripcion</th>

							<th>Acci&oacute;n</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($gruposUsuario as $grupo){
						$list_users = $UsuariosDAO->getsbygrupo($grupo->getId());
						?>
						<tr class="odd gradeX">
							<td><?php echo $grupo->getNombre();?></td>
							<td><?php echo $grupo->getDescripcion()?></td>

							<td>

				<a href="../permisosXOpcionXGrupoUsuario/permisosXOpcionXGrupoUsuario_odst.php?id=<?php echo $grupo->getId();?>" class="btn_editar">

                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                    Permisos</a>				

				<a href="gruposUsuario_editar.php?id=<?php echo $grupo->getId();?>" class="btn_editar">

                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                    Editar</a>
                                                            
                                      <?php if (count($list_users) == 0){?>                  

                    <a onClick="return confirma(this)" href="../php/action/gruposUsuarioDel.php?id=<?php echo $grupo->getId();?>" class="btn_black">

                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div>

                    Eliminar</a>

							<?php }?>
							 </td>
						</tr>
						<?php }?>
					</tbody>
				</table>








		  </div>
		</div>



	</div> <!-- #content -->
	<?php include '../includes/footer.php'; ?>