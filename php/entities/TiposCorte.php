<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposCorte{
    
    private $id;
    private $idProducto;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $habilitado;
    
    function __construct() {
        $this->id = 0;
        $this->idProducto = 0;
        $this->codigo = 0;
        $this->nombre = "null";
        $this->descripcion = "null";
        $this->habilitado = 0;
        
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
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
