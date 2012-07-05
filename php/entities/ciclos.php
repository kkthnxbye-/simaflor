<?php


class ciclos{

    private $id;
    private $nombre;
	private $descripcion;


    function __construct(){
        $this->id = 0;
        $this->nombre = 'null';
        $this->descripcion = 'null';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
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

}
?>