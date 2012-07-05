
<?php include '../includes/header.php'; ?>
<?php

$productosXFincaDAO = new productosXFincaDAO();
$op = $productosXFincaDAO->getById($_REQUEST['id']);

$empresasDAO= new empresasDAO();
$empresas = $empresasDAO->gets();
$productosDAO= new productosDAO();
$productos = $productosDAO->gets();


?>
<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de productos por finca</h4>

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>

                Ayuda</a></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

				<div class="user_tit">

			  <h2>MODIFICAR PRODUCTO POR FINCA</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>

                <br/>





                <div class="portlet-content">








						<form onSubmit="return valida_cod()" action="../php/action/productosXFincaEdit.php" method="post" class="form label-inline">


                                                        <div class="field">
                                                        <label for="fname">Producto</label>
														<input type="hidden" id="idFinca" name="idFinca" value="<?php echo $_SESSION['finca']?>" />
                                                        <select name="idProducto" id="idProducto">
                                                            <option value=<?=$op->getIdProducto()?>><?=$productosDAO->getById($op->getIdProducto())->getNombre()?></option>
                                                        <?php foreach($productos as $producto) :?>
                                                                <?php if($producto->getId()!=$op->getIdProducto()):?>
                                                                <option value=<?=$producto->getId()?>><?=$producto->getNombre()?></option>
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