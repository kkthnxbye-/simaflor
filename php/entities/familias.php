<?php

class familias {

    private $id;
    private $codigo;
    private $nombre;
    private $descripcion;

    function __construct() {
        $this->id = 0;
        $this->codigo = 'null';
        $this->nombre = 'null';
        $this->descripcion = 'null';
    }

    //GET'S & SET'S
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

}

?>