<?php include '../includes/header.php'; ?>
	<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4> 

          <div class="help"></div>

            

            </div>

			

			<div class="portlet-content">
                <br/> 
                <div class="portlet-content">

                   <form onSubmit="return valida_cod()" action="../php/action/laborAdd.php" method="post" class="form label-inline" enctype="multipart/form-data" >
	
                        <div class="field">
                           <label for="lname">Codigo <span style="color:red">(*)</span></label>
                           <input id="codigo" name="codigo" size="50" type="text" class="medium" />
                        </div>
                     
                        <div class="field">
                           <label for="lname">Nombre <span style="color:red">(*)</span></label>
                           <input id="nombre" name="nombre" size="50" type="text" class="medium" />
                        </div>

                        <div class="field">
                           <label for="description">Descripci&oacute;n</label>
                           <textarea rows="7" cols="50" name="descripcion" id="descripcion"></textarea>
                        </div>
                     
                        <div class="field">
                           <label for="lname">Imagen</label>
                           <input id="file_name" name="file_name" type="file" class="medium" />
                        </div>
					
                        <div class="field">
                           <label for="lname">Habilitado</label>
                           <input id="habilitado" name="habilitado" type="checkbox" class="medium" />
                        </div>
                     
                     
                     
                        <br />
                        <div class="buttonrow">

                           <button class="btn btn-grey">
                              Guardar
                           </button>
                           <button class="btn btn-black" type="button" onclick="location.href='lista.php'">
                              Cancelar
                           </button>

                        </div>

						</form>



<br /><br />

<br /><br />

				

			</div>

            

			</div>

		</div>

		



		

	</div> <!-- #content -->

	<?php include '../includes/footer.php'; ?>