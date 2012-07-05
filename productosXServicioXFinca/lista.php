<?php include '../includes/header.php'; ?>
<?php

$productosXServicioXFincaDAO = new productosXServicioXFincaDAO();
$empresasDAO= new empresasDAO();
$productosDAO= new productosDAO();
$serviciosDAO= new serviciosDAO();
$materialesVegetalesDAO= new materialesVegetalesDAO();

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


if ($_SESSION['page'] != "productosXServicioXFinca"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}
$obj_finca = $empresasDAO->getById($_SESSION['finca']);
$productosXServicioXFinca = $productosXServicioXFincaDAO->getsbybuscar($_SESSION['finca'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>




	<div id="content" class="xfluid">

		<div class="portlet x12">

		<div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / <?php echo $obj_finca->getNombre();?> </h4>

          <div class="help">
                
                <a href="../empresas/lista.php" class="btn_black">  
                    &nbsp;&nbsp;Atras
                </a>
            
            </div>



            </div>



			<div class="portlet-content">

                
				<div class="user_tit">
				<form onSubmit="return valida_cod()" name="busqueda" action="lista.php" id="busqueda" method="post">
				Campo <select name="campo" id="campo">
				<option value="todos" <?php if ($_SESSION['campo'] == 'todos'){?> selected="selected"<?php }?>>Todos</option>
				</select>
				<input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
				Valor
				<input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor']?>"/>
				<input type="hidden" name="page" id="page" value="productosXServicioXFinca" />

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
                    
                    <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='productosXServicioXFinca_crear.php'">
                      Nueva
                   </button>


              <a href="excel.php" class="btn_editar">

                <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div>

                Exportar (CSV)
              </a>
                   

              <br/><br/>

              </div>

				<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
              <th>Finca</th>
							<th>Producto</th>
                                                        <th>Servicio</th>
                                                        <th>Material Vegetal</th>
							<th>Acci&oacute;n</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($productosXServicioXFinca as $op){?>
					<?php if(($_SESSION['finca']=="-1") || ($_SESSION['finca'] == $op->getIdFinca())):?>
						<tr class="odd gradeX">
            <td><?php echo $op->getId();?></td>
                    <?php if($_SESSION['finca']=="-1"):?>
                                                    <td><?php echo $empresasDAO->getById($op->getIdFinca())->getNombre();?></td>
                                                    <td><?php echo $productosDAO->getById($op->getIdProducto())->getNombre()?></td>
                                                    <td><?php echo $serviciosDAO->getById($op->getIdServicio())->getNombre()?></td>
                                                    <td><?php echo $materialesVegetalesDAO->getById($op->getIdMaterialVegetal())->getNombre()?></td>
							<td><a href="productosXServicioXFinca_editar.php?id=<?php echo $op->getId();?>" class="btn_editar">

                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                    Editar</a>

                    <a href="../php/action/productosXServicioXFincaDel.php?id=<?php echo $op->getId();?>" class="btn_black">

                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div>

                    Eliminar</a>
                    </td>
                    <?php endif;?>
                    <?php if($_SESSION['finca']!="-1"):?>
                        <?php if($_SESSION['finca'] == $op->getIdFinca()):?>
                         <td><?php echo $empresasDAO->getById($op->getIdFinca())->getNombre();?></td>
                         <td><?php echo $productosDAO->getById($op->getIdProducto())->getNombre()?></td>
                         <td><?php echo $serviciosDAO->getById($op->getIdServicio())->getNombre()?></td>
                         <td><?php echo $materialesVegetalesDAO->getById($op->getIdMaterialVegetal())->getNombre()?></td>
			<td><a href="productosXServicioXFinca_editar.php?id=<?php echo $op->getId();?>" class="btn_editar">

                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                    Editar</a>

                     <a onclick="return confirma(this);" href="../php/action/productosXServicioXFincaDel.php?id=<?php echo $op->getId();?>" class="btn_black">

                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div>

                    Eliminar</a>
							 </td>
							 <?php endif;?>
							 <?php endif;?>

						</tr>
						<?php endif;?>
						<?php }?>
					</tbody>
				</table>








		  </div>
		</div>



	</div> <!-- #content -->
	<?php include '../includes/footer.php'; ?>