<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$metricasDAO = new metricasDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Metricas.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "metricas"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$metricasV = $metricasDAO->getsbybuscar($_SESSION['bloque'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
		<thead>
			<tr>
        <th>ID</th>
				<th>Nombre</th>
				<th>Habilitado</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($metricasV as $metricas){?>
			<tr>	
        <td><?php echo $metricas->getId();?></td>			
				<td><?php echo $metricas->getNombre()?></td>
        <td><?php echo str_replace('1','Si',str_replace('0','No',$metricas->getHabilitado()));?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>			
