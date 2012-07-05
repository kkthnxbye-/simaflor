<?php 
	include '../includes/header.php';
      $empresaDAO = new empresasDAO();
$em = $empresaDAO->getById($_SESSION['finca']);
?>

	<div id="content" class="xfluid">		

	  <div class="portlet x12">

		<div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / <?=$em->getNombre()?> / Nuevo</h4> 

          <div class="help"></div>

            

            </div>

			

			<div class="portlet-content">

                <br/> 


                <div class="portlet-content">						
						<form onSubmit="return valida_cod()" action="../php/action/configuracionproveedoresxfincapmAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">							
							
							<!--<div class="field"><label for="bloque">Bloque</label>
							<input id="bloque" name="bloque" size="50" type="text" class="medium" /></div>-->						
							
							<?php $build->dropdown('ID', 'Nombre', 'Productos', 'Producto <span style="color:red">(*)</span>', 'IDProducto'); ?>							
							<?php $build->dropdown('ID', 'Nombre', 'MaterialesVegetales', 'Material Vegetal <span style="color:red">(*)</span>', 'IDMaterialVegetal'); ?>							
							<?php $build->dropdown('ID', 'Nombre', 'Empresas', 'Proveedor <span style="color:red">(*)</span>', 'IDFincaProveedor'); ?>	
							<?php $build->dropdown('ID', 'Nombre', 'Empresas', 'Cliente <span style="color:red">(*)</span>', 'IDFincaCliente'); ?>															
							
							<input type="hidden" id="IDFincaProduccion" name="IDFincaProduccion" value="<?php echo $_SESSION['finca']?>" />
							
							</div>							
							<br />
							
							<div class="buttonrow">								
							<button class="btn btn-grey">Guardar</button>
							<button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>
							</div>
						</form>
						<br />
						<br />
						<br />
						<br />
					</div>
				</div>
			</div>
		</div> <!-- #content -->

	<?php include '../includes/footer.php'; ?>