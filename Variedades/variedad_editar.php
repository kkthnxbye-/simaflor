<?php include '../includes/header.php'; ?>
<?php

$VariedadesDAO = new VariedadesDAO();
$variedad = $VariedadesDAO->getById($_REQUEST['id']);

?>
<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de Banco Biol&oacute;gico</h4> 

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div> 

                Ayuda</a></div>

            

            </div>

			

			<div class="portlet-content"><a name="plugin"></a>				

				<div class="user_tit">

			  <h2>MODIFICAR BLANCO BIOL&Oacute;GICO</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>	

                <br/> 

                

                

                <div class="portlet-content">

				

											

						<form onSubmit="return valida_cod()" action="../php/action/variedadEdit.php" method="post" class="form label-inline"  enctype="multipart/form-data">
						
						<div class="field"><label for="lname">Color</label> 
							
							<select id="color" name="color">
							<?php 
							foreach ($colores $color){
							$sel="";
							if ($color->getId() == $variedad->getIdColor()){
								$sel="selected";
							}
							?>
								<option value="<?php echo $color->getId()?>" <?php echo $sel;?>><?php echo $color->getNombre()?></option>
							<?php }?>
							</select></div>
	
							<div class="field"><label for="fname">C&oacute;digo</label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $variedad->getCodigo();?>"/></div>
							<div class="field"><label for="lname">Nombre</label> <input id="nombre" name="nombre" size="50" type="text" class="medium"  value="<?php echo $variedad->getNombre();?>"/></div>
							
							<div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $variedad->getDescripcion();?></textarea></div>
							
							<div class="field"><label for="lname">Imagen Actual<br />
							
							</label>
							
							
							<img src="img/<?php echo $variedad->getFoto(); ?>" width="200px"  />
							<div class="field"><label for="lname">Imagen Nueva<br />
							
							</label>
							
							<input id="imagen" name="imagen" size="50" type="file" class="medium" /></div>
							<div class="field"><label for="fname">Habilitado</label> <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium"  <?php if ($variedad->getHabilitado()=="1"){?> checked="checked" <?php }?>/></div>							
							<br />
							<div class="buttonrow">
							    <input type="hidden" id="producto" name="producto" value="<?php echo $_SESSION['producto']?>" />
								<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']?>" />
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