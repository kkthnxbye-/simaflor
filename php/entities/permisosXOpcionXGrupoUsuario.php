<?php


class permisosXOpcionXGrupoUsuario{

    private $id;
    private $idGrupoUsuario;
    private $idOpcion;
    private $permiteConsultar;
    private $permiteModificar;


    function __construct(){
        $this->id = 0;
        $this->idGrupoUsuario= '';
        $this->idOpcion = 'null';
        $this->permiteConsultar = '';
        $this->permiteModificar = '';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }


    function setIdGrupoUsuario($idGrupoUsuario){
        $this->idGrupoUsuario = $idGrupoUsuario;
    }

        function getIdGrupoUsuario(){
            return $this->idGrupoUsuario;
        }

    function setIdOpcion($idOpcion){
        $this->idOpcion = $idOpcion;
    }

        function getIdOpcion(){
            return $this->idOpcion;
        }

    function setPermiteConsultar($permiteConsultar){
        $this->permiteConsultar = $permiteConsultar;
    }

        function getPermiteConsultar(){
            return $this->permiteConsultar;
        }

    function setPermiteModificar($permiteModificar){
        $this->permiteModificar = $permiteModificar;
    }

        function getPermiteModificar(){
            return $this->permiteModificar;
        }
}
?>