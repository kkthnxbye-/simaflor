<?php
session_start();
?>
<html>
   <head>
      <link rel="stylesheet" href="styles.css" media="all" />
      <script src="function.js" type="text/javascript"></script>
   </head>
   <body>
      <form action="../php/action/loginUser.php" method="POST" onsubmit="return validar()">
      <table>
         <tr>
            <td>Usuario <strong>*</strong>:</td>
            <td><input type="text" name="username" id="user" /></td>
         </tr>
         <tr>
            <td>Clave <strong>*</strong>:</td>
            <td><input type="password" name="password" id="pass" /></td>
         </tr>
         <tr>
            <td colspan="2" align="center">
               <input class="aslink" type="submit" name="log" value="Ingresar" />
               <input type="hidden" name="arqueo" value="yes" />
            </td>
         </tr>
      </table>
      </form>
   </body>
</html>