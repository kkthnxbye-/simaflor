<?php require_once '../php/clases.php'; ?>
<style>
	.predictivo{
     	cursor:pointer;
	}
	.predictivo:hover{
		background-color:#CCFF66;
	}
</style>
<?php
$nombre = $_REQUEST['nombre'];
$tipo = $_REQUEST['tipo'];
$empresasDAO = new empresasDAO();

$empresas = $empresasDAO->getsbybuscar("todos","parte",$nombre);
?>
<div>
<?php foreach ($empresas as $empre){
switch($tipo){
case 1:

if ($empre->getEsCliente() > 0){
?>
<div style="width:100%; text-align:left" class="predictivo" onclick="select_cliente(<?php echo $empre->getId();?>,'<?php echo $empre->getNombre()." - ".$empre->getNit()?>');">
<?php echo str_ireplace($nombre,'<b>'.$nombre.'</b>',$empre->getNombre()." - ".$empre->getNit());?>
</div>
<?php }
break;
case 2:

if ($empre->getEsProveedor() > 0){
?>
<div style="width:100%; text-align:left" class="predictivo" onclick="select_proveedor(<?php echo $empre->getId();?>,'<?php echo $empre->getNombre()." - ".$empre->getNit()?>');">
<?php echo str_ireplace($nombre,'<b>'.$nombre.'</b>',$empre->getNombre()." - ".$empre->getNit());?>
</div>
<?php }
break;
}
}?>
</div>