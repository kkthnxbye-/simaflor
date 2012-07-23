<?php
include '../php/dao/daoConnection.php';

include '../php/dao/movimientosInventarioDAO.php';
include '../php/entities/movimientosInventarioPM.php';

$dao = new MovimientosInventarioDAO();

if($dao->delete($_GET['id'])){
   header('location: salida.php?ok');
}else{
   header('location: salida.php?er3');
}