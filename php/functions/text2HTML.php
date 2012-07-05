<?php
if (empty($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}
function accents2HTML($mensaje){
    $mensaje = str_replace("á","&aacute;",$mensaje);
    $mensaje = str_replace("é","&eacute;",$mensaje);
    $mensaje = str_replace("í","&iacute;",$mensaje);
    $mensaje = str_replace("ó","&oacute;",$mensaje);
    $mensaje = str_replace("ú","&uacute;",$mensaje);
    $mensaje = str_replace("ñ","&ntilde;",$mensaje);
    $mensaje = str_replace("¿","&iquest;",$mensaje);

    $mensaje = str_replace("Á","&Aacute;",$mensaje);
    $mensaje = str_replace("É","&Eacute;",$mensaje);
    $mensaje = str_replace("Í","&Iacute;",$mensaje);
    $mensaje = str_replace("Ó","&Oacute;",$mensaje);
    $mensaje = str_replace("Ú","&Uacute;",$mensaje);
    $mensaje = str_replace("Ñ","&Ntilde;",$mensaje);
    return $mensaje;
}



function text2HTML($mensaje){
    $mensaje = str_replace("á","&aacute;",$mensaje);
    $mensaje = str_replace("é","&eacute;",$mensaje);
    $mensaje = str_replace("í","&iacute;",$mensaje);
    $mensaje = str_replace("ó","&oacute;",$mensaje);
    $mensaje = str_replace("ú","&uacute;",$mensaje);
    $mensaje = str_replace("ñ","&ntilde;",$mensaje);
    $mensaje = str_replace("¿","&iquest;",$mensaje);

    $mensaje = str_replace("Á","&Aacute;",$mensaje);
    $mensaje = str_replace("É","&Eacute;",$mensaje);
    $mensaje = str_replace("Í","&Iacute;",$mensaje);
    $mensaje = str_replace("Ó","&Oacute;",$mensaje);
    $mensaje = str_replace("Ú","&Uacute;",$mensaje);
    $mensaje = str_replace("Ñ","&Ntilde;",$mensaje);
    return $mensaje;
}

?>
