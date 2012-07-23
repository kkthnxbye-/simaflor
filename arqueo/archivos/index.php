<?php session_start();?>
<?php

if( isset($_SESSION['admin']) ){
    header("location: menuAdmin.php");
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrador de Contenidos :: Versi&oacute;n 7.7</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/smoothness/jquery-ui-1.7.1.custom.css" rel="stylesheet" />
<script src="jquery/menu.js" type="text/javascript"></script>
<script src="jquery/jquery-1.2.6.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="jquery/jquery.metadata.js"></script>
<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
<![endif]-->
<link rel="stylesheet" href="css/jqtransform2.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/demo_jqtransform.css" type="text/css" media="all" />
<script type="text/javascript" src="jquery/jquery.jqtransform.min.js" ></script>
<script type="text/javascript">

$(document).ready(function() {
	  initMenu();
	  //$("#mensaje2").hide();
	  $("#load1").hide();
	  $(function(){
			$('form').jqTransform({imgPath:'imagenes/forms/'});
		});
});

</script>
<style type="text/css">
    .EstiloRed {
	font-size: 12px;
	color: #df0101;
	font-family: Arial, Helvetica, sans-serif;}
</style>
</head>

<body id="ingresar">
<div class="cabezote">
  <div class="cabezote_interior">
      <div class="cabezote_logo_empresa"><img src="../images/logoego.png?<?php echo time()?>"  height="80" /></div>
      <div class="cabezote_logo_imaginamos"></div>
  </div>
</div>
<div class="marco">
<div class="version">Versi&oacute;n 7.7.</div>
   	  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="809" valign="top">
          <div id="content_index">
              <div class="titulos">
                <br /><br /><br />
                <div class="titulos_texto2">&nbsp;&nbsp;&nbsp;&nbsp;Ingreso al sistema</div>
              </div>
            <!-- FIN TITULOS -->
            <div class="contenido_fondo_index">
                <div class="subcontenido">
                  <div class="subcontenido2">
                    <form action="../php/action/loginAdmin.php"  method="post" name="form_login" class="jqtransform" id="form_login">
                    <fieldset style="display:none;">
                        <input type="hidden" name="_method" value="POST" />
                      </fieldset>
                      <div class="rowElem">
                        <label>E-Mail </label>
                        <input name="usuario" type="text" id="userName" value="" size="40"/>
                      </div>
                      <div class="rowElem">
                        <label>Contrase&ntilde;a </label>
                        <input name="pass" type="password" id="userPass1" size="40" />
                      </div>
                        <?php if( isset($_GET['error1']) )echo "<label><div class='EstiloRed'>Tienes que introducir todos los datos</div></label>"; ?>
                        <?php if( isset($_GET['error2']) ) echo "<label><div class='EstiloRed'>Datos incorrectos</div></label>"; ?>
                      <div class="rowElem">
                        <input type="hidden" value="admin" name="page" />
                        <input type="submit" value="Ingresar" id="ingresar" />
                      </div>
                    </form>
                    <div id="load1"><img src="imagenes/contenido/ajax-loader5.gif" /></div>

                  </div>
                  <!-- FIN SUBCONTENIDO2 -->
                </div>
              <!-- FIN SUBCONTENIDO -->
            </div>
            <!-- FIN CONTENIDO FONDO -->
              <div class="contenido_marco_inf_index"></div>
          </div>
              <!-- FIN CONTENT -->          </td>
        </tr>
      </table>
   	  <?php include("pie.php"); ?>
</div>
</body>
</html>
