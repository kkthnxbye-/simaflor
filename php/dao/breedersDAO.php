<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */

 // Clase dao
class breedersDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newBreeders) {


        $querty = "insert into Breeders
                    (Codigo, Nombre, Descripcion,Habilitado) values (					
					\"" . $newBreeders->getCodigo() . "\",
					\"" . $newBreeders->getNombre() . "\",
					\"" . $newBreeders->getDescripcion() . "\",
                              \"1\"
					)";	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from Breeders';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
		return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from Breeders WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Breeders = new breeders();
        $Breeders->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Breeders->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Breeders->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Breeders->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
       
        return $Breeders;
    }

    function getById($id) {

        $sql = 'SELECT ID, Codigo, Nombre, Descripcion from Breeders WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0){
            return null;
        }

        $i = 0;
        $j = 0;
		
        $Breeders = new breeders();
        $Breeders->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Breeders->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Breeders->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Breeders->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
       
        return $Breeders;
    }

    function gets() {

        $sql = 'SELECT ID, Codigo, Nombre, Descripcion from Breeders';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
			
          $Breeders = new breeders();
          $Breeders->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
          $Breeders->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
          $Breeders->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
          $Breeders->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
          
          $lista[$i] = $Breeders;
        }
        
        return $lista;
    }
	
	function getsbybuscar($bloque,$campo,$tipob,$valor){
	$sql = 'SELECT ID, Codigo, Nombre, Descripcion FROM Breeders';
	
	$where = ' where 1=1';
	if ($campo == "todos"){		
		if ($tipob == "parte"){
			$where .= ' and (Codigo LIKE "%'.$valor.'%" OR Nombre LIKE "%'.$valor.'%" OR Descripcion LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Codigo = "'.$valor.'" OR Nombre = "'.$valor.'" OR Descripcion = "'.$valor.'")';
		}
	}else{
		if ($tipob == "parte"){	
		
			// Si es un filtrado por campo con operador 'Por Ocurrencia'		
      $where .= ' AND '.$campo.' LIKE "%'.$valor.'%"';
			
		}else{		
		
			// Si es un filtrado por campo con operador 'Exacto'			
				$where .= ' AND '.$campo.' = "'.$valor.'"';
        
		}			
	}
	$sql.=$where;
	
	$this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
			
            $Breeders = new breeders();
            
            $Breeders->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Breeders->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Breeders->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Breeders->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            
            $lista[$i] = $Breeders;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from Breeders WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newBreeders) {

        $Breeders = $newBreeders;

        $querty = "UPDATE Breeders SET
        Codigo = \"" . $Breeders->getCodigo() . "\", 
        Nombre = \"" . $Breeders->getNombre() . "\", 
        Descripcion = \"" . $Breeders->getDescripcion() . "\"
        WHERE ID = " . $Breeders->getId() . "";
                    
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from Breeders;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
}
?>