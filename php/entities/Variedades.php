<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Variedades{
    
    private $id;
    private $idProducto;
    private $idBreeder;
    private $idColor;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $foto;
    private $habilitado;
    
    function __construct() {
        $this->id = 0;
        $this->idProducto = 0;
        $this->idBreeder = 0;
        $this->idColor = 0;
        $this->codigo = "null";
        $this->nombre = "null";
        $this->descripcion = "null";
        $this->foto = "null";
        $this->habilitado = "null";
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    /////////////
    public function getIdBreeder() {
        return $this->idBreeder;
    }

    public function setIdBreeder($idBreeder) {
        $this->idBreeder = $idBreeder;
    }
    /////////////
    
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getIdColor() {
        return $this->idColor;
    }

    public function setIdColor($idColor) {
        $this->idColor = $idColor;
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

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getHabilitado() {
        return $this->habilitado;
    }

    public function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }


}
?>
