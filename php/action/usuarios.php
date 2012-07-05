<?php

include 'php/dao/daoConnection.php';
include 'php/dao/UsuariosDAO.php';
include 'php/entities/usuarios.php';


$usuariosDAO = new UsuariosDAO();
$usuarios = $usuariosDAO->gets();
?>
<table width="100%" id="ciudad">
	<tr>
        <td width="25%"><label for="nombre">ID</label></td>
		<td width="25%"><label for="nombre">Grupo</label></td>
		<td width="25%"><label for="nombre">Login</label></td>
		<td width="25%"><label for="nombre">Contrase&ntilde;a</label></td>
		<td width="25%"><label for="nombre">Nombres</label></td>
		<td width="25%"><label for="nombre">E-mail</label></td>
		<td width="25%"><label for="nombre">Tel&eacute;fono</label></td>
		<td width="25%"><label for="nombre">Habilitado</label></td>
        
    </tr>
	<?php foreach($usuarios as $usuario):?>
    <tr>
        <td width="25%"><label for="nombre"><?php echo $usuario->getId();?></label></td>
		<td width="25%"><label for="nombre"><?php echo $usuario->getIdGrupoUsuario();?></label></td>
		<td width="25%"><label for="nombre"><?php echo $usuario->getLogin();?></label></td>
		<td width="25%"><label for="nombre"><?php echo $usuario->getContrasena();?></label></td>
		<td width="25%"><label for="nombre"><?php echo $usuario->getNombre();?></label></td>
		<td width="25%"><label for="nombre"><?php echo $usuario->getEmail();?></label></td>
		<td width="25%"><label for="nombre"><?php echo $usuario->getTelefono();?></label></td>
        <td width="25%"><label for="nombre"><?php echo $usuario->getHabilitado();?></label></td>
    </tr>
	<?php endforeach;?>
</table>
