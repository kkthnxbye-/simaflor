<?php
	/* @Author Alexander */	
	class metricas{
	
		// Atributos
		private $id;		
		private $nombre;		
		private $habilitado;
		
		// Constructor
		function __construct(){
			$this->id = 0;
		}

		// ID Setter & Getters   
		function setId($id){
			$this->id = $id;
		}

		function getId(){
			return $this->id;
		}
		
    // NOMBRE Setter & Getters	
		function setNombre($nombre){
			$this->nombre = $nombre;
		}

		function getNombre(){
			return $this->nombre;
		}
			
    // HABILITADO Setter & Getters			
		function setHabilitado($habilitado){
			$this->habilitado = $habilitado;
		}

		function getHabilitado(){
			return $this->habilitado;
		}
	}	
?>