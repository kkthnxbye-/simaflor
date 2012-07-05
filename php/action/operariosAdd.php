<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/operariosDAO.php';
include '../entities/operarios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$idGrupoOperario = $_POST['idGrupoOperario'];

$operariosDAO = new operariosDAO();
$operarios = new operarios;
$id = $operariosDAO->getLastId()+1;

if ($codigo == "" || $nombre == "" || $idGrupoOperario == 0) {
    header("Location: ../../operarios/operarios_crear.php?c=$codigo&n=$nombre&g=$idGrupoOperario&er1");
    exit;
}

if ($operariosDAO->getBycodigo($codigo) != null) {
    header("Location: ../../operarios/operarios_crear.php?n=$nombre&g=$idGrupoOperario&er2");
    exit;
}

if ($_FILES['foto']['name'] != "") {
    $img = $id . "_" . $_FILES['foto']['name'];
    $destino = "../../operarios/img/" . $img;
    move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
    $operarios->setFoto($img);
} else {
    header("Location: ../../operarios/operarios_crear.php?c=$codigo&n=$nombre&g=$idGrupoOperario&er1");
    exit;
}

$operarios->setCodigo($codigo);
$operarios->setNombre($nombre);
$operarios->setHabilitado(1);
$operarios->setIdGrupoOperarios($idGrupoOperario);
$operariosDAO->save($operarios);
header("Location: ../../operarios/lista.php?ok");
exit;
?>
