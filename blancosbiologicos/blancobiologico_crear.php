<?php include '../includes/header.php'; ?>
	<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4> 

          <div class="help"></div>

            

            </div>

			

			<div class="portlet-content">

                

                

                <div class="portlet-content">

				

											

						<form action="../php/action/blancobiologicoAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">
	
                                       <div class="field"><label for="lname">C&oacute;digo <strong style="color:red">*</strong> </label> 
                                             <input id="codigo" name="codigo" size="50" type="text" class="medium" required /></div>
							<div class="field"><label for="lname">Nombre <strong style="color:red">*</strong></label> 
                                             <input id="nombre" name="nombre" size="50" type="text" class="medium" required /></div>
							<div class="field"><label for="description">Descripci&oacute;n</label> 
                                             <textarea rows="7" cols="50" name="descripcion" id="descripcion"></textarea></div>
							
							<div class="field"><label for="lname">Imagen <strong style="color:red">*</strong></label> 
                                             <input id="imagen" name="imagen" size="50" type="file" class="medium" required /></div>
							<div class="field"><label for="fname">Habilitado</label> 
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