<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class coloresDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newColores) {


        $querty = "insert into Colores
                    (ID,Codigo,Nombre,Descripcion)
                    values(
					\"" . $newColores->getId(). "\",
                    \"" . $newColores->getCodigo() . "\",
					\"" . $newColores->getNombre() . "\",
					\"" . $newColores->getDescripcion() . "\"
					)";
	
	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from Colores';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
		return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from Colores WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Colores = new colores();
        $Colores->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Colores->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Colores;
    }

    function getById($id) {

        $sql = 'SELECT * from Colores WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Colores = new colores();
        $Colores->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Colores->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Colores;
    }

    function gets() {

        $sql = 'SELECT * from Colores';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $Colores = new colores();
        $Colores->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Colores->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $Colores;
        }
        return $lista;
    }
	
	function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Colores '; 
	$where = ' where 1=1 ';
	if ($campo == "todos"){
		
		if ($tipob == "parte"){
			$where .= ' and (Codigo LIKE "%'.$valor.'%" OR Nombre LIKE "%'.$valor.'%" OR Descripcion LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Codigo = "'.$valor.'" OR Nombre= "'.$valor.'" OR Descripcion = "'.$valor.'")';
		}
	}else{
		if ($tipob == "parte"){
			$where .= ' and '.$campo.' LIKE "%'.$valor.'%"';
		}else{
			$where .= ' and '.$campo.' = "'.$valor.'"';
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
        $Colores = new colores();
        $Colores->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Colores->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Colores->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $Colores;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from Colores WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newColores) {

        $Colores = $newColores;

        $querty = "UPDATE
                    Colores
                    SET
						Codigo =
                        \"" . $Colores->getCodigo() . "\",
                        Nombre =
                        \"" . $Colores->getNombre() . "\",
						Descripcion =
                        \"" . $Colores->getDescripcion() . "\"
                       
                    WHERE ID =
                    " . $Colores->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Colores;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


}

?>