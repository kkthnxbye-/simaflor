<?php
session_start();
include '../php/dao/daoConnetion.php';
require_once '../php/clases.php';

$usuarioss = new usuarios();
$usuariosDAO = new UsuariosDAO();
$gruposUsuarioDAO = new gruposUsuarioDAO();

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Usuarios.xls");
header("Pragma: no-cache");
header("Expires: 0");

$usuarioss = $usuariosDAO->gets($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
?>
<table>
    <thead>
        <tr>  
            <th>GrupoUsuario</th>
            <th>Nombre</th>
            <th>Login</th>
            <th>Clave</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Habilitado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarioss as $usuarios) { ?>
            <tr>
                <td><?= $gruposUsuarioDAO->getById($usuarios->getIdGrupoUsuario())->getNombre(); ?></td>
                <td><?= $usuarios->getNombre() ?></td>
                <td><?= $usuarios->getLogin() ?></td>
                <td><?= $usuarios->getContrasena() ?></td>
                <td><?= $usuarios->getEmail() ?></td>
                <td><?= $usuarios->getTelefono() ?></td>
                <td><?php if($usuarios->getHabilitado() == 1){echo "Si";}else{echo "No";} ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>
