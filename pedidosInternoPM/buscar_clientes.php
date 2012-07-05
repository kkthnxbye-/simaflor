<?php require_once '../php/clases.php'; ?>
<style>
	.predictivo{
     	cursor:pointer;
      padding: .4em;
      
	}
	.predictivo:hover{
		background-color:#DEF1B1;
            padding: .4em;
	}
</style>
<?php
$nombre = $_REQUEST['nombre'];
$tipo = $_REQUEST['tipo'];
$empresasDAO = new empresasDAO();

$empresas = $empresasDAO->getsbybuscar("todos","parte",$nombre);
?>
<div>
   <div style="padding: 5px; overflow-x: hidden; overflow-y: auto; height: 140px; background: #F1F1F1;width:337px;">
<?php foreach ($empresas as $empre){
switch($tipo){
case 1:
   
if ($empre->getEsCliente() > 0){
?>
<div style="width:337px; text-align:left" class="predictivo" onclick="select_cliente(<?php echo $empre->getId();?>,'<?php echo $empre->getNombre()." - ".$empre->getNit()?>');">
<?php echo str_ireplace($nombre,'<b>'.$nombre.'</b>',$empre->getNombre()." - ".$empre->getNit());?>
</div>
<?php }
break;
case 2:

if ($empre->getEsProveedor() > 0){
?>
<div style="width:337px; text-align:left" class="predictivo" onclick="select_proveedor(<?php echo $empre->getId();?>,'<?php echo $empre->getNombre()." - ".$empre->getNit()?>');">
<?php echo str_ireplace($nombre,'<b>'.$nombre.'</b>',$empre->getNombre()." - ".$empre->getNit());?>
</div>
<?php }
break;
}
}?>
   </div>
</div>