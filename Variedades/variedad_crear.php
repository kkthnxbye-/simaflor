<?php include '../includes/header.php'; 
$coloresDAO = new coloresDAO();
$colores = $coloresDAO->gets();
?>
	<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de Variedades</h4> 

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div> 

                Ayuda</a></div>

            

            </div>

			

			<div class="portlet-content"><a name="plugin"></a>				

				<div class="user_tit">

			  <h2>NUEVA VARIEDAD</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>	

                <br/> 

                

                

                <div class="portlet-content">

				

											

						<form onSubmit="return valida_cod()" action="../php/action/variedadAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">
	
							<div class="field"><label for="lname">Color</label> 
							
							<select id="color" name="color">
							<?php foreach ($colores $color){?>
								<option value="<?php echo $color->getId()?>"><?php echo $color->getNombre()?></option>
							<?php }?>
							</select></div>
							
							<div class="field"><label for="lname">C&oacute;digo</label> <input id="codigo" name="codigo" size="50" type="text" class="medium" /></div>
							<div class="field"><label for="lname">Nombre</label> <input id="nombre" name="nombre" size="50" type="text" class="medium" /></div>
							<div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"></textarea></div>
							
							<div class="field"><label for="lname">Imagen</label> <input id="imagen" name="imagen" size="50" type="file" class="medium" /></div>
							<div class="field"><label for="fname">Habilitado</label> 
							<input type="hidden" id="producto" name="producto" value="<?php echo $_SESSION['producto']?>" />
							<input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium" /></div>							
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