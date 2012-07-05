<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class gruposOperariosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newgruposOperarios) {


        $querty = "insert into GruposOperarios
                    (Codigo, Nombre, Descripcion, Habilitado)
                    values(
                    \"" . $newgruposOperarios->getCodigo() . "\",
                    \"" . $newgruposOperarios->getNombre() . "\",
                    \"" . $newgruposOperarios->getDescripcion() . "\",
                    \"" . $newgruposOperarios->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savegruposoperarios): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from GruposOperarios WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $gruposOperarios = new gruposOperarios();
        $gruposOperarios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $gruposOperarios;
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from GruposOperarios WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $gruposOperarios = new gruposOperarios();
        $gruposOperarios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $gruposOperarios;
    }

    function gets() {

        $sql = 'SELECT * from GruposOperarios';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $gruposOperarios = new gruposOperarios();
        $gruposOperarios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $gruposOperarios;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from GruposOperarios WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newgruposOperarios) {

        $gruposOperarios = $newgruposOperarios;

        $querty = "UPDATE
                    GruposOperarios
                    SET

                        Codigo =
                        \"" . $gruposOperarios->getCodigo() . "\",
                        Nombre =
                        \"" . $gruposOperarios->getNombre() . "\",
                        Descripcion =
                        \"" . $gruposOperarios->getDescripcion() . "\",
                        Habilitado =
                        \"" . $gruposOperarios->getHabilitado() . "\"

                    WHERE ID =
                    " . $gruposOperarios->getId() . "
                    ";
         $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updategruposOperarios): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from GruposOperarios;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from GruposOperarios ';
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
        $gruposOperarios = new gruposOperarios();
        $gruposOperarios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposOperarios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $gruposOperarios;
        }
        return $lista;
	}
}

?>