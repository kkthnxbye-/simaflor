<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$empresasDAO = new empresasDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Fincas.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "empresas"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$empresas = $empresasDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td><b>Nombre</b></td>
          <td><b>Nit</b></td>
          <td><b>Es Proveedor</b></td>
          <td><b>Es Cliente</b></td>
          <td><b>Es Finca</b></td>
          <td><b>Habilitado</b></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($empresas as $empresa) { ?>
          <tr>
            <td><?php echo $empresa->getId();?></td>
            <td><?php echo $empresa->getNombre()?></td>
            <td><?php echo $empresa->getNit();?></td>
            <td><?php echo str_replace('1','Si',str_replace('0','No',$empresa->getEsProveedor()));?></td>
            <td><?php echo str_replace('1','Si',str_replace('0','No',$empresa->getEsCliente()));?></td>
            <td><?php echo str_replace('1','Si',str_replace('0','No',$empresa->getEsFinca()));?></td>
            <td><?php echo str_replace('1','Si',str_replace('0','No',$empresa->getHabilitado()));?></td>
          </tr>
      <?php } ?>
      </tbody>
    </table>
