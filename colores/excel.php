<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$coloresDAO = new coloresDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=colores.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "colores"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$colores = $coloresDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>
    <table>
      <thead>
        <tr>  
          <td>ID</td>
          <td><b>C&oacute;digo</b></td>
          <td><b>Nombre</b></td>
          <td><b>Descripci&oacute;n</td>
         </tr>
      </thead>
      <tbody>
        <?php foreach ($colores as $item) {?>
          <tr>
            <td><?php echo $item->getId();?></td>
            <td><?php echo $item->getCodigo();?></td>
            <td><?php echo $item->getNombre();?></td>
            <td><?php echo $item->getDescripcion();?></td>
         </tr>
      </tbody>
      <?php } ?>
    </table>
