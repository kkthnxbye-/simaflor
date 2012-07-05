<?php


class bloquespmxfinca{

    private $id;
    private $idfinca;
	private $codigo;
	private $nombre;
	private $ancho;
	private $largo;
	private $area;
	private $habilitado;
	


    function __construct(){
        $this->id = 0;
        $this->idfinca = 0;
        $this->codigo = 'null';
        $this->nombre = 'null';
        $this->ancho = 0;
        $this->largo = 0;
        $this->area = 0;
        $this->habilitado = 0;
        
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }
		
		function setIdFinca($idfinca){
        $this->idfinca = $idfinca;
    }

        function getIdFinca(){
            return $this->idfinca;
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
		
		function setAncho($ancho){
        $this->ancho = $ancho;
    }

        function getAncho(){
            return $this->ancho;
        }
		function setLargo($largo){
        $this->largo = $largo;
    }

        function getLargo(){
            return $this->largo;
        }
		function setArea($area){
        $this->area = $area;
    }

        function getArea(){
            return $this->area;
        }		
		function setHabilitado($habilitado){
        $this->habilitado = $habilitado;
    }

        function getHabilitado(){
            return $this->habilitado;
        }

}
?>