<?php include '../includes/header.php'; ?>
<?php

$familiasDAO = new familiasDAO();
$familia = $familiasDAO->getById($_REQUEST['id']);

?>
<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de Familias</h4> 

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div> 

                Ayuda</a></div>

            

            </div>

			

			<div class="portlet-content"><a name="plugin"></a>				

				<div class="user_tit">

			  <h2>MODIFICAR FAMILIA</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>	

                <br/> 

                

                

                <div class="portlet-content">

				

											

	
				
											
						<form onSubmit="return valida_cod()" action="../php/action/familiaEdit.php" method="post" class="form label-inline">
	
							<div class="field"><label for="fname">Codigo</label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $familia->getCodigo()?>"/></div>
				
							<div class="field"><label for="lname">Nombre</label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $familia->getNombre()?>" /></div>
							
							
							
							<div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $familia->getDescripcion()?></textarea>
							<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>" />
							</div>
							
							<br />
							<div class="buttonrow">

							  <button class="btn btn-grey">Guardar</button>

								<button class="btn btn-black">Cancelar</button>

						  </div>

						</form>



<br /><br />

<br /><br />

				

			</div>

            

			</div>

		</div>

		



		

	</div> <!-- #content -->

	<?php include '../includes/footer.php'; ?>