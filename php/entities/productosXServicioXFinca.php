<?php


class productosXServicioXFinca{

    private $id;
    private $idFinca;
    private $idServicio;
    private $idMaterialVegetal;
    private $idProducto;


    function __construct(){
        $this->id = 0;
        $this->idFinca= '';
        $this->idServicio = 'null';
        $this->idMaterialVegetal = '';
        $this->idProducto = '';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }


    function setIdFinca($idFinca){
        $this->idFinca = $idFinca;
    }

        function getidFinca(){
            return $this->idFinca;
        }

    function setIdServicio($idServicio){
        $this->idServicio = $idServicio;
    }

        function getIdServicio(){
            return $this->idServicio;
        }

    function setIdMaterialVegetal($idMaterialVegetal){
        $this->idMaterialVegetal = $idMaterialVegetal;
    }

        function getIdMaterialVegetal(){
            return $this->idMaterialVegetal;
        }

    function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

        function getIdProducto(){
            return $this->idProducto;
        }
}
?>