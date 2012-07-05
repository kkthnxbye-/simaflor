<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$configuracionproveedoresxfincapmDAO = new configuracionproveedoresxfincapmDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Configuracion por Proveedores de Fincas.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "configuracionproveedoresxfincapm"){
	$_SESSION['campo'] = "todos";
	$_SESSION['id_finca_cliente'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['id_finca_cliente'] = str_replace('si','1',$_SESSION['id_finca_cliente']);
	$_SESSION['id_finca_cliente'] = str_replace('no','0',$_SESSION['id_finca_cliente']);
}
$configuracionproveedoresxfincapmV = $configuracionproveedoresxfincapmDAO->getsbybuscar($_SESSION['finca'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['id_finca_cliente']);


?>
    <table>
		<thead>
			<tr>
        <th>ID</th>
				<th>Producto</th>
				<th>Material Vegetal</th>
				<th>Cliente</th>	
				<th>Proveedor</th>	
				<th>Productor</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($configuracionproveedoresxfincapmV as $configuracionproveedoresxfincapm){?>
			<tr>	
        <td><?php echo $configuracionproveedoresxfincapm->getId();?></td>
				<td><?php echo $configuracionproveedoresxfincapm->getIdProducto();?></td>
				<td><?php echo $configuracionproveedoresxfincapm->getIdMaterialVegetal();?></td>							
				<td><?php echo $configuracionproveedoresxfincapm->getFincaCliente();?></td>							
				<td><?php echo $configuracionproveedoresxfincapm->getFincaProveedor();?></td>							
				<td><?php echo $configuracionproveedoresxfincapm->getFincaProduccion();?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>			
