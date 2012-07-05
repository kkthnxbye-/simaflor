<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$estadosfumigacionDAO = new estadosfumigacionDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Estados de fumigacion.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "estadosfumigacion"){
	$_SESSION['campo'] = "nombre";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

$estadosfumigacion = $estadosfumigacionDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th><b>Nombre</b></th>
        </tr>
		</thead>
		<tbody>
      <?php foreach ($estadosfumigacion as $item) { ?>
      <tr>
        <td><?php echo $item->getId();?></td>            
        <td><?php echo $item->getNombre()?></td>
      </tr>
		<?php }?>
		</tbody>
	</table>			
