<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class blancosbiologicosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newBlancosBiologicos) {


        $querty = "insert into BlancosBiologicos
                    (Codigo,Nombre,Descripcion,Foto,Habilitado)
                    values(
					\"" . $newBlancosBiologicos->getCodigo() . "\",
					\"" . $newBlancosBiologicos->getNombre() . "\",
					\"" . $newBlancosBiologicos->getDescripcion() . "\",
					\"" . $newBlancosBiologicos->getFoto() . "\",
					\"" . $newBlancosBiologicos->getHabilitado() . "\"
					)";
	
	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from BlancosBiologicos';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
		return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from BlancosBiologicos WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $BlancosBiologicos = new blancosbiologicos();
        $BlancosBiologicos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BlancosBiologicos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $BlancosBiologicos;
    }

    function getById($id) {

        $sql = 'SELECT * from BlancosBiologicos WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $BlancosBiologicos = new blancosbiologicos();
        $BlancosBiologicos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BlancosBiologicos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $BlancosBiologicos;
    }

    function gets() {

        $sql = 'SELECT * from BlancosBiologicos';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $BlancosBiologicos = new blancosbiologicos();
        $BlancosBiologicos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BlancosBiologicos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $BlancosBiologicos;
        }
        return $lista;
    }
	
	function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from BlancosBiologicos '; 
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
        $BlancosBiologicos = new blancosbiologicos();
        $BlancosBiologicos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BlancosBiologicos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$BlancosBiologicos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $BlancosBiologicos;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from BlancosBiologicos WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newBlancosBiologicos) {

        $BlancosBiologicos = $newBlancosBiologicos;

        $querty = "UPDATE
                    BlancosBiologicos
                    SET
						Codigo =
                        \"" . $BlancosBiologicos->getCodigo() . "\",
                        Nombre =
                        \"" . $BlancosBiologicos->getNombre() . "\",
						Descripcion =
                        \"" . $BlancosBiologicos->getDescripcion() . "\",
						Foto =
                        \"" . $BlancosBiologicos->getFoto() . "\",
						Habilitado =
                        \"" . $BlancosBiologicos->getHabilitado() . "\"			
                       
                    WHERE ID =
                    " . $BlancosBiologicos->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from BlancosBiologicos;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


}

?>