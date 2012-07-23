<?php
session_start();
include '../php/dao/daoConnection.php';
include '../php/entities/usuarios.php';

$usuario = new usuarios();
$usuario = unserialize($_SESSION['user']);

if(!empty($_GET['finca'])){
   $_SESSION['fincaCarga'] = $_GET['finca'];
   $_SESSION['usuarioCarga'] = $usuario->getId();
}else{
   header('Location: lista.php');
}
?>
<html>
   <head>
      <link rel="stylesheet" href="styles.css" media="all" />
      <script src="function.js" type="text/javascript"></script>
   </head>
   <body>
      <form action="procesarDatos.php" method="POST" enctype="multipart/form-data" onsubmit="return goCarga()">
      <table>
         <?php if(isset($_GET['exterr'])): ?>
         <tr>
            <td colspan="2">
               <span>Solo estan permitidos ficheros con extensi&oacute;n .TXT</span>
            </td>
         </tr>
         <?php endif; ?>
         <tr>
            <td>Archivo <span>(*.txt)</span>:</td>
            <td>
               <input type="file" name="file" id="file" />
            </td>
         </tr>
         <tr>
            <td>
               <input class="aslink" type="submit" value="Cargar" name="cargar" />
               <a href="lista.php">Volver</a>
            </td>
         </tr>
      </table>
      </form>
   </body>
</html>