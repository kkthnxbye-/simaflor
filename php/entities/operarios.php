<?php


class operarios{

    private $id;
    private $idGrupoOperarios;
    private $codigo;
    private $nombre;
    private $foto;
    private $habilitado;


    function __construct(){
        $this->id = 0;
        $this->idGrupoOperarios = 'null';
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



    function setIdGrupoOperarios($idGrupoOperarios){
        $this->idGrupoOperarios = $idGrupoOperarios;
    }

        function getIdGrupoOperarios(){
            return $this->idGrupoOperarios;
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