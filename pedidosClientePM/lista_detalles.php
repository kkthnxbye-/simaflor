<?php session_start();
require_once '../php/clases.php'; 
$VariedadesDAO = new VariedadesDAO();
if (empty($_SESSION['lista_detalles'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['lista_detalles']);
}
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">

				  <thead>

					  <tr>

						  <th>Fecha entrega</th>

						  <th>Fecha recibido</th>

						  <th>Variedad</th>

						  <th>Cantidad</th>

						  <th>Opciones</th>

                       </tr>

				  </thead>

				  <tbody>
					
					<?php $sdt = 0;
                              $totalG = 0;
                              //print_r($listadetalles);
							foreach ($listadetalles as $lis_det){?>
                            <?php $totalG+=$lis_det->getCantidad(); ?>
				    <tr class="odd gradeX">

						  <td><?php echo $lis_det->getFechaEntrega();?></td>

						  <td><?php echo $lis_det->getFecharecibomaterial();?></td>

<!--						  <td><?php //echo $VariedadesDAO->getById($lis_det->getVariedad())->getNombre();?></td>-->
                                      <td><?php echo $VariedadesDAO->getById($lis_det->getVariedad())->getNombre(); ?></td>

						  <td class="center"><?php echo $lis_det->getCantidad();?></td>

						  <td class="center"><a href="javascript:;" onclick="detalle_eliminar(<?php echo $sdt?>)" class="btn_black">

                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                    Eliminar</a></td>

                       </tr>

					<?php $sdt++;
							 }?>
                       <tr>
                          <td colspan="3" align="right">
                             <strong style="color:red">Total:</strong>
                          </td>
                          <td><?php echo $totalG; ?></td>
                          <td></td>
                       </tr>
				    </tbody>

			  </table>