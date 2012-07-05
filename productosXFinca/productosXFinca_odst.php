<?php include '../includes/header.php';
$empresasDAO= new empresasDAO();
$empresa = $empresasDAO->getById($_SESSION['finca']);
$productosDAO= new productosDAO();
$productos = $productosDAO->gets();

$productosXFincaDAO = new productosXFincaDAO();


?>

<script>
function cambia_todos(){
	var todos = document.getElementById('total').value;
	var estado = false;
	
	if (document.getElementById('ck_todos').checked){
		estado=true;
	}
	else{
		estado=false;
	}
	var s=1;
	while (s<=todos){
		$('#ck_'+s).attr('checked', estado);
		//document.getElementById().checked = estado;
		//alert(document.getElementById('ck_'+s).checked);
		s++;
	}
}
</script>

	<div id="content" class="xfluid">



	  <div class="portlet x12">

		<div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Fincas / <?php echo $empresa->getNombre();?> / Productos </h4>

          <div class="help">
          </div>



            </div>



			<div class="portlet-content"><a name="plugin"></a>

<!--				<div class="user_tit">

			  <h2>NUEVO PRODUCTO POR FINCA</h2></div>-->

                <br/>





                <div class="portlet-content">





						<form onSubmit="return valida_cod()" action="../php/action/productosXFincaOdst.php" method="post" class="form label-inline">


                                                                                                              

                                                        <div class="field">
                                                        <label for="fname">Producto</label>
														<input type="hidden" id="idFinca" name="idFinca" value="<?php echo $_SESSION['finca']?>" />
														<input type="hidden" id="total" name="total" value="<?php echo count($productos);?>" />														
														<div style=" width:400px;">
														<table>
														<tr><td></td><td><b>Producto</b></td></tr>
														<?php $dd=0;
														 foreach($productos as $producto) :
														 $dd++;
														 
														 
														 ?>
														<tr><td><input type="checkbox" name="ck_<?php echo $dd;?>" id="ck_<?php echo $dd;?>" <?php if ($productosXFincaDAO->Confirmas($_SESSION['finca'],$producto->getId())){?> checked="checked" <?php }?>  value="on"/><input type="hidden" name="prod_<?=$dd?>" id="prod_<?=$dd?>" value="<?=$producto->getId()?>"  /></td><td><?=$producto->getNombre()?></td></tr>
														<?php endforeach;?>
														</table>
														</div>
                                                        </div>

							<br />
							<div class="buttonrow">

							  <button class="btn btn-grey">Guardar</button>

								<button class="btn btn-black" type="button" onclick="location.href='../empresas/lista.php'">Cancelar</button>

						  </div>

						</form>



<br /><br />

<br /><br />



			</div>



			</div>

		</div>







	</div> <!-- #content -->

	<?php include '../includes/footer.php'; ?>