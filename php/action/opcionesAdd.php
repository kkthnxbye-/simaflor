<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */

session_start();

include '../dao/daoConnection.php';
include '../dao/opcionesDAO.php';
include '../entities/opciones.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$idModulo = $_POST['idModulo'];
$nombre = $_POST['nombre'];
$urlMenu = $_POST['urlMenu'];
$rutaArchivoAyuda = $_POST['rutaArchivoAyuda'];

if($nombre == "" || $urlMenu == "") {
    header("Location: ../../opciones/opciones_crear.php?n=$nombre&u=$urlMenu&r=$rutaArchivoAyuda&er1");
    exit;
}

$opcionesDAO = new opcionesDAO();
$opciones = new opciones;
$opciones->setNombre($nombre);
$opciones->setIdModulo($idModulo);
$opciones->setRutaArchivoAyuda($rutaArchivoAyuda);
$opciones->setUrlMenu($urlMenu);
$opciones->setValidarFinca(1);
$opciones->setValidarRolFinca(1);
$opcionesDAO->save($opciones);

$lastid = $opcionesDAO->getLastId();

if($_FILES['archivo']['name'] != ""){
   $ext = substr(strrchr($_FILES['archivo']['name'], '.'), 1);
   $rutaArchivoAyuda = $lastid.".".$ext;
   $dest = '../../pdf_ayuda/'.$rutaArchivoAyuda;
   copy($_FILES['archivo']['tmp_name'], $dest);
   $opciones->setRutaArchivoAyuda($rutaArchivoAyuda);
   $opcionesDAO->update($opciones);
}

header("Location: ../../opciones/lista.php?ok");
exit;
?>
