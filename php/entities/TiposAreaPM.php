<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposAreaPM{
    
    private $id;
    private $nombre;
    private $descripcion;
    
    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
?>
