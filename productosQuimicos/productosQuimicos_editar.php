<?php include '../includes/header.php'; ?>
<?php
$metricasDAO = new metricasDAO();
$metricasV = $metricasDAO->gets();
$productosQuimicosDAO = new productosQuimicosDAO();
$producto = $productosQuimicosDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4><? echo $_SESSION['url_']; ?> / Editar</h4>

          <div class="help"></div>



            </div>



			<div class="portlet-content">




                <div class="portlet-content">





<? //print_r($producto); ?>


						<form onSubmit="return valida_cod()" action="../php/action/productosQuimicosEdit.php" method="post" class="form label-inline" enctype="multipart/form-data">

                                       <div class="field"><label for="fname">Codigo <span style="color:red">(*)</span></label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $producto->getCodigo()?>"/></div>

							<div class="field">
                                             <label for="lname">Nombre <span style="color:red">(*)</span></label> 
                                             <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $producto->getNombre()?>" />
                                          </div>
                  
							<div class="field">
                                             <label for="lname">Imagen Actual</label>
                                             <img src="img/<?php echo $producto->getFoto(); ?>" width="200"  />
                                          </div>
                                          
                                          <div class="field"><label for="lname">Imagen Nueva</label>
							<input id="imagen" name="imagen" size="50" type="file" class="medium" /></div>
							</label>
                                                        <div class="field"><label for="lname">Unidad <span style="color:red">(*)</span></label> <select id="unidad" name="unidad">
<option value="0">Seleccione una unidad</option>
<?php foreach ($metricasV as $metrica){
$sel="";
if ($metrica->getId() == $producto->getUnidad()){
$sel = "selected";
}
?>
<option value="<?php echo $metrica->getId();?>" <? if ($metrica->getId() == $producto->getUnidad()){ echo ' Selected '; }?> ><?php echo $metrica->getNombre()?></option>
<?php }?>
</select></div>


							<div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $producto->getDescripcion()?></textarea>
							<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>" />
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