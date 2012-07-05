
<?php include '../includes/header.php'; ?>
<?php

$productosDAO = new productosDAO();
$producto = $productosDAO->getById($_REQUEST['id']);

$familiasDAO= new familiasDAO();
$familias = $familiasDAO->gets();
?>
<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4>

          <div class="help"></div>



            </div>



			<div class="portlet-content">
                <br/>





                <div class="portlet-content">








						<form onSubmit="return valida_cod()" action="../php/action/productosEdit.php" method="post" class="form label-inline">

                                                    <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $producto->getCodigo()?>" required/></div>

                                                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $producto->getNombre()?>" required/></div>

                                                        <div class="field">
                                                        <label for="fname">Familia <strong style="color: red">*</strong></label>
                                                        <select name="idFamilia" id="idFamilia" required>
                                                            <option value=<?=$producto->getIdFamilia()?>><?=$familiasDAO->getById($producto->getIdFamilia())->getNombre()?></option>
                                                        <?php foreach($familias as $familia) :?>
                                                                <?php if($familia->getId()!=$producto->getIdFamilia()):?>
                                                                <option value=<?=$familia->getId()?>><?=$familia->getNombre()?></option>
                                                                <?php endif;?>
                                                        <?php endforeach;?>
                                                        </select>
                                                        </div>


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