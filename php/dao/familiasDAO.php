<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class familiasDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newFamilias) {


        $querty = "insert into Familias
                    (Codigo,Nombre,Descripcion)
                    values(
                    \"" . $newFamilias->getCodigo() . "\",
					\"" . $newFamilias->getNombre() . "\",
					\"" . $newFamilias->getDescripcion() . "\"
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

        $sql = 'SELECT * from Familias WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Familias = new familias();
        $Familias->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Familias->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Familias;
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from Familias WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Familias = new familias();
        $Familias->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Familias->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Familias;
    }

    function gets() {

        $sql = 'SELECT * from Familias';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $Familias = new familias();
        $Familias->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Familias->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $Familias;
        }
        return $lista;
    }
	
	function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Familias '; 
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
        $Familias = new familias();
        $Familias->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Familias->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Familias->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $Familias;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from Familias WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newFamilias) {

        $Familias = $newFamilias;

        $querty = "UPDATE
                    Familias
                    SET
						Codigo =
                        \"" . $Familias->getCodigo() . "\",
                        Nombre =
                        \"" . $Familias->getNombre() . "\",
						Descripcion =
                        \"" . $Familias->getDescripcion() . "\"
                       
                    WHERE ID =
                    " . $Familias->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Familias;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


}

?>