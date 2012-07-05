<?php session_start();
include '../php/dao/daoConnetion.php';
include_once '../php/entities/servicios.php';
require_once '../php/clases.php';


$serviciosDAO = new serviciosDAO();


header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Servicios.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "ServiciosPM"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "ocurrencias";
}
$list = $serviciosDAO->filtro($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);

?>
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td><b>CODIGO</b></td>
          <td><b>NOMBRE</b></td>
          <td><b>DESCRIPCION</b></td>
          <td><b>HABILITADO</b></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $key) { ?>
          <tr>
             <td><?php echo $key->getId();?></td>
             <td><?php echo $key->getCodigo();?></td>
             <td><?php echo $key->getNombre();?></td>
             <td><?php echo $key->getDescripcion();?></td>
             <td><?php echo $key->getHabilitado();?></td>
          </tr>
      <?php } ?>
      </tbody>
    </table>