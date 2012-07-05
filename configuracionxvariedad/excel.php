<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$configuracionxvariedadDAO = new configuracionxvariedadDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Configuracion por Variedad.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "configuracionxvariedad"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$configuracionxvariedadV = $configuracionxvariedadDAO->getsbybuscar($_SESSION['variedad'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Valor</th>
          <th>Usuario</th>
          <th>Tipo de Variedad</th>
        </tr>
		</thead>
		<tbody>
		<?php foreach ($configuracionxvariedadV as $configuracionxvariedad){?>
			<tr>	
        <td><?php echo $configuracionxvariedad->getId();?></td>
				<td><?php echo $configuracionxvariedad->getValor();?></td>
				<td><?php echo $configuracionxvariedad->getIdVariedad();?></td>
				<td><?php echo $configuracionxvariedad->getIdTipoConfVariedad();?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>			
