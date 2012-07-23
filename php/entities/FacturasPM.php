<?php

class FacturasPM {

    private $id;
    private $idDocumentosInventarioPM;
    private $formaPago;
    private $observaciones;
    private $facturado;
    private $idUsuario;
    private $fechaRegistro;

    function __construct() {
        $this->id = 0;
        $this->idDocumentosInventarioPM = 0;
        $this->formaPago = 'null';
        $this->observaciones = 'null';
        $this->facturado = 0;
        $this->idUsuario = 0;
        $this->fechaRegistro = 'null';
    }

    //GET'S & SET'S
    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }
    
    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }
    
    function setFacturado($facturado) {
        $this->facturado = $facturado;
    }

    function getFacturado() {
        return $this->facturado;
    }
    
    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function getObservaciones() {
        return $this->observaciones;
    }
    
    function setFormaPago($formaPago) {
        $this->formaPago = $formaPago;
    }

    function getFormaPago() {
        return $this->formaPago;
    }
    
    function setIdDocumentosInventarioPM($idDocumentoInventarioPM) {
        $this->idDocumentosInventarioPM = $idDocumentoInventarioPM;
    }

    function getIdDocumentosInventarioPM() {
        return $this->idDocumentosInventarioPM;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

}

?>