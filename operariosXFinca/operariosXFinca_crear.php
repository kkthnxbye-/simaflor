<?php include '../includes/header.php';
$empresasDAO= new empresasDAO();
$empresas = $empresasDAO->gets();
$operariosDAO= new operariosDAO();
$operarios = $operariosDAO->gets();
?>
	<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de operarios por finca</h4>

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>

                Ayuda</a></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

				<div class="user_tit">

			  <h2>NUEVO OPERARIO POR FINCA</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>

                <br/>





                <div class="portlet-content">





						<form onSubmit="return valida_cod()" action="../php/action/operariosXFincaAdd.php" method="post" class="form label-inline">


                                                        <div class="field">
                                                        

                                                        <div class="field">
                                                        <label for="fname">Operario</label>
														<input type="hidden" id="idFinca" name="idFinca" value="<?php echo $_SESSION['finca']?>" />
                                                        <select name="idOperario" id="idOperario">
                                                        <?php foreach($operarios as $operario) :?>
                                                                <option value=<?=$operario->getId()?>><?=$operario->getNombre()?></option>
                                                        <?php endforeach;?>
                                                        </select>
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