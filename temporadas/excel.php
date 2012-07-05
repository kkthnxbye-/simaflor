<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$temporadasDAO = new temporadasDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Temporadas.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "temporadas"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$temporadasV = $temporadasDAO->getsbybuscar($_SESSION['bloque'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


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
		<?php foreach ($temporadasV as $temporadas){?>
			<tr>	
        <td><?php echo $temporadas->getId();?></td>			
				<td><?php echo $temporadas->getNombre()?></td>
        <td><?php echo str_replace('1','Si',str_replace('0','No',$temporadas->getHabilitado()));?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>			
