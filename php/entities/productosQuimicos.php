<?php


class productosQuimicos{

    private $id;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $foto;
    private $unidad;
    private $habilitado;


    function __construct(){
        $this->id = 0;
        $this->codigo = 'null';
        $this->nombre = 'null';
        $this->descripcion = '';
        $this->foto = 'null';
        $this->unidad = '';
        $this->habilitado = '';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
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

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

        function getDescripcion(){
            return $this->descripcion;
        }

    function setFoto($foto){
        $this->foto = $foto;
    }

        function getFoto(){
            return $this->foto;
        }

    function setUnidad($unidad){
        $this->unidad = $unidad;
    }

        function getUnidad(){
            return $this->unidad;
        }

    function setHabilitado($habilitado){
        $this->habilitado = $habilitado;
    }

        function getHabilitado(){
            return $this->habilitado;
        }
}
?>