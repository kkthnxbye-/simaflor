<?php session_start();
if (!empty($_SESSION['user'])){
header("Location: index/index2.php");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SIMAFLOR</title>
	
	<link rel="stylesheet" href="./css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="./css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="./css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" href="./css/login.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<style type="text/css">
    .EstiloRed {
	font-size: 12px;
	color: #df0101;
	font-family: Arial, Helvetica, sans-serif;}
</style>

</head>

<body >



<div id="login">
	
	
	
<div id="login-body" class="clearfix"> 

    <img src="../images/logo.png" width="320" height="95" alt="logo.png"/>

	         
	<form action="php/action/loginUser.php" name="login" id="login_form" method="post">
		
		
	                    <div class="content_front">

	        <div class="pad">
	        	<?php if( isset($_GET['error1']) ) {?>
<div class="field EstiloRed">
					Debe ingresar todos los datos					
				</div>	
<?php }?>      
<?php if( isset($_GET['error2']) ) {?>
<div class="field EstiloRed">
					Ususario Y/O Clave err&oacute;nea o el usuario está desactivado					
				</div>	
<?php }?>        	

<div class="field">
					<label>Usuario:</label>
					
					<div class=""><span class="input"><input name="username" id="username" class="text" type="text" value="" /></span></div>
				</div> <!-- .field -->
				
				<div class="field">
					<label>Contrase&ntilde;a:</label>

					
					<div class=""><span class="input"><input name="password" id="password" class="text" type="password" value="" /> 
						</span></div>
				</div> <!-- .field -->
				
				<div class="checkbox">
					<span class="label">&nbsp;</span>
					
					
				</div> <!-- .field -->

				
				<div class="field">
					<span class="label">&nbsp;</span>
					
					<div class=""><button type="submit" class="btn btn-grey">Aceptar</button></div>
				</div> <!-- .field -->
		

	        </div>
	    </div>

		
	</form>

</div>

</div> <!-- #login -->


</body>

</html>