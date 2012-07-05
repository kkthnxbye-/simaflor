<?php
	/* @Author Alexander */	
	class breeders{
	
		// Atributos
		private $id;
		private $codigo;
		private $nombre;
		private $descripcion;
                private $habilitado;
		
		// Constructor
		function __construct(){
			$this->id = 0;
			$this->codigo = 'null';
                        $this->nombre = 'null';
                        $this->descripcion = 'null';
                        $this->habilitado = 0;
		}

		// Setter & Getters
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
                
                function setHabilitado($habilitado){
			$this->habilitado = $habilitado;
		}

		function getHabilitado(){
			return $this->habilitado;
		}
    
	}	
?>