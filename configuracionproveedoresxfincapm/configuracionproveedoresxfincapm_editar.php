<?php include '../includes/header.php'; ?>
<?php
$empresaDAO = new empresasDAO();
$em = $empresaDAO->getById($_SESSION['finca']);
$configuracionproveedoresxfincapmDAO = new configuracionproveedoresxfincapmDAO();
$configuracionproveedoresxfincapm = $configuracionproveedoresxfincapmDAO->getById($_REQUEST['id']);

?>
<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / <?=$em->getNombre()?> / Editar</h4> 

          <div class="help"></div>

            

            </div>

			

			<div class="portlet-content">
                <br/> 

                

                

                <div class="portlet-content">
					<form onSubmit="return valida_cod()" action="../php/action/configuracionproveedoresxfincapmEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">
					
							<?php $build->dropdown('ID', 'Nombre', 'Productos', 'Producto <span style="color:red">(*)</span>', 'IDProducto', $configuracionproveedoresxfincapm->getIdProducto()); ?>							
							<?php $build->dropdown('ID', 'Nombre', 'MaterialesVegetales', 'Material Vegetal <span style="color:red">(*)</span>', 'IDMaterialVegetal', $configuracionproveedoresxfincapm->getIdMaterialVegetal()); ?>	
							
							<?php $build->dropdown('ID', 'Nombre', 'Empresas', 'Proveedor <span style="color:red">(*)</span>', 'IDFincaProveedor', $configuracionproveedoresxfincapm->getFincaProveedor()); ?>	
													
							<?php $build->dropdown('ID', 'Nombre', 'Empresas', 'Cliente <span style="color:red">(*)</span>', 'IDFincaCliente', $configuracionproveedoresxfincapm->getFincaCliente()); ?>						
													
							
							
							<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']?>" />
							<input type="hidden" id="IDFincaProduccion" name="IDFincaProduccion" value="<?php echo $_SESSION['finca']?>" />
							
							<div class="buttonrow">								
							<button class="btn btn-grey">Guardar</button>
							<button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>
							</div>
						</form>											

<br /><br />

<br /><br />

				

			</div>

            

			</div>

		</div>

		



		

	</div> <!-- #content -->

	<?php include '../includes/footer.php'; ?>