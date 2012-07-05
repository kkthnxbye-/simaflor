<?php include '../includes/header.php';
$gruposUsuarioDAO= new gruposUsuarioDAO();
$grupos = $gruposUsuarioDAO->gets();
$opcionesDAO= new opcionesDAO();
$opciones = $opcionesDAO->gets();
?>
	<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de permisos</h4>

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>

                Ayuda</a></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

				<div class="user_tit">

			  <h2>NUEVOS PERMISOS</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>

                <br/>





                <div class="portlet-content">





						<form onSubmit="return valida_cod()" action="../php/action/permisosXOpcionXGrupoUsuarioAdd.php" method="post" class="form label-inline">

                                                        <div class="field">
                                                        <label for="fname">Grupo Usuario</label>
                                                        <select name="idGrupoUsuario" id="idGrupoUsuario">
                                                        <?php foreach($grupos as $grupo) :?>
                                                                <option value=<?=$grupo->getId()?>><?=$grupo->getNombre()?></option>
                                                        <?php endforeach;?>
                                                        </select>
                                                        </div>

                                                        <div class="field">
                                                        <label for="fname">Opcion</label>
                                                        <select name="idOpcion" id="idOpcion">
                                                        <?php foreach($opciones as $opcion) :?>
                                                                <option value=<?=$opcion->getId()?>><?=$opcion->getNombre()?></option>
                                                        <?php endforeach;?>
                                                        </select>
                                                        </div>

                                                        <div class="field">
                                                        <label for="fname">Permite consultar</label>
                                                        <select name="permiteConsultar" id="permiteConsultar">
                                                        <option value=1>Si</option>
                                                        <option value=0>No</option>
                                                        </select>
                                                        </div>
                                                        <div class="field">
                                                        <label for="fname">Permite modificar</label>
                                                        <select name="permiteModificar" id="permiteModificar">
                                                        <option value=1>Si</option>
                                                        <option value=0>No</option>
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