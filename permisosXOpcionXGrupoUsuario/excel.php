<?php session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';


$permisosXOpcionXGrupoUsuarioDAO = new permisosXOpcionXGrupoUsuarioDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=permisosXOpcionXGrupoUsuario.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ($_SESSION['page'] != "permisosXOpcionXGrupoUsuario"){
	$_SESSION['campo'] = "todos";
	$_SESSION['valor'] = "";
	$_SESSION['tipo_b'] = "parte";
}



$permisosXOpcionXGrupoUsuario = $permisosXOpcionXGrupoUsuarioDAO->getsbybuscar($_SESSION['campo'],$_SESSION['tipo_b'],$_SESSION['valor']);
$gruposUsuarioDAO= new gruposUsuarioDAO();
$opcionesDAO= new opcionesDAO();
?>
    <table>
          <tr>
            <td><b>ID<b></td>
            <td><b>Grupo Usuario</b></td>
            <td><b>Opcion</b></td>
            <td><b>Permitir Consultar</b></td>
            <td><b>Permitir Modificar</b></td>


          </tr>
        <?php
        foreach ($permisosXOpcionXGrupoUsuario as $item) {

        ?>
          <tr>
            <td><?php echo $item->getId();?></td>
              <td>
                <?php echo $gruposUsuarioDAO->getById($item->getIdGrupoUsuario())->getNombre();?>
            </td>
            <td>
                <?php echo $opcionesDAO->getById($item->getIdOpcion())->getNombre();?>
            </td>
            <td>
                <?php echo $item->getPermiteConsultar();?>
            </td>
            <td>
                <?php echo $item->getPermiteModificar();?>
            </td>

          </tr>
      <?php } ?>

      </table>
