<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/VariedadesDAO.php';
include '../entities/Variedades.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../Variedades/VariedadesEdit.php";

$id = $_POST['id'];
$IDProducto = $_POST['IDProducto'];
$IDColor = $_POST['IDColor'];
$codigo = accents2HTML($_POST['codigo']);
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);
$habilitado = $_POST['habilitado'];
$foto = $_POST['foto'];

if ($IDProducto == "0" || $IDColor == "0" || $codigo == "" || $nombre == "") {
    header($location . "?id=$id&p=$IDProducto&co=$IDColor&c=$codigo&n=$nombre&d=$descripcion&h=$habilitado&er1");
    exit;
}

$VariedadesDAO = new VariedadesDAO();
$variedades = new Variedades;
$variedades2 = new Variedades;

$variedades2 = $VariedadesDAO->getByCodigo($codigo);

if ($variedades2 != null) {
    if ($variedades2->getId() != $id) {
        header($location . "?id=$id&p=$IDProducto&co=$IDColor&n=$nombre&d=$descripcion&h=$habilitado&er2");
        exit;
    }
}



$variedades = $VariedadesDAO->getById($id);
$variedades->setId($id);
$variedades->setIdProducto($IDProducto);
$variedades->setIdColor($IDColor);
$variedades->setCodigo($codigo);
$variedades->setNombre($nombre);
$variedades->setDescripcion($descripcion);

if ($habilitado == "on") {
    $variedades->setHabilitado(1);
} else {
    $variedades->setHabilitado(0);
}

if ($_FILES['imagen']['name'] != "") {
    @unlink("../../Variedades/img/".$foto);
    $img = $id . "_" . $_FILES['imagen']['name'];
    $destino = "../../Variedades/img/" . $img;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    $variedades->setFoto($img);
}

$VariedadesDAO->update($variedades);
header("Location: ../../Variedades/VariedadesList.php?ok");
exit;
?>
