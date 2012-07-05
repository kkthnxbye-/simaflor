<?php


class productos{

    private $id;
    private $idFamilia;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $habilitado;


    function __construct(){
        $this->id = 0;
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

    function setIdFamilia($idFamilia){
        $this->idFamilia = $idFamilia;
    }

        function getIdFamilia(){
            return $this->idFamilia;
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