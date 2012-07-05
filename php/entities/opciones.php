<?php


class opciones{

    private $id;
    private $idModulo;
    private $nombre;
    private $urlMenu;
    private $rutaArchivoAyuda;
    private $validarFinca;
    private $validarRolFinca;


    function __construct(){
        $this->id = 0;
        $this->idModulo = 'null';
        $this->nombre = 'null';
        $this->urlMenu = '';
        $this->rutaArchivoAyuda = 'null';
        $this->validarFinca = '';
        $this->validarRolFinca = '';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }



    function setIdModulo($idModulo){
        $this->idModulo = $idModulo;
    }

        function getIdModulo(){
            return $this->idModulo;
        }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

        function getNombre(){
            return $this->nombre;
        }

    function setUrlMenu($urlMenu){
        $this->urlMenu = $urlMenu;
    }

        function getUrlMenu(){
            return $this->urlMenu;
        }

    function setRutaArchivoAyuda($rutaArchivoAyuda){
        $this->rutaArchivoAyuda = $rutaArchivoAyuda;
    }

        function getRutaArchivoAyuda(){
            return $this->rutaArchivoAyuda;
        }

    function setValidarFinca($validarFinca){
        $this->validarFinca = $validarFinca;
    }

        function getValidarFinca(){
            return $this->validarFinca;
        }

    function setValidarRolFinca($validarRolFinca){
        $this->validarRolFinca = $validarRolFinca;
    }

        function getValidarRolFinca(){
            return $this->validarRolFinca;
        }
}
?>