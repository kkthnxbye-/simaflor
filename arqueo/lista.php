<?php
session_start();
include '../php/dao/daoConnection.php';

include '../php/dao/UsuariosDAO.php';
include '../php/dao/UsuariosXEmpresaDAO.php';

include '../php/entities/UsuariosXEmpresa.php';
include '../php/entities/usuarios.php';

include '../php/dao/empresasDAO.php';
include '../php/entities/empresas.php';

$usuario = new usuarios();
$usuario = unserialize($_SESSION['user']);

$daoUXE = new UsuariosXEmpresaDAO();
$daoE = new empresasDAO();
$empresas = new empresas();

$lista = $daoUXE->getsByUsuario($usuario->getId());

?>
<html>
   <head>
      <link rel="stylesheet" href="styles.css" media="all" />
      <script src="function.js" type="text/javascript"></script>
   </head>
   <body>
      <table>
         <tr>
            <td>Finca Producci&oacute;n <strong>*</strong>:</td>
            <td>
               <select id="finca" name="finca" onchange="return go(this.value)">
                  <option value="">Seleccione</option>
                  <?php foreach($lista as $l): ?>
                  <?php $empresas = $daoE->getById($l->getIdEmpresa()); ?>
                  <?php if($empresas->getEsProveedor() == 1): ?>
                  <option value="<?php echo $empresas->getId(); ?>"><?php echo $empresas->getNombre(); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
               </select>
            </td>
         </tr>
      </table>
   </body>
</html>