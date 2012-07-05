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

$id = $_POST['id'];
$idModulo = $_POST['idModulo'];
$nombre = accents2HTML($_POST['nombre']);
$urlMenu = $_POST['urlMenu'];
$rutaArchivoAyuda = $_POST['rutaArchivoAyuda'];

if($nombre == "" || $urlMenu == "") {
    header("Location: ../../opciones/opciones_editar.php?id=$id&er1");
    exit;
}



$opcionesDAO = new opcionesDAO();
$opciones = $opcionesDAO->getById($id);
$opciones->setNombre($nombre);
$opciones->setIdModulo($idModulo);
$opciones->setUrlMenu($urlMenu);
$opciones->setValidarFinca(1);
$opciones->setValidarRolFinca(1);
if($_FILES['archivo']['name'] != ""){
   $ext = substr(strrchr($_FILES['archivo']['name'], '.'), 1);
   $rutaArchivoAyuda = $id.".".$ext;
   $dest = '../../pdf_ayuda/'.$rutaArchivoAyuda;
   copy($_FILES['archivo']['tmp_name'], $dest);
   $opciones->setRutaArchivoAyuda($rutaArchivoAyuda);
}
$opcionesDAO->update($opciones);
header("Location: ../../opciones/lista.php?ok");
exit;
?>
