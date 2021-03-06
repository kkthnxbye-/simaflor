<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Tipos Movimiento Inventarios.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "TiposMovimientoInventarioPM"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "ocurrencias";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$list = $TiposMovimientoInventarioDAO->gets($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td><b>CODIGO</b></td>
          <td><b>NOMBRE</b></td>
          <td><b>SUMA</b></td>
          <td><b>DESCRIPCION</b></td>
          <td><b>ESTADO</b></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $key) { ?>
          <tr>
            <td><?php echo $key->getId();?></td>
            <td><?php echo $key->getCodigo();?></td>
            <td><?php echo $key->getNombre();?></td>
            <td><?php echo $key->getSuma();?></td>
            <td><?php echo $key->getDescripcion();?></td>
            <td>1</td>
          </tr>
      <?php } ?>
      </tbody>
    </table>
