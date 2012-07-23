<?php

class DetalleFacturaPM {

    private $id;
    private $idFactura;
    private $idVariedad;
    private $cantidadSalida;
    private $cantidadFacturada;
    private $idTemporada;
    private $noCamas;
    private $precioUnidadUSD;

    function __construct() {
        $this->id = 0;
        $this->idFactura = 0;
        $this->idVariedad = 0;
        $this->cantidadSalida = 0;
        $this->cantidadFacturada = 0;
        $this->idTemporada = 0;
        $this->noCamas = 0;
        $this->precioUnidadUSD = 0;
    }

    //GET'S & SET'S
    function setPrecioUnidadUSD($precioUnidadUSD) {
        $this->precioUnidadUSD = $precioUnidadUSD;
    }

    function getPrecioUnidadUSD() {
        return $this->precioUnidadUSD;
    }
    
    function setNoCamas($noCamas) {
        $this->noCamas = $noCamas;
    }

    function getNoCamas() {
        return $this->noCamas;
    }
    
    function setIdTemporada($idTemporada) {
        $this->idTemporada = $idTemporada;
    }

    function getidTemporada() {
        return $this->idTemporada;
    }
    
    function setCantidadFacturada($cantidadFacturada) {
        $this->cantidadFacturada = $cantidadFacturada;
    }

    function getCantidadFacturada() {
        return $this->cantidadFacturada;
    }
    
    function setCantidadSalida($cantidadSalida) {
        $this->cantidadSalida = $cantidadSalida;
    }

    function getCantidadSalida() {
        return $this->cantidadSalida;
    }
    
    function setIdVariedad($idVariedad) {
        $this->idVariedad = $idVariedad;
    }

    function getIdVariedad() {
        return $this->idVariedad;
    }
    
    function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

    function getIdFactura() {
        return $this->idFactura;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

}

?>