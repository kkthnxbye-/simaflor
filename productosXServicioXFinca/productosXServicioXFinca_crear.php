<?php include '../includes/header.php';
$empresasDAO= new empresasDAO();
$empresas = $empresasDAO->gets();
$productosDAO = new productosDAO();
$productosXFincaDAO = new productosXFincaDAO();
$productos = $productosXFincaDAO->getsbybuscar($_SESSION['finca']);
$serviciosDAO = new serviciosDAO();
$servicioss = $serviciosDAO->gets();
$materialesVegetalesDAO= new materialesVegetalesDAO();
$materiales = $materialesVegetalesDAO->gets();
$obj_finca = $empresasDAO->getById($_SESSION['finca']);
?>
	<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / <?php echo $obj_finca->getNombre();?> / Nuevo</h4>

          <div class="help"></div>



            </div>



			<div class="portlet-content">

                <br/>





                <div class="portlet-content">





						<form onSubmit="return valida_cod()" action="../php/action/productosXServicioXFincaAdd.php" method="post" class="form label-inline">


                                                        

               <div class="field">
                  
                  <label for="fname">Producto <span style="color:red">(*)</span></label>
               <input type="hidden" id="idFinca" name="idFinca" value="<?php echo $_SESSION['finca']?>" />
               <select name="idProducto" id="idProducto">
                  <option value="0">Seleccionar</option>
               <?php foreach($productos as $producto) :?>
                  <?php $p = $productosDAO->getById($producto->getIdProducto()) ?>
             
                  <option <?php if(isset($_GET['idp'])): if($_GET['idp'] == $p->getId()): echo ' selected '; endif; endif; ?>  value=<?=$p->getId()?>><?=$p->getNombre()?></option>
               <?php endforeach;?>
               </select>
               </div>

               <div class="field">
               <label for="fname">Servicio <span style="color:red">(*)</span></label>
               <select name="idServicio" id="idServicio">
                  <option value="0">Seleccionar</option>
               <?php foreach($servicioss as $servicio) :?>
                        <option <?php if(isset($_GET['ids'])): if($_GET['ids'] == $servicio->getId()): echo ' selected '; endif; endif; ?> value=<?=$servicio->getId()?>><?=$servicio->getNombre()?></option>
               <?php endforeach;?>
               </select>
               </div>

               <div class="field">
               <label for="fname">Material Vegetal <span style="color:red">(*)</span></label>
               <select name="idMaterialesVegetales" id="idMaterialesVegetales">
                  <option value="0">Seleccionar</option>
               <?php foreach($materiales as $material) :?>
                        <option <?php if(isset($_GET['idm'])): if($_GET['idm'] == $material->getId()): echo ' selected '; endif; endif; ?> value=<?=$material->getId()?>><?=$material->getNombre()?></option>
               <?php endforeach;?>
               </select>
               </div>

							<br />
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