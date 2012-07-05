<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposMaterialVegetal{
    
    private $id;
    private $nombre;
    
    function __construct() {
        $this->id = 0;
        $this->nombre = 'null';
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


}
?>
