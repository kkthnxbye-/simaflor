<?php
	/* @Author Alexander */	
	class configuracionxvariedad{
	
		// Atributos
		private $id; // ID
		private $id_variedad; // IDVariedad
		private $id_tipo_conf_variedad; // IDTipoConfiguracionVariedad
		private $valor; // Valor
		
		
		// Constructor
		function __construct(){
			$this->id = 0;			
		}

		// Setter & Getters
		function setId($id){
			$this->id = $id;
		}

		function getId(){
			return $this->id;
		}
		
		function setIdVariedad($id_variedad){
			$this->id_variedad = $id_variedad;
		}

		function getIdVariedad(){
			return $this->id_variedad;
		}
		
		function setIdTipoConfVariedad($id_tipo_conf_variedad){
			$this->id_tipo_conf_variedad = $id_tipo_conf_variedad;
		}

		function getIdTipoConfVariedad(){
			return $this->id_tipo_conf_variedad;
		}

		function setValor($valor){
			$this->valor = $valor;
		}

		function getValor(){
			return $this->valor;
		}		
	}	
?>