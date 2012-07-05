<?php


class DAO {


	/* variables de conexi�n */


	var $BaseDatos;


	var $Servidor;


	var $Usuario;


	var $Clave;


	var $ObjetoConsulta;


	var $ObjetoConsulta2;





	/* identificador de conexi�n y consulta */


	var $Conexion_ID = 0;


	var $Consulta_ID = 0;





	/* numero de error y texto error */


	var $Errno = 0;


	var $Error = "";








	function DB_mysql() {


	}





	/*Conexi�n a la base de datos*/


	function conectar(){





	


//            $this->BaseDatos = "533638_simaflor";
//		$this->Servidor = "mssql0818.wc2";
//		$this->Usuario = "533638_simaflor";
//		$this->Clave = "Simaflor123";
            
            //Prueba
            
            $this->BaseDatos = "533638_prueba";
		$this->Servidor = "mssql0813.wc2";
		$this->Usuario = "533638_sa1";
		$this->Clave = "Prueba12345";


/*


		$this->BaseDatos = "conifor_teca";


		$this->Servidor = "localhost";


		$this->Usuario = "conifor";


		$this->Clave = "DL)i([1WH)9";


	








		$this->BaseDatos = "elecci20_teca";


		$this->Servidor = "localhost";


		$this->Usuario = "elecci20";


		$this->Clave = "8JdCro2Z(1@&";


*/


		// Conectamos al servidor


		$this->Conexion_ID = mssql_connect($this->Servidor, $this->Usuario, $this->Clave);


		if (!$this->Conexion_ID) {


			$this->Error = "Ha fallado la conexion.";


                        echo $this->Error;


			return 0;


		}


		//seleccionamos la base de datos


		if (!mssql_select_db($this->BaseDatos, $this->Conexion_ID)) {


		$this->Error = "Imposible abrir ".$this->BaseDatos ;


		return 0;


		}





		return $this->Conexion_ID;


	}





	/* Ejecuta un consulta */	

	function consulta($sql = ""){


		if ($sql == "") {


			$this->Error = "No ha especificado una consulta SQL";


			return 0;


		}


		//ejecutamos la consulta


		$this->Consulta_ID = mssql_query($sql, $this->Conexion_ID);


		if (!$this->Consulta_ID) {


			
                        return "er";

		}


		return $this->Consulta_ID;


	}





	function leerVarios() {


		$j=0;


		while ($this->ObjetoConsulta2[$j] = @mssql_fetch_row($this->Consulta_ID)) {


			$j++;


		}


	}





	function numcampos() {


		return mssql_num_fields($this->Consulta_ID);


	}





	function numregistros(){


		return @mssql_num_rows($this->Consulta_ID);


	}





	function nombrecampo($numcampo) {


		return mssql_field_name($this->Consulta_ID, $numcampo);


	}
		
	function get_Column($field_value, $field_label, $table){
		
		// SQL Statement
		$sql = "SELECT $field_value, $field_label FROM $table;";
		
		// Query
		$result = @mssql_query($sql);
		
		// Items
		while($rows[] = @mssql_fetch_row($result)){};
		
		// Generic object
		$generic_column = new Generic();	
		
		// Setting Items
		$generic_column->setItems($rows);
		
		return $generic_column;
	}
}





?>