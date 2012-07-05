<?php


class laboresPM{

    private $id;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $foto;
    private $habilitado;


    function __construct(){
        $this->id = 0;
        $this->descripcion = 'null';
        $this->codigo = '';
        $this->nombre = 'null';
        $this->foto = '';
        $this->habilitado = '';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }



    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

        function getDescripcion(){
            return $this->descripcion;
        }

    function setCodigo($codigo){
        $this->codigo = $codigo;
    }

        function getCodigo(){
            return $this->codigo;
        }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

        function getNombre(){
            return $this->nombre;
        }

    function setFoto($foto){
        $this->foto = $foto;
    }

        function getFoto(){
            return $this->foto;
        }

    function setHabilitado($habilitado){
        $this->habilitado = $habilitado;
    }

        function getHabilitado(){
            return $this->habilitado;
        }
}
?>