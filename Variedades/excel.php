<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$blancosbiologicosDAO = new blancosbiologicosDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=familias.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "blancosbiologicos"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'],"Es") || strstr($_SESSION['campo'],"Hab")){
	$_SESSION['valor'] = str_replace('si','1',$_SESSION['valor']);
	$_SESSION['valor'] = str_replace('no','0',$_SESSION['valor']);
}
$blancosbiologicos = $blancosbiologicosDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
          <tr>
            
            <td><b>C&oacute;digo</b></td>
			<td><b>Nombre</b></td>
			<td><b>Descripci&oacute;n</b></td>
			<td><b>Habilitado</b></td>
            
          </tr>
        <?php
        foreach ($blancosbiologicos as $blancobiologico) {
        
        ?>
          <tr>
		  <td><?php echo $blancobiologico->getCodigo();?></td>
            <td><?php echo $blancobiologico->getNombre()?></td>
			<td><?php echo $blancobiologico->getDescripcion()?></td>
			<td><?php echo str_replace('1','Si',str_replace('0','No',$blancobiologico->getHabilitado()));?></td>
          </tr>
      <?php } ?>

      </table>
