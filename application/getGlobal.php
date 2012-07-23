<?php
include_once '../php/dao/daoConnection.php';
include_once '../php/dao/applicationDAO.php';
include_once '../php/entities/application.php';

$aDAO = new applicationDAO();

$id = $_GET['id'];

$a = new Application();
$a = $aDAO->getOne($id);

echo $a->getId()."._/.".$a->getVariable()."._/.".$a->getValor();
