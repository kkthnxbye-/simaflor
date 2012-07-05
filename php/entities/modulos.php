<?php

class modulos {

    private $id;
    private $nombre;
    private $IDmenuraiz;
    private $orden;

    function __construct() {
        $this->id = 0;
        $this->nombre = 'null';
        $this->IDmenuraiz = 0;
        $this->orden = 0;
    }

    //GET'S & SET'S
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdMenuRaiz($Idmenuraiz) {
        $this->IDmenuraiz = $Idmenuraiz;
    }

    function getIdMenuRaiz() {
        return $this->IDmenuraiz;
    }

    function setOrden($orden) {
        $this->orden = $orden;
    }

    function getOrden() {
        return $this->orden;
    }

}

?>