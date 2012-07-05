<?php


class grados{

    private $id;
    private $idProceso;
    private $idProducto;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $habilitado;


    function __construct(){
        $this->id = 0;
        $this->idProceso = 'null';
        $this->idProducto = 'null';
        $this->codigo = '';
        $this->nombre = 'null';
        $this->descripcion = '';
        $this->habilitado = '';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }



    function setIdProceso($idProceso){
        $this->idProceso = $idProceso;
    }

        function getIdProceso(){
            return $this->idProceso;
        }

    function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

        function getIdProducto(){
            return $this->idProducto;
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

    function setHabilitado($habilitado){
        $this->habilitado = $habilitado;
    }

        function getHabilitado(){
            return $this->habilitado;
        }
}
?>