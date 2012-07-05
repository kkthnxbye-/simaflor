<?php
	/* @Author Alexander */	
	class configuracionproveedoresxfincapm{
	
		// Atributos
		private $id; // ID
		private $id_producto; // IDProducto
		private $id_material_vegetal; // IDMaterialVegetal
		private $id_finca_cliente; // Valor // IDFincaCliente
		private $id_finca_proveedor; // IDFincaProveedor
		private $id_finca_produccion; // IDFincaProduccion		
		
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
		
		function setIdProducto($id_producto){
			$this->id_producto = $id_producto;
		}

		function getIdProducto(){
			return $this->id_producto;
		}
		
		function setIdMaterialVegetal($id_material_vegetal){
			$this->id_material_vegetal = $id_material_vegetal;
		}

		function getIdMaterialVegetal(){
			return $this->id_material_vegetal;
		}

		function setFincaCliente($id_finca_cliente){
			$this->id_finca_cliente = $id_finca_cliente;
		}

		function getFincaCliente(){
			return $this->id_finca_cliente;
		}	

		/****/
		function setFincaProveedor($id_finca_proveedor){
			$this->id_finca_proveedor = $id_finca_proveedor;
		}

		function getFincaProveedor(){
			return $this->id_finca_proveedor;
		}
		
		/***/
		function setFincaProduccion($id_finca_produccion){
			$this->id_finca_produccion = $id_finca_produccion;
		}

		function getFincaProduccion(){
			return $this->id_finca_produccion;
		}

	}	
?>