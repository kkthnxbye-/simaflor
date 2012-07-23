<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */

class TiposMovimientoInventarioXFincaDAO_ {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newOperarios) {


        $querty = "insert into Operarios
                    (IDGrupoOperarios, Codigo, Nombre, Foto, Habilitado)
                    values(
                    \"" . $newOperarios->getIdGrupoOperarios() . "\",
                    \"" . $newOperarios->getCodigo() . "\",
                    \"" . $newOperarios->getNombre() . "\",
                    \"" . $newOperarios->getFoto() . "\",
                    \"" . $newOperarios->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveOperarios): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

      function getLastId() {
        $sql = 'select MAX(ID) from Operarios';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


	function getByCodigo($id) {

        $sql = 'SELECT * from Operarios WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $operario = new operarios();
        $operario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setIdGrupoOperarios($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $operario;
    }

    function getById($id) {

        $sql = 'SELECT * from Operarios WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $operario = new operarios();
        $operario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setIdGrupoOperarios($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $operario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $operario;
    }

    function gets() {

        $sql = 'SELECT * from Operarios ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $operario = new operarios();
            $operario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setIdGrupoOperarios($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $operario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Operarios WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newoperario) {

        $operario = $newoperario;

        $querty = "UPDATE
                    Operarios
                    SET

                        IDGrupoOperarios =
                        \"" . $operario->getIdGrupoOperarios() . "\",
                        Codigo =
                        \"" . $operario->getCodigo() . "\",
                        Nombre =
                        \"" . $operario->getNombre() . "\",
                        Foto =
                        \"" . $operario->getFoto() . "\",
                        Habilitado =
                        \"" . $operario->getHabilitado() . "\"

                    WHERE ID =
                    " . $operario->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateOperarios): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Operarios;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

 function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Operarios ';
	$where = ' where 1=1 ';
	if ($campo == "todos"){

		if ($tipob == "parte"){
			$where .= ' and (Codigo LIKE "%'.$valor.'%" OR Nombre LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Codigo = "'.$valor.'" OR Nombre= "'.$valor.'")';
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
            $operario = new operarios();
            $operario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setIdGrupoOperarios($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $operario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $operario;
        }
        return $lista;
	}

}

?>