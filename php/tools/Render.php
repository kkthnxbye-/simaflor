<?php
	
	// Basic  Object
	class Generic{
		
		// Attributes
		private $type;
		private $items;
		
		// Constructor 
		function __construct(){
		    $type = null;
		    $items = array();
    	}

    	// Setters & Getters for Items
    	function setItems($items){
    		this->items = $items;
    	}

    	function getItems(){
    		return this->items;
    	}	

    	// Setters & Getters for Type
    	function setType($type){
    		this->type = $type;
    	}

    	function getType(){
    		return this->type;
    	}
		
		// Methods
		
		function test(){
			print "Testing includes";
		}
	}
	
	// Basic Building
	class Build{		

		// Constructor 
		function __construct(){
		    $type = null;
    	}

    	// Methods
    	function get_Column($field_Value, $field_label, $table){

    		// Generic object
    		$generic_column = new $Generic;
    		
			// Populate object
    		$neo_connection = new DAO;
			$items = $neo_connection->getColumn($field_Value, $field_label, $table);

			return $generic_column->setItems($items);
    	}
    	
    	function theme_Dropdown($generic_column, $default){

    		// Show values
    		print_r($generic_column);

    	}
	}
?>