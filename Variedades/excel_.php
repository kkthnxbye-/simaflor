<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$variedadesDAO = new VariedadesDAO();
$productosDAO = new productosDAO();
$coloresDAO = new coloresDAO();
$variedades = new Variedades();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Variedades.xls");
header("Pragma: no-cache");
header("Expires: 0");


$list = $variedadesDAO->gets($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);

?>
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td><b>PRODUCTO</b></td>
          <td><b>COLOR</b></td>
          <td><b>CODIGO</b></td>
          <td><b>NOMBRE</b></td>
          <td><b>DESCRIPCION</b></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $key) { ?>
          <tr>
            <td><?php echo $key->getId(); ?></td>
            <td><?php echo $coloresDAO->getById($key->getIdColor())->getNombre(); ?></td>
            <td><?php echo $productosDAO->getById($key->getIdProducto())->getNombre(); ?></td>
            <td><?php echo $key->getCodigo(); ?></td>
            <td><?php echo $key->getNombre(); ?></td>
            <td><?php echo $key->getDescripcion(); ?></td>
          </tr>
      <?php } ?>
      </tbody>
    </table>
