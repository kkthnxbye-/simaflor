<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$bloquespmxfincaDAO = new bloquespmxfincaDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Bloques y Areas.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "bloquespmxfinca"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$bloquespmxfinca = $bloquespmxfincaDAO->getsbybuscar($_SESSION['finca'],$_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>  
          <td>ID</td>
          <td><b>C&oacute;digo</b></td>
          <td><b>Nombre</b></td>
          <td><b>Ancho</b></td>
          <td><b>Largo</b></td>
          <td><b>Area</b></td>
          <td><b>Habilitado</b></td>            
        </tr>
      </thead>
      <tbody>
        <?php foreach ($bloquespmxfinca as $bloquepmxfinca) { ?>
        <tr>
          <td><?php echo $bloquepmxfinca->getId();?></td>
          <td><?php echo $bloquepmxfinca->getCodigo();?></td>
          <td><?php echo $bloquepmxfinca->getNombre()?></td>
          <td><?php echo $bloquepmxfinca->getAncho()?></td>
          <td><?php echo $bloquepmxfinca->getLargo()?></td>
          <td><?php echo $bloquepmxfinca->getArea()?></td>
          <td><?php echo str_replace('1','Si',str_replace('0','No',$bloquepmxfinca->getHabilitado()));?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
