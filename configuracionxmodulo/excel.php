<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$configuracionxmoduloDAO = new configuracionxmoduloDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Configuracion por Modulo.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "configuracionxmodulo"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$configuracionxmoduloV = $configuracionxmoduloDAO->getsbybuscar($_SESSION['modulo'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
		<thead>
			<tr>
        <th>ID</th>
				<th>Valor</th>
				<th>Modulo</th>
				<th>Tipo de Parametro</th>					
			</tr>
		</thead>
		<tbody>
		<?php foreach ($configuracionxmoduloV as $configuracionxmodulo){?>
			<tr>	
        <td><?php echo $configuracionxmodulo->getId();?></td>
				<td><?php echo $configuracionxmodulo->getValor();?></td>
				<td><?php echo $configuracionxmodulo->getIdModulo();?></td>
				<td><?php echo $configuracionxmodulo->getIdTipoParametro();?></td>				
			</tr>
		<?php }?>
		</tbody>
	</table>			
