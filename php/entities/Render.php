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
    		$this->items = $items;
    	}

    	function getItems(){
    		return $this->items;
    	}	

    	// Setters & Getters for Type
    	function setType($type){
    		$this->type = $type;
    	}

    	function getType(){
    		return $this->type;
    	}
		
		function test(){
    		print "Testing render";
    	}

	}
	
	// Basic Building
	class Build{		
	
		// Attributes
		private $type;
		
		// Constructor 
		function __construct(){
		    $type = null;
    	}

    	// Methods
    	function get_Column($field_value, $field_label, $table){

    		// Generic object
    		$generic_column = new Generic();
			
    		// Populate object
    		$neo_connection = new DAO;
			$generic_column = $neo_connection->get_Column($field_value, $field_label, $table);

			return $generic_column;
    	}
    	
    	function theme_Dropdown($label, $id_and_name, $generic_column, $select_value){
    		// Debugg
    		// print_r($generic_column);			
			
			// Getting items
			$items = array();
			$items = $generic_column->getItems();
			
			// Dropdown markup
			?>
				<div class="field">
					<label for="<?php print $id_and_name; ?>"><?php print $label; ?></label>					
					<select id="<?php print $id_and_name; ?>" name="<?php print $id_and_name; ?>" class="medium">
                                 <option value="0">Seleccione</option>   
						<?php		
							foreach($items as $item){
								if(!empty($item)){
									?><option value="<?php print $item[0]; ?>" <?php if(!empty($select_value)){if($item[0] == $select_value){ print 'selected="selected"';}} ?> <?php print "x".$select_value; ?>><?php print $item[1];?></option><?php
								}
							}
						?>
					</select>
				</div>	
			<?php			
    	}
		
		/* 
			Builds a dropdown:
			
			$field_value: Field in table that has the respective option value
			$field_value: Field in table that has the respective option label
			$table: Name of the table from the Database
			$label: Name to in the label of the dropdown input
			$id_and_name: Parameter used as name, id and for attribute of the Label and Input Tag's
		*/
		
		function dropdown($field_value, $field_label, $table, $label, $id_and_name, $select_value){			
			
			// Generic object
			$generic_column = new Generic(); 		
			
			// Gets logical data
			$generic_column = $this->get_Column($field_value, $field_label, $table);			
			
			// Prints markup with data			
			$this->theme_Dropdown($label, $id_and_name, $generic_column, $select_value);
			
    	}
	}
?>