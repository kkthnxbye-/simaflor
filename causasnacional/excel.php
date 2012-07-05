<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$causasnacionalDAO = new causasnacionalDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Causas y Desechos.xls");
header("Pragma: no-cache");
header("Expires: 0");

$causasnacional = $causasnacionalDAO->getsbybuscar($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);

?>
     <table>
      <thead>
        <tr>  
          <td>ID</td>
          <td>C&oacute;digo</td>
          <td>Nombre</td>
          <td>Descripci&oacute;n</td>
          <td>Habilitado</td>            
        </tr>
      </thead>
      <tbody>
<?php foreach ($causasnacional as $causanacional) { ?>
          <tr>
              <td><?php echo $causanacional->getId(); ?></td>
            <td><?php echo $causanacional->getCodigo(); ?></td>
            
            <td><?php echo $causanacional->getNombre()?></td>
            <td><?php echo $causanacional->getDescripcion()?></td>
            <td><?php echo str_replace('1','Si',str_replace('0','No',$causanacional->getHabilitado()));?></td>
          </tr>
      </tbody>
      <?php } ?>
    </table>
