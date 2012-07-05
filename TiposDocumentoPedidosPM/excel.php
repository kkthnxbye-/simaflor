<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$TiposDocumentoPedidosPMDAO = new TiposDocumentoPedidosPMDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Tipos Documentos Pedidos PM.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "TiposDocumentoPedidosPM"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "ocurrencias";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$list = $TiposDocumentoPedidosPMDAO->gets($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td><b>CODIGO</b></td>
          <td><b>NOMBRE</b></td>
          <td><b>HABILITADO</b></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $key) { ?>
          <tr>
            <td><?php echo $key->getId();?></td>
            <td><?php echo $key->getCodigo()?></td>
            <td><?php echo $key->getNombre();?></td>
            <td><?php echo str_replace('1','Si',str_replace('0','No',$key->getHabilitado()));?></td>
          </tr>
      <?php } ?>
      </tbody>
    </table>
