<?php
include_once '../php/dao/daoConnection.php';
include_once '../php/dao/applicationDAO.php';
include_once '../php/entities/application.php';

$aDAO = new applicationDAO();

$id = $_POST['id'];
$variable = $_POST['variable'];
$valor = $_POST['valor'];

$a = new Application();
$a->setId($id);
$a->setVariable($variable);
$a->setValor($valor);
$aDAO->update($a);