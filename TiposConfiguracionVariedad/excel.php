<?php session_start();
include '../php/dao/daoConnetion.php'; 
require_once '../php/clases.php';


$TiposMaterialVegetalDAO = new TiposConfiguracionVariedadDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Tipos de configuracion por variedad.xls");
header("Pragma: no-cache");
header("Expires: 0");

if (!empty($_POST['page'])) {
    $_SESSION['page'] = $_POST['page'];
}
if (!empty($_REQUEST['page_bus'])) {
    $_SESSION['page'] = "busk_sin";
}
if (!empty($_POST['campo'])) {
    $_SESSION['campo'] = $_POST['campo'];
}
if (!empty($_POST['tipo_b'])) {
    $_SESSION['tipo_b'] = $_POST['tipo_b'];
}
if (!empty($_POST['valor'])) {

    $_SESSION['valor'] = $_POST['valor'];
}


if ($_SESSION['page'] != "TiposConfiguracionVariedad") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "ocurrencias";
}

$list = $TiposMaterialVegetalDAO->gets($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);


?>
    <table>
      <thead>
        <tr>
          <td>ID</td>
          <td>CODIGO</td>
          <td>NOMBRE</td>
          <td>DESCRIPCION</td>
          <td>HABILITADO</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $key) { ?>
          <tr>
            <td><?= $key->getId();?></td>
            <td><?= $key->getCodigo();?></td>
            <td><?= $key->getNombre();?></td>
            <td><?= $key->getDescripcion();?></td>
            <td><?php if($key->getHabilitado() == 1){echo "Si";}else{echo "No";}?></td>
          </tr>
      <?php } ?>
      </tbody>
    </table>
