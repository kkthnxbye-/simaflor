<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class gradosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newgrados) {


        $querty = "insert into Grados
                    (IDProceso,IDProducto,Codigo, Nombre, Descripcion, Habilitado)
                    values(
                    \"" . $newgrados->getIdProceso() . "\",
                    \"" . $newgrados->getIdProducto() . "\",
                    \"" . $newgrados->getCodigo() . "\",
                    \"" . $newgrados->getNombre() . "\",
                    \"" . $newgrados->getDescripcion() . "\",
                    \"" . $newgrados->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savegrados): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from Grados WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $grado = new grados();
        $grado->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setIdProceso($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $grado;
    }
    
    function getByCodigo($codigo) {

        $sql = "SELECT * from Grados WHERE Codigo = '$codigo'";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposAreaPM = new grados();
        $TiposAreaPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setIdProceso($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposAreaPM;
    }
    
    function gets() {

        $sql = 'SELECT * from Grados ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $grado = new grados();
        $grado->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setIdProceso($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $grado;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Grados WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newgrado) {

        $grado = $newgrado;

        $querty = "UPDATE
                    Grados
                    SET
                        IDProceso =
                        \"" . $grado->getIdProceso() . "\",
                        IDProducto =
                        \"" . $grado->getIdProducto() . "\",
                        Codigo =
                        \"" . $grado->getCodigo() . "\",
                        Nombre =
                        \"" . $grado->getNombre() . "\",
                        Descripcion =
                        \"" . $grado->getDescripcion() . "\",
                        Habilitado =
                        \"" . $grado->getHabilitado() . "\"

                    WHERE ID =
                    " . $grado->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updategrados): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Grados;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Grados ';
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
        $grado = new grados();
        $grado->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setIdProceso($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $grado->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $lista[$i] = $grado;
        
        }
        return $lista;
	}



}

?>