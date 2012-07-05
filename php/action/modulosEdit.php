<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */

session_start();


include '../dao/daoConnection.php';
include '../dao/modulosDAO.php';
include '../entities/modulos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);
$modulo_raiz = $_POST['modulo_raiz'];

if($nombre == "" || $modulo_raiz == 0){
header("Location: ../../modulos/modulos_editar.php?id=$id&er1");
exit;
}

$nombre = accents2HTML($nombre);

$modulosDAO = new modulosDAO();
$modulos = $modulosDAO->getById($id);
$modulos->setNombre($nombre);
$modulos->setIdMenuRaiz($modulo_raiz);
$modulosDAO->update($modulos);

header("Location: ../../modulos/lista.php?ok");
exit;

?>
