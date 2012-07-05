<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class causasnacionalDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newCausasNacionalPM) {


        $querty = "insert into CausasNacionalPM
                    (Codigo,Nombre,Descripcion,Habilitado)
                    values(
					\"" . $newCausasNacionalPM->getCodigo() . "\",
					\"" . $newCausasNacionalPM->getNombre() . "\",
					\"" . $newCausasNacionalPM->getDescripcion() . "\",
					\"" . $newCausasNacionalPM->getHabilitado() . "\"
					)";
	
	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from CausasNacionalPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
		return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from CausasNacionalPM WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $CausasNacionalPM = new causasnacional();
        $CausasNacionalPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $CausasNacionalPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $CausasNacionalPM;
    }

    function getById($id) {

        $sql = 'SELECT * from CausasNacionalPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $CausasNacionalPM = new causasnacional();
        $CausasNacionalPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $CausasNacionalPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $CausasNacionalPM;
    }

    function gets() {

        $sql = 'SELECT * from CausasNacionalPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $CausasNacionalPM = new causasnacional();
        $CausasNacionalPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $CausasNacionalPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $CausasNacionalPM;
        }
        return $lista;
    }
	
	function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from CausasNacionalPM '; 
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
        $CausasNacionalPM = new causasnacional();
        $CausasNacionalPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $CausasNacionalPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$CausasNacionalPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $CausasNacionalPM;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from CausasNacionalPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newCausasNacionalPM) {

        $CausasNacionalPM = $newCausasNacionalPM;

        $querty = "UPDATE
                    CausasNacionalPM
                    SET
						Codigo =
                        \"" . $CausasNacionalPM->getCodigo() . "\",
                        Nombre =
                        \"" . $CausasNacionalPM->getNombre() . "\",
						Descripcion =
                        \"" . $CausasNacionalPM->getDescripcion() . "\",
						Habilitado =
                        \"" . $CausasNacionalPM->getHabilitado() . "\"			
                       
                    WHERE ID =
                    " . $CausasNacionalPM->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from CausasNacionalPM;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


}

?>