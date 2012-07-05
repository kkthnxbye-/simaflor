<?php include '../includes/header.php'; ?>
	<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4> 

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div> 

                Ayuda</a></div>

            

            </div>

			

			<div class="portlet-content"><a name="plugin"></a>				

				<div class="user_tit">

			  <h2>NUEVA CAUSA NACIONAL</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>	

                <br/> 

                

                

                <div class="portlet-content">

				

											

						<form onSubmit="return valida_cod()" action="../php/action/causanacionalAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">
	
                                       <div class="field"><label for="lname">C&oacute;digo <span style="color:red">(*)</span></label> 
                                             <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?php if(isset($_GET['c'])): echo $_GET['c']; endif; ?>" /></div>
							<div class="field"><label for="lname">Nombre <span style="color:red">(*)</span></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php if(isset($_GET['n'])): echo $_GET['n']; endif; ?>" /></div>
                                          <div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php if(isset($_GET['d'])): echo $_GET['d']; endif; ?></textarea></div>
							
							
							<div class="field"><label for="fname">Habilitado</label> <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium" /></div>							
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