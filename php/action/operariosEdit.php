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

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$foto = $_POST['pic'];
$idGrupoOperario = $_POST['idGrupoOperario'];

if ($codigo == "" || $nombre == "" || $idGrupoOperario == 0) {
    header("Location: ../../operarios/operarios_editar.php?id=$id&er1");
    exit;
}

$operariosDAO = new operariosDAO();
$operarios = new operarios();
$operarios2 = new operarios();
$operarios2 = $operariosDAO->getByCodigo($codigo);
$operarios = $operariosDAO->getById($id);

if ($operarios2 != null) {
    if($operarios2->getId() != $id){
    header("Location: ../../operarios/operarios_editar.php?id=$id&er2");
    exit;
    }
}

if ($_FILES['foto']['name'] != "") {
    @unlink("../../operarios/img/".$foto);
    $img = $id . "_" . $_FILES['foto']['name'];
    $destino = "../../operarios/img/" . $img;
    move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
    $operarios->setFoto($img);
}

$operarios->setIdGrupoOperarios($idGrupoOperario);
$operarios->setCodigo($codigo);
$operarios->setNombre($nombre);
$operarios->setHabilitado(1);
$operariosDAO->update($operarios);
header("Location: ../../operarios/lista.php?ok");
exit;
?>
