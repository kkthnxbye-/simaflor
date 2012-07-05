<?php include '../includes/header.php'; ?>
	<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4><?= $_SESSION['url_']; ?> /  Nuevo</h4> 

          <div class="help">
          
          </div>

            

            </div>

			

			<div class="portlet-content"><a name="plugin"></a>				

<!--				<div class="user_tit">

			  <h2>NUEVA EMPRESA</h2></div>-->

               	

                <br/> 

                

                

                <div class="portlet-content">

				

											

						<form onSubmit="return valida_cod()" action="../php/action/empresaAdd.php" method="post" class="form label-inline">
	
                                       <div class="field"><label for="lname">Nombre <span style="color:red">(*)</span></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" /></div>
                                       <div class="field"><label for="fname">Nit <span style="color:red">(*)</span></label> <input id="nit" name="nit" size="50" type="text" class="medium" /></div>
                                       <div class="field"><label for="fname">Es Proveedor</label> <input id="esproveedor" name="esproveedor" size="50" type="checkbox" class="medium" /></div>
                                       <div class="field"><label for="fname">Es Cliente</label> <input id="escliente" name="escliente" size="50" type="checkbox" class="medium" /></div>
                                       <div class="field"><label for="fname">Es Finca</label> <input id="esfinca" name="esfinca" size="50" type="checkbox" class="medium" /></div>
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