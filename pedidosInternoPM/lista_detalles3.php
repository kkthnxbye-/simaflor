<?php session_start();
require_once '../php/clases.php'; 
$VariedadesDAO = new VariedadesDAO();
if (empty($_SESSION['lista_detalles'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['lista_detalles']);
}
?>
<form name="form1" id="form1" method="post" action="guarda_detalles.php">
<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">

				  <thead>

					  <tr>

							<th><input type="checkbox" name="todos" id="todos" onclick="cambia_todos();" /></th>
						  
						  <th>Fecha Entrega</th>

						  <th>Fecha Recibido</th>

						  <th>Variedad</th>

						  <th>Cantidad</th>

						  <th>Cantidad aprob</th>

                       </tr>

				  </thead>

				  <tbody>
					
					<?php $sdt = 0;
							foreach ($listadetalles as $lis_det){
							$sdt++;
						?>

				    <tr class="odd gradeX">
						
						  <td><input type="checkbox"  name="ckdeta_<?php echo $sdt;?>" id="ckdeta_<?php echo $sdt;?>"/>
							<input type="hidden" name="id_deta_<?php echo $sdt;?>" id="id_deta_<?php echo $sdt;?>" value="<?php echo $lis_det->getId();?>" />
						</td>

						  <td><?php echo $lis_det->getFechaEntrega();?></td>

						  <td><?php echo $lis_det->getFecharecibomaterial();?></td>

						  <td><?php echo $VariedadesDAO->getById($lis_det->getVariedad())->getNombre();?></td>

						  <td class="center"><?php echo $lis_det->getCantidad();?></td>

						  <td class="center"><input type="text" /></td>

						  <td class="center"><a href="javascript:;" onclick="detalle_eliminar(<?php echo $sdt?>)" class="btn_black">

                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                    Eliminar</a></td>

                       </tr>

					<?php 
							 }?>

				    </tbody>

			  </table>
				<table width="100%">
<tr><td  align="right"><button class="btn btn-grey" onclick="location.href='pedidos_crear.php'">Aceptar</button></td></tr>
</table>
</form>