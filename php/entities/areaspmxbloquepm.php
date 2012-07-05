<?php
	/* @Author Brayan Acebo */	
	class areaspmxbloquepm{
	
		// Atributos
		private $id;
		private $id_bloque;
		private $id_tipo_area;
		private $codigo;
		private $nombre;
		private $capacidad;
		private $area_cultivo;
		private $area_camino;
		private $habilitado;
		
		// Constructor
		function __construct(){
			$this->id = 0;
			$this->id_bloque = 0;
                        $this->id_tipo_area = 0;
                        $this->codigo = 'null';
                        $this->nombre = 'null';
                        $this->capacidad = 0;
                        $this->area_cultivo = 0;
                        $this->area_camino = 0;
                        $this->habilitado = 0;
		}

		// Setter & Getters
		function setId($id){
			$this->id = $id;
		}

		function getId(){
			return $this->id;
		}
		
		function setIdBloque($id_bloque){
			$this->id_bloque = $id_bloque;
		}

		function getIdBloque(){
			return $this->id_bloque;
		}
		
		function setIdTipoArea($id_tipo_area){
			$this->id_tipo_area = $id_tipo_area;
		}

		function getIdTipoArea(){
			return $this->id_tipo_area;
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
			
		function setCapacidad($capacidad){
			$this->capacidad = $capacidad;
		}

		function getCapacidad(){
			return $this->capacidad;
		}
			
		function setAreaCultivo($area_cultivo){
			$this->area_cultivo = $area_cultivo;
		}

		function getAreaCultivo(){
			return $this->area_cultivo;
		}
		
		function setAreaCamino($area_camino){
			$this->area_camino = $area_camino;
		}

		function getAreaCamino(){
			return $this->area_camino;
		}
			
		function setHabilitado($habilitado){
			$this->habilitado = $habilitado;
		}

		function getHabilitado(){
			return $this->habilitado;
		}
	}	
?>