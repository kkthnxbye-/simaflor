<?php


class blancosbiologicos{

    private $id;
    private $codigo;
	private $nombre;
	private $descripcion;
	private $foto;
	private $habilitado;
	
	


    function __construct(){
        $this->id = 0;
        $this->nombre = 'null';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
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