<?php include '../includes/header.php'; ?>
<?php

$causasnacionalDAO = new causasnacionalDAO();
$causanacional = $causasnacionalDAO->getById($_REQUEST['id']);

?>
<div id="content" class="xfluid">

		

	  <div class="portlet x12">

           <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar</h4> 

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div> 

                Ayuda</a></div>

            

            </div>

			

			<div class="portlet-content">	

                <br/> 

                

                

                <div class="portlet-content">

				

											

						<form onSubmit="return valida_cod()" action="../php/action/causanacionalEdit.php" method="post" class="form label-inline"  enctype="multipart/form-data">
	
                                       <div class="field"><label for="fname">C&oacute;digo <span style="color:red">(*)</span> </label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $causanacional->getCodigo();?>"/></div>
							<div class="field"><label for="lname">Nombre <span style="color:red">(*)</span></label> <input id="nombre" name="nombre" size="50" type="text" class="medium"  value="<?php echo $causanacional->getNombre();?>"/></div>
							
							<div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $causanacional->getDescripcion();?></textarea></div>
							
							
							<div class="field"><label for="fname">Habilitado</label> <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium"  <?php if ($causanacional->getHabilitado()=="1"){?> checked="checked" <?php }?>/></div>							
							<br />
							<div class="buttonrow">
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