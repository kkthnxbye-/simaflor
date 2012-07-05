<?php session_start();

include '../dao/daoConnection.php';
include '../dao/TiposMaterialVegetalDAO.php';
include '../entities/TiposMaterialVegetal.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$location = "Location: ../../TiposMaterialVegetal/TiposMaterialVegetalList.php";

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$nombre = accents2HTML($_POST['nombre']);

// Valida los no nulos.
if ($nombre != '') {
    $TiposMaterialVegetal = new TiposMaterialVegetal();
    $TiposMaterialVegetalDAO = new TiposMaterialVegetalDAO();
    $TiposMaterialVegetal->setNombre($nombre);

    $TiposMaterialVegetalDAO->save($TiposMaterialVegetal);

    header($location . '?ok');
    exit;
} else {
    $location = "Location: ../../TiposMaterialVegetal/TiposMaterialVegetalAdd.php";
    header($location . "?er1");
    exit;
}
?>
