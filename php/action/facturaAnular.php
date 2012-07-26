<?php

session_start();
date_default_timezone_set("America/Bogota");

/* @Autor Brayan Acebo
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include '../dao/daoConnection.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';


include '../dao/revisionesDAO.php';
include '../entities/revisiones.php';



$revisionesDAO = new RevisionesDAO();
$revisiones = new Revisiones();


foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$cont = 1;

for ($i = 1; $i <= $canTotal; $i++) {

    
    
    
    $revisiones->setId($_POST["id{$i}"]);
    $revisiones->setCantidad($_POST["cant{$i}"]);
    $revisiones->setIdOperario($_POST["idOperario{$i}"]);
    $revisiones->setEstaBueno($_POST["estado{$i}"]);
    $revisiones->setIdCausaNacional($_POST["idCausaNacional{$i}"]);
    $revisiones->setDesechado($_POST["desechado{$i}"]);
    $revisiones->setHabilitado($_POST["habilitado{$i}"]);
    
    $revisionesDAO->update($revisiones);
    
    
    if(!$revisionesDAO->update($revisiones)){$cont++;}
    
}

if($cont == 1){echo "1";}






