<?php
include '../php/dao/daoConnection.php';

include '../php/dao/movimientosInventarioDAO.php';
include '../php/entities/movimientosInventarioPM.php';

$dao = new MovimientosInventarioDAO();

$dao->update('habilitado',0,$_POST['id']);