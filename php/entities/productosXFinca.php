<?php


class productosXFinca{

    private $id;
    private $idFinca;
    private $idProducto;


    function __construct(){
        $this->id = 0;
        $this->idFinca = 'null';
        $this->idProducto = 'null';
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

        function getIdFinca(){
            return $this->idFinca;
        }

    function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

        function getIdProducto(){
            return $this->idProducto;
        }
}
?>