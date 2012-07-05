
<?php include '../includes/header.php'; ?>
<?php

$permisosXOpcionXGrupoUsuarioDAO = new permisosXOpcionXGrupoUsuarioDAO();
$permisos = $permisosXOpcionXGrupoUsuarioDAO->getById($_REQUEST['id']);

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

			  <h2>MODIFICAR PERMISOS</h2></div>

                <div class="btn_right"></div>

              <div class="line"></div>

                <br/>





                <div class="portlet-content">








						<form onSubmit="return valida_cod()" action="../php/action/permisosXOpcionXGrupoUsuarioEdit.php" method="post" class="form label-inline">


                                                        <div class="field">
                                                        <label for="fname">Grupo Usuario</label>
                                                        <select name="idGrupoUsuario" id="idGrupoUsuario">
                                                            <option value=<?=$permisos->getIdGrupoUsuario()?>><?=$gruposUsuarioDAO->getById($permisos->getIdGrupoUsuario())->getNombre()?></option>
                                                        <?php foreach($grupos as $g) :?>
                                                                <?php if($g->getId()!=$permisos->getIdGrupoUsuario()):?>
                                                                <option value=<?=$g->getId()?>><?=$g->getNombre()?></option>
                                                                <?php endif;?>
                                                        <?php endforeach;?>
                                                        </select>
                                                        </div>

                                                        <div class="field">
                                                        <label for="fname">Opcion</label>
                                                        <select name="idOpcion" id="idOpcion">
                                                            <option value=<?=$permisos->getIdOpcion()?>><?=$opcionesDAO->getById($permisos->getIdOpcion())->getNombre()?></option>
                                                        <?php foreach($opciones as $o) :?>
                                                                <?php if($o->getId()!=$permisos->getIdOpcion()):?>
                                                                <option value=<?=$o->getId()?>><?=$o->getNombre()?></option>
                                                                <?php endif;?>
                                                        <?php endforeach;?>
                                                        </select>
                                                        </div>


                                                        <div class="field">
                                                        <label for="fname">Permite consultar</label>
                                                        <select name="permiteConsultar" id="permiteConsultar">
                                                        <?php if($permisos->getPermiteConsultar()==1):?>
                                                            <option value=1>Si</option>
                                                            <option value=0>No</option>
                                                        <?php endif;?>
                                                        <?php if($permisos->getPermiteConsultar()==0):?>
                                                            <option value=0>No</option>
                                                            <option value=1>Si</option>
                                                        <?php endif;?>
                                                        
                                                        </select>
                                                        </div>
                                                    
                                                        <div class="field">
                                                        <label for="fname">Permite modificar</label>
                                                        <select name="permiteModificar" id="permiteModificar">
                                                        <?php if($permisos->getPermiteModificar()==1):?>
                                                            <option value=1>Si</option>
                                                            <option value=0>No</option>
                                                        <?php endif;?>
                                                        <?php if($permisos->getPermiteModificar()==0):?>
                                                            <option value=0>No</option>
                                                            <option value=1>Si</option>
                                                        <?php endif;?>
                                                        </select>
                                                        </div>
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