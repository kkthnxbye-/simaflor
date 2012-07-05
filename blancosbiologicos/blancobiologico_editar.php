<?php include '../includes/header.php'; ?>
<?php

$blancosbiologicosDAO = new blancosbiologicosDAO();
$blancobiologico = $blancosbiologicosDAO->getById($_REQUEST['id']);

?>
<div id="content" class="xfluid">

		

	  <div class="portlet x12">

		<div class="portlet-header"><h4>Administraci&oacute;n de Banco Biol&oacute;gico</h4> 

          <div class="help"><a href="" class="btn_black">

                <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div> 

                Ayuda</a></div>

            

            </div>

			

			<div class="portlet-content"><a name="plugin"></a>				

<!--				<div class="user_tit">

			  <h2>MODIFICAR BLANCO BIOL&Oacute;GICO</h2></div>-->

                <div class="btn_right"></div>

              <div class="line"></div>	

                <br/> 

                

                

                <div class="portlet-content">

				

											

   <form onSubmit="return valida_cod()" action="../php/action/blancobiologicoEdit.php" method="post" class="form label-inline"  enctype="multipart/form-data">

         <div class="field"><label for="fname">C&oacute;digo <span style="color:red">(*)</span></label> <input id="codigo" name="codigo" size="50" type="text" class="medium"  value="<?php echo $blancobiologico->getCodigo();?>"/></div>
         <div class="field"><label for="lname">Nombre <span style="color:red">(*)</span></label> <input id="nombre" name="nombre" size="50" type="text" class="medium"  value="<?php echo $blancobiologico->getNombre();?>"/></div>

         <div class="field"><label for="description">Descripci&oacute;n</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?php echo $blancobiologico->getDescripcion();?></textarea></div>

         <div class="field"><label for="lname">Imagen Actual<br />

         </label>


         <img src="img/<?php echo $blancobiologico->getFoto(); ?>" width="200px"  />
         <div class="field"><label for="lname">Imagen Nueva<br />

         </label>

         <input id="imagen" name="imagen" size="50" type="file" class="medium" /></div>
         <div class="field"><label for="fname">Habilitado</label> <input id="habilitado" name="habilitado" size="50" type="checkbox" class="medium"  <?php if ($blancobiologico->getHabilitado()=="1"){?> checked="checked" <?php }?>/></div>							
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