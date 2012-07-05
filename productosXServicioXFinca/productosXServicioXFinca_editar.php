
<?php include '../includes/header.php'; ?>
<?php

$productosXServicioXFincaDAO = new productosXServicioXFincaDAO();
$op = $productosXServicioXFincaDAO->getById($_REQUEST['id']);

$empresasDAO= new empresasDAO();
$empresas = $empresasDAO->gets();
$productosDAO = new productosDAO();
$productosXFincaDAO = new productosXFincaDAO();
$productos = $productosXFincaDAO->getsbybuscar($_SESSION['finca']);
//$productos = $productosDAO->gets();
$serviciosDAO = new serviciosDAO();
$servicioss = $serviciosDAO->gets();
$materialesVegetalesDAO= new materialesVegetalesDAO();
$materiales = $materialesVegetalesDAO->gets();
$obj_finca = $empresasDAO->getById($_SESSION['finca']);

?>
<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / <?php echo $obj_finca->getNombre();?> / Editar</h4>

          <div class="help"></div>



            </div>



			<div class="portlet-content">

<!--				<div class="user_tit">

			  <h2>MODIFICAR PRODUCTO SERVICIO FINCA  / <?php //echo $obj_finca->getNombre();?></h2></div>-->

                

                <br/>





                <div class="portlet-content">








						<form onSubmit="return valida_cod()" action="../php/action/productosXServicioXFincaEdit.php" method="post" class="form label-inline">


                                                        

                        <div class="field">
                        <label for="fname">Producto</label>
                                                   <input type="hidden" id="idFinca" name="idFinca" value="<?php echo $_SESSION['finca']?>" />
                        <?php //print_r($productos); ?> 
                                                   <select name="idProducto" id="idProducto">
                          
                        <?php foreach($productos as $producto) :?>
                                 <?php $p = $productosDAO->getById($producto->getIdProducto()) ?>
                        <option <?php if($op->getIdProducto() == $p->getId()): echo ' selected '; endif; ?> value=<?=$p->getId()?>><?=$p->getNombre()?></option>
                        <?php endforeach;?>
                        </select>
                        </div>

                        <div class="field">
                        <label for="fname">Servicio</label>
                        <select name="idServicio" id="idServicio">
                           <option value=<?=$op->getIdServicio()?>><?=$serviciosDAO->getById($op->getIdServicio())->getNombre()?></option>
                        <?php foreach($servicioss as $servicio) :?>
                                 <?php if($servicio->getId()!=$op->getIdServicio()):?>
                                 <option value=<?=$servicio->getId()?>><?=$servicio->getNombre()?></option>
                                 <?php endif;?>
                        <?php endforeach;?>
                        </select>
                        </div>


                        <div class="field">
                        <label for="fname">Material vegetal</label>
                        <select name="idMaterialVegetal" id="idMaterialVegetal">
                           <option value=<?=$op->getIdMaterialVegetal()?>><?=$materialesVegetalesDAO->getById($op->getIdMaterialVegetal())->getNombre()?></option>
                        <?php foreach($materiales as $m) :?>
                                 <?php if($m->getId()!=$op->getIdMaterialVegetal()):?>
                                 <option value=<?=$m->getId()?>><?=$m->getNombre()?></option>
                                 <?php endif;?>
                        <?php endforeach;?>
                        </select>
                        </div>


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