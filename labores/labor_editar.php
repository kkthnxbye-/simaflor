<?php include '../includes/header.php'; ?>
<?php

include '../php/dao/laboresDAO.php';
include '../php/entities/labores.php';

$lDAO = new LaboresDAO();
$l = $lDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">

		

	  <div class="portlet x12">

           <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Editar </h4> 

          <div class="help"></div>

            

            </div>

			

			<div class="portlet-content">

                <br/> 

                

                

                <div class="portlet-content">					
                   <form action="../php/action/laborEdit.php" method="post" class="form label-inline" enctype="multipart/form-data" >
	
			<div class="field">
                           <label for="lname">Codigo <span style="color:red">(*)</span></label>
                           <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$l->getCodigo();?>"/>
                        </div>
                     
                        <div class="field">
                           <label for="lname">Nombre <span style="color:red">(*)</span></label>
                           <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$l->getNombre();?>" />
                        </div>

                        <div class="field">
                           <label for="description">Descripci&oacute;n</label>
                           <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$l->getDescripcion()?></textarea>
                        </div>
                     
                        <div class="field">
                           <label for="lname">Imagen</label>
                           <input id="file_name" name="file_name" type="file" class="medium" />
                        </div>
				
                        <?php if($l->getFoto() != '' and $l->getFoto() != 0): ?>
                        <div class="field">
                           <img src="images/<?=$l->getFoto()?>" width="100" border="0" />
                        </div>
                        <?php endif; ?>
                      
                        <div class="field">
                           <label for="lname">Habilitado</label>
                           <?php if($l->getHabilitado() == 1): ?>
                           <input id="habilitado" name="habilitado" type="checkbox" class="medium" checked="checked" />
                           <?php else: ?>
                           <input id="habilitado" name="habilitado" type="checkbox" class="medium" />
                           <?php endif; ?>
                        </div>
							
							<br />
							<div class="buttonrow">
                                            <input type="hidden" name="image2" id="image2" value="<?=$l->getFoto();?>">
                                            <input type="hidden" name="id" id="id" value="<?=$l->getId();?>">
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