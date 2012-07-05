
<?php include '../includes/header.php'; ?>
<?php

$laboresPMXProductoDAO = new laboresPMXProductoDAO();
$labor = $laboresPMXProductoDAO->getById($_REQUEST['id']);

$productosDAO = new productosDAO();
$productos = $productosDAO->gets();
$laboresPMDAO = new laboresPMDAO();
$laboresPM = $laboresPMDAO->gets();
$pro_single = $productosDAO->getById($_SESSION['producto']);
$familiasDAO= new familiasDAO();
$familias = $familiasDAO->gets();
$metricasDAO = new metricasDAO();
$metricas = $metricasDAO->gets();
?>
<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administracion / Productos y servicios / Labores por producto / <?=$pro_single->getNombre()?> / Nuevo</h4>

         


            </div>



			<div class="portlet-content">




                <div class="portlet-content">








						<form onSubmit="return valida_cod()" action="../php/action/laboresPMXProductoEdit.php" method="post" class="form label-inline">
                                                        
                                                        <div class="field">
                                                           <label for="fname">LaboresPM <span style="color:red">(*)</span></label>
														<input type="hidden" id="idProducto" name="idProducto" value="<?php echo $_SESSION['producto']?>" />
                                                        <select name="idLabor" id="idLabor">
                                                            <option value=<?=$labor->getIdLaborPM()?>><?=$laboresPMDAO->getById($labor->getIdLaborPM())->getNombre()?></option>
                                                        <?php foreach($laboresPM as $la) :?>
                                                                <?php if($la->getId()!=$labor->getIdLaborPM()):?>
                    
                                                                <option value=<?=$la->getId()?>><?=$la->getNombre()?></option>
                                                                <?php endif;?>
                                                        <?php endforeach;?>
                                                        </select>
                                                        </div>
                                                    
                                                                                                    
                                                    
                                                    <div class="field"><label for="fname">Cantidad <span style="color:red">(*)</span></label> <input id="cantidad" name="cantidad" size="50" type="text" class="medium" value="<?php echo $labor->getCantidad()?>" /></div>

							

<div class="field"><label for="lname">Tiempo cumplimiento <span style="color:red">(*)</span></label> <select name="tp" id="tp">
<?php for ($f=1; $f<= 100; $f++){
$sel="";
if ($f == $labor->getTiempoCumplimiento()){
	$sel="selected";
}
?>
<option value="<?php echo $f?>" <?php echo $sel?>><?php echo $f;?></option>
<?php }?>
</select>
</div>

<div class="field"><label for="lname">Unidad <span style="color:red">(*)</span></label>
<select name="unidad" id="unidad" style="display:inline">
<? foreach($metricas as $metrica): ?>
   <option <?php if($metrica->getId() == $labor->getUnidad()): echo ' selected '; endif; ?> value="<?=$metrica->getId()?>"><?=$metrica->getNombre()?></option>
<? endforeach; ?>  
</select>
</div>

							<div class="field"><label for="description">Observaciones</label> <textarea rows="7" cols="50" name="ob" id="ob"><?php echo $labor->getObservaciones()?></textarea></div>
                                                        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>" />


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