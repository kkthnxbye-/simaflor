<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/configuracionproveedoresxfincapmDAO.php';
include '../entities/configuracionproveedoresxfincapm.php';
include '../dao/empresasDAO.php';
include '../entities/empresas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$configuracionDAO = new configuracionproveedoresxfincapmDAO();
$configuracion = new configuracionproveedoresxfincapm();
$empresasDAO = new empresasDAO();
$empresas = new empresas();

$options = "<option selected value='0'>Seleccione</option>";


$configuracion = $configuracionDAO->getsbyAll($_POST['IDProducto'], $_POST['IDMaterialVegetal'], $_POST['IDFincaCliente'], $_POST['IDFincaProveedor']);

foreach ($configuracion as $l_) {
    $empresas = $empresasDAO->getById($l_->getFincaProduccion());
    $options.="<option value='" . $empresas->getId() . "'>" . $empresas->getNombre() . "</option>";
}
echo $options;




