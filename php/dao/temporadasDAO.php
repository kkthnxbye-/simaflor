<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */

 // Clase dao
class temporadasDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTemporadas) {
    
        $querty = "insert into Temporadas (Nombre, Habilitado) 
                   values (\"" . $newTemporadas->getNombre() . "\", \"" . $newTemporadas->getHabilitado() . "\")";	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from Temporadas';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
		return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }

    function getById($id) {

        $sql = 'SELECT ID, Nombre, Habilitado from Temporadas WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0){
            return null;
        }

        $i = 0;
        $j = 0;
		
        $Temporadas = new temporadas();
        $Temporadas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);        
        $Temporadas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);       
        $Temporadas->sethabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Temporadas;
    }

    function gets() {

        $sql = 'SELECT ID, Nombre, Habilitado from Temporadas';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
          
          $j = 0;
			
          $Temporadas = new temporadas();
          $Temporadas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);			
          $Temporadas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);		
          $Temporadas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			
          $lista[$i] = $Temporadas;
        }
        return $lista;
    }
	
	function getsbybuscar($bloque,$campo,$tipob,$valor){
	$sql = 'SELECT ID, Nombre, Habilitado FROM Temporadas';
	
	$where = ' where 1=1';
	if ($campo == "todos") {		
		if ($tipob == "parte") {
			$where .= ' and (Nombre LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Nombre= "'.$valor.'")';
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
			
            $Temporadas = new temporadas();
            
            $Temporadas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);			
            $Temporadas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);			
            $Temporadas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			
            $lista[$i] = $Temporadas;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from Temporadas WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newTemporadas) {

        $Temporadas = $newTemporadas;

        $querty = "UPDATE
                    Temporadas
                    SET
                    Nombre = \"" . $Temporadas->getNombre() . "\",                   
                    Habilitado = \"" . $Temporadas->getHabilitado() . "\"	
                    WHERE ID =
                    " . $Temporadas->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from Temporadas;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
}
?>