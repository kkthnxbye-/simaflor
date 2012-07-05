<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposUnidadesPM{
        
    private $id;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $habilitado;
    
    function __construct() {
        $this->id = 0 ;
        $this->codigo = "null" ;
        $this->nombre = "null" ;
        $this->descripcion = "null" ;
        $this->habilitado = 0 ;
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
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

    public function getHabilitado() {
        return $this->habilitado;
    }

    public function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }


}
?>
