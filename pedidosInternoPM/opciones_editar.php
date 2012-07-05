<?php include '../includes/header.php'; ?>
<?php

$opcionesDAO = new opcionesDAO();
$opcion = $opcionesDAO->getById($_REQUEST['id']);

$modulosDAO= new modulosDAO();
$modulos = $modulosDAO->gets();
?>
<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de opciones</h4>

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>

                Ayuda</a></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

				<div class="user_tit">

			  <h2>MODIFICAR OPCION</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>

                <br/>





                <div class="portlet-content">








						<form action="../php/action/opcionesEdit.php" method="post" class="form label-inline">
                                                       



							<div class="field"><label for="lname">Nombre</label> 
							<input type="hidden" name="idModulo" id="idModulo" value="<?php echo $_SESSION['modulo']?>" />
							<input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $opcion->getNombre()?>" /></div>
                                                        <div class="field"><label for="lname">URL menu</label> <input id="urlMenu" name="urlMenu" size="50" type="text" class="medium" value="<?php echo $opcion->getUrlMenu()?>" /></div>
							<div class="field"><label for="lname">Ruta archivo de ayuda</label> <input id="rutaArchivoAyuda" name="rutaArchivoAyuda" size="50" type="text" class="medium" value="<?php echo $opcion->getUrlMenu()?>" /></div>

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