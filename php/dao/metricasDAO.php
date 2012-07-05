<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

 // Clase dao
class metricasDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newMetricas) {
    
        $querty = "insert into Metricas (Nombre, Habilitado) 
                   values ('".$newMetricas->getNombre()."',".$newMetricas->getHabilitado().")";	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from Metricas';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
		return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }

    function getById($id) {

        $sql = 'SELECT ID, Nombre, Habilitado from Metricas WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0){
            return null;
        }

        $i = 0;
        $j = 0;
		
        $Metricas = new metricas();
        $Metricas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);        
        $Metricas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);       
        $Metricas->sethabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Metricas;
    }
    
    

    function gets() {

        $sql = 'SELECT ID, Nombre, Habilitado from Metricas';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
          
          $j = 0;
			
          $Metricas = new metricas();
          $Metricas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);			
          $Metricas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);		
          $Metricas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			
          $lista[$i] = $Metricas;
        }
        return $lista;
    }
	
	function getsbybuscar($bloque,$campo,$tipob,$valor){
	$sql = 'SELECT ID, Nombre, Habilitado FROM Metricas';
	
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
			
            $Metricas = new metricas();
            
            $Metricas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);			
            $Metricas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);			
            $Metricas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			
            $lista[$i] = $Metricas;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from Metricas WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newMetricas) {

        $Metricas = $newMetricas;

        $querty = "UPDATE
                    Metricas
                    SET
                    Nombre = \"" . $Metricas->getNombre() . "\",                   
                    Habilitado = \"" . $Metricas->getHabilitado() . "\"	
                    WHERE ID =
                    " . $Metricas->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from Metricas;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
}
?>