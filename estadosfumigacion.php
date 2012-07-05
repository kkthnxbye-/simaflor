<?php

class estadosfumigacion {

    private $id;
    private $nombre;

    function __construct() {
        $this->id = 0;
        $this->nombre = 'null';
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

}

?>