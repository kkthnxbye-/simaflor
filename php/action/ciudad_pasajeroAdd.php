<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/pasajero_ciudadDAO.php';
include '../entities/pasajero_ciudad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$pasajero_ciudadDAO = new pasajero_ciudadDAO();
$pasajero_ciudad = new pasajero_ciudad;
$pasajero_ciudad->setPasajero($pasajero);
$pasajero_ciudad->setCiudad($ciudad);
$pasajero_ciudadDAO->save($pasajero_ciudad);
?>
