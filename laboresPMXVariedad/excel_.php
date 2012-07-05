<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$variedadesDAO = new VariedadesDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Labores por variedad.xls");
header("Pragma: no-cache");
header("Expires: 0");


if ($_SESSION['page_bus'] == 2){
	$_SESSION['campo'] = "";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "";
}




$prods = $variedadesDAO->gets($_SESSION['campo'], 'ocurrencias', $_SESSION['valor']);

?>

    <table>
         <tr>
            <td><b>ID</b></td>
            <td><b>CODIGO</b></td>
            <td><b>NOMBRE</b></td>
         </tr>
        <?php
        foreach ($prods as $item) {

        ?>
          <tr>
            <td>
               <?php echo $item->getId();?>
            </td>
            <td>
                <?php echo $item->getCodigo(); ?>
            </td>
            <td>
                <?php echo $item->getNombre();?>
            </td>
          </tr>
      <?php } ?>

      </table>
