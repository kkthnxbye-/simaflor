<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$areaspmxbloquepmDAO = new areaspmxbloquepmDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Areas por Bloque.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "areaspmxbloquepm"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$areaspmxbloquepmV = $areaspmxbloquepmDAO->getsbybuscar($_SESSION['bloque'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
		<thead>
			<tr>
        <th>ID</th>
				<th>C&oacute;digo</th>
				<th>Nombre</th>
				<th>Capacidad</th>
				<th>Area de Cultivo</th>
				<th>Area de Camino</th>
				<th>Habilitado</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($areaspmxbloquepmV as $areaspmxbloquepm){?>
			<tr>	
        <td><?php echo $areaspmxbloquepm->getId();?></td>
				<td><?php echo $areaspmxbloquepm->getCodigo();?></td>
				<td><?php echo $areaspmxbloquepm->getNombre()?></td>
				<td><?php echo $areaspmxbloquepm->getCapacidad()?></td>
				<td><?php echo $areaspmxbloquepm->getAreaCultivo()?></td>
				<td><?php echo $areaspmxbloquepm->getAreaCamino()?></td>
				<td><?php echo str_replace('1','Si',str_replace('0','No',$areaspmxbloquepm->getHabilitado()));?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>			
