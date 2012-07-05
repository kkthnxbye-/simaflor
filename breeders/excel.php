<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$breedersDAO = new breedersDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Breeders.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "breeders"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$breedersV = $breedersDAO->getsbybuscar($_SESSION['bloque'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
		<thead>
			<tr>
        <th>ID</th>
				<th>C&oacute;digo</th>
				<th>Nombre</th>
				<th>Descripcion</th>			
			</tr>
		</thead>
		<tbody>
		<?php foreach ($breedersV as $breeders){?>
			<tr>	
        <td><?php echo $breeders->getId();?></td>
				<td><?php echo $breeders->getCodigo();?></td>
				<td><?php echo $breeders->getNombre()?></td>
				<td><?php echo $breeders->getDescripcion()?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>			
