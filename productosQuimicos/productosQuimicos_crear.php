<?php include '../includes/header.php'; 
$metricasDAO = new metricasDAO();
$metricasV = $metricasDAO->gets();
?>
	<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4><? echo $_SESSION['url_']; ?> / Nuevo </h4>

          <div class="help"></div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

<!--				<div class="user_tit">

			  <h2>NUEVO PRODUCTO QUIMICO</h2></div>-->

                <div class="btn_right"></div>

              <div class="line"></div>

                <br/>





                <div class="portlet-content">





   <form onSubmit="return valida_cod()" action="../php/action/productosQuimicosAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">

         <div class="field">
            <label for="fname">Codigo <span style="color:red">(*)</span></label> 
            <input id="codigo" name="codigo" size="50" type="text" class="medium" required 
                   value="<? if(isset($_GET['c'])): echo $_GET['c']; endif; ?>" />
         </div>

         <div class="field">
            <label for="lname">Nombre <span style="color:red">(*)</span></label> 
            <input id="nombre" name="nombre" size="50" type="text" class="medium" required 
                   value="<? if(isset($_GET['n'])): echo $_GET['n']; endif; ?>" />
         </div>

         <div class="field">
            <label for="lname">Imagen <span style="color:red">(*)</span></label> 
            <input id="imagen" name="imagen" size="50" type="file" class="medium" required/>
         </div>
         
         <div class="field">
            <label for="lname">Unidad <span style="color:red">(*)</span></label> 
            <select id="unidad" name="unidad" required>
            <option value="0">Seleccione una unidad</option>
            <?php foreach ($metricasV as $metrica){?>
            <option value="<?php echo $metrica->getId();?>"><?php echo $metrica->getNombre()?></option>
            <?php }?>
            </select>
         </div>

         <div class="field">
            <label for="description">Descripci&oacute;n</label> 
            <textarea rows="7" required cols="50" name="descripcion" id="descripcion"><?php if(isset($_GET['d'])): echo $_GET['d']; endif; ?></textarea>
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