<?php
session_start();

include '../php/dao/daoConnection.php';

include '../php/dao/empresasDAO.php';
include '../php/entities/empresas.php';

$dao = new empresasDAO();
$lista = $dao->getsbybuscar('nombre','parte',$_POST['word']);

foreach($lista as $l):?>
<div class="finca_encontrada" onclick="setId(<?php echo $l->getId(); ?>,'<?php echo $l->getNombre(); ?>');">
   <?php echo $l->getNombre()." / ".$l->getNit(); ?>
</div>
<?php endforeach; ?> 