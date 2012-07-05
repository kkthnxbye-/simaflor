<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$estadositemDAO = new estadositemDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Estados de item.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "estadositem"){
	$_SESSION['campo'] = "nombre";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

$estadositem = $estadositemDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th><b>Nombre</b></th></tr>
		</thead>
		<tbody>
      <?php foreach ($estadositem as $item) { ?>
        <tr>
          <td><?php echo $item->getId();?></td>
          <td><?php echo $item->getNombre()?></td>
       </tr>
		<?php }?>
		</tbody>
	</table>		
