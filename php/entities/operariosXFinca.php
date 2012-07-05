<?php


class operariosXFinca{

    private $id;
    private $idFinca;
    private $idOperario;


    function __construct(){
        $this->id = 0;
        $this->idFinca = 'null';
        $this->idOperario = 'null';
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

    function setIdOperario($idOperario){
        $this->idOperario = $idOperario;
    }

        function getIdOperario(){
            return $this->idOperario;
        }
}
?>