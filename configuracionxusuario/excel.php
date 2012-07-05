<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$configuracionxusuarioDAO = new configuracionxusuarioDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Configuracion por Usuario.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "configuracionxusuario"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$configuracionxusuarioV = $configuracionxusuarioDAO->getsbybuscar($_SESSION['usuario'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
		<thead>
			<tr>
        <th>ID</th>
				<th>Valor</th>
				<th>Usuario</th>
				<th>Tipo de Configuracion</th>	
			</tr>
		</thead>
		<tbody>
		<?php foreach ($configuracionxusuarioV as $configuracionxusuario){?>
			<tr>	
        <td><?php echo $configuracionxusuario->getId();?></td>
				<td><?php echo $configuracionxusuario->getValor();?></td>
				<td><?php echo $configuracionxusuario->getIdUsuario();?></td>
				<td><?php echo $configuracionxusuario->getIdTipoConfUsuario();?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>			
