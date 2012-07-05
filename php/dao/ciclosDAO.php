<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */

class ciclosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newCiclos) {
       
       $newCiclo = new ciclos();
       $newCiclo = $newCiclos;
       
        $querty = "insert into Ciclos
                    (Nombre,Descripcion)
                    values(
					\"" . $newCiclo->getNombre() . "\",
					\"" . $newCiclo->getDescripcion() . "\"
	)";
	
	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from Ciclos WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $newCiclo = new ciclos();
        $newCiclo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newCiclo->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$newCiclo->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $newCiclo;
    }
	
	function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Ciclos '; 
	$where = ' where 1=1 ';
	
      if ($campo == "todos"){
		
		if ($tipob == "parte"){
			$where .= ' and (Nombre LIKE "%'.$valor.'%" OR Descripcion LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Nombre= "'.$valor.'" OR Descripcion = "'.$valor.'")';
		}
	}else{
		if ($tipob == "parte"){
			$where .= ' and '.$campo.' LIKE "%'.$valor.'%"';
		}else{
			$where .= ' and '.$campo.' = "'.$valor.'"';
		}
			
	}
			
	
	$sql.=$where;
      //echo $sql;
	$this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $newCiclo = new ciclos();
        $newCiclo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newCiclo->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$newCiclo->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newCiclo;
        }
        return $lista;
	}

    function gets() {

        $sql = 'SELECT * from Ciclos';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
       $newCiclo = new ciclos();
        $newCiclo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newCiclo->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$newCiclo->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newCiclo;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Ciclos WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newCiclo) {
        $Ciclo = new ciclos(); 
        $Ciclo = $newCiclo;

        $querty = "UPDATE
                    Ciclos
                    SET
						Nombre =
                        \"" . $Ciclo->getNombre() . "\",
						Descripcion =
                        \"" . $Ciclo->getDescripcion() . "\"					
                       
                    WHERE ID =
                    " . $Ciclo->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Ciclos;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


}

?>