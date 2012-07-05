<?php


class materialesVegetales{

    private $id;
    private $idTipoMaterialVegetal;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $habilitado;


    function __construct(){
        $this->id = 0;
        $this->idTipoMaterialVegetal = 0;
        $this->codigo = 'null';
        $this->nombre = 'null';
        $this->descripcion = 'null';
        $this->habilitado = 'null';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }

    function setIdTipoMaterialVegetal($idTipoMaterialVegetal){
        $this->idTipoMaterialVegetal = $idTipoMaterialVegetal;
    }

        function getIdTipoMaterialVegetal(){
            return $this->idTipoMaterialVegetal;
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