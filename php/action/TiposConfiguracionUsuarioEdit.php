<?php session_start();

include '../dao/daoConnection.php';
include '../dao/TiposConfiguracionUsuarioDAO.php';
include '../entities/TiposConfiguracionUsuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

$location = "Location: ../../TiposConfiguracionUsuario/TiposConfiguracionUsuarioEdit.php";

if($codigo == "" || $nombre == ""){
    header($location . "?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
$TiposConfiguracionUsuario2 = new TiposConfiguracionUsuario();
$TiposConfiguracionUsuarioDAO = new TiposConfiguracionUsuarioDAO();

$TiposConfiguracionUsuario2 = $TiposConfiguracionUsuarioDAO->getByCodigo($codigo);


if ($TiposConfiguracionUsuario2 != null) {
    if($TiposConfiguracionUsuario2->getId() != $id){
    header($location . "?id=$id&n=$nombre&d=$descripcion&er2");
    exit;
    }
}

$TiposConfiguracionUsuario = $TiposConfiguracionUsuarioDAO->getById($id);
    
    $TiposConfiguracionUsuario->setId($id);
    $TiposConfiguracionUsuario->setCodigo($codigo);
    $TiposConfiguracionUsuario->setNombre($nombre);
    $TiposConfiguracionUsuario->setDescripcion($descripcion);
    $TiposConfiguracionUsuario->setHabilitado(1);

    $TiposConfiguracionUsuarioDAO->update($TiposConfiguracionUsuario);
    
    $location = "Location: ../../TiposConfiguracionUsuario/TiposConfiguracionUsuarioList.php";
    header($location . '?ok');
    exit;

header($location);
exit;
?>