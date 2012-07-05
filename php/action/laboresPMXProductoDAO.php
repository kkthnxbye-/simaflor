<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class laboresPMXProductoDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newlaboresPMXProducto) {


        $querty = "insert into LaboresPMXProducto
                    (IDProducto, IDLaborPM, Cantidad, TiempoCumplimiento, Unidad, Observaciones)
                    values(
                    \"" . $newlaboresPMXProducto->getIdProducto() . "\",
                    \"" . $newlaboresPMXProducto-> getIdLaborPM() . "\",
                    \"" . $newlaboresPMXProducto->getCantidad() . "\",
                    \"" . $newlaboresPMXProducto->getTiempoCumplimiento() . "\",
                    \"" . $newlaboresPMXProducto->getUnidad() . "\",
                    \"" . $newlaboresPMXProducto->getObservaciones() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savelaboresPMXProducto): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from LaboresPMXProducto WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $laboresPMXProducto = new laboresPMXProducto();
        $laboresPMXProducto->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setIdLaborPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setTiempoCumplimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $laboresPMXProducto;
    }

    function gets() {

        $sql = 'SELECT * from LaboresPMXProducto ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $laboresPMXProducto = new laboresPMXProducto();
        $laboresPMXProducto->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setIdLaborPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setTiempoCumplimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $laboresPMXProducto;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from LaboresPMXProducto WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newlaboresPMXProducto) {

        $laboresPMXProducto = $newlaboresPMXProducto;

        $querty = "UPDATE
                    LaboresPMXProducto
                    SET
                        IDProducto =
                        \"" . $laboresPMXProducto->getIdProducto() . "\",
                        IDLaborPM =
                        \"" . $laboresPMXProducto->getIdLaborPM() . "\",
                        Cantidad =
                        \"" . $laboresPMXProducto->getCantidad() . "\",
                        TiempoCumplimiento =
                        \"" . $laboresPMXProducto->getTiempoCumplimiento() . "\",
                        Unidad =
                        \"" . $laboresPMXProducto->getUnidad() . "\",
                        Observaciones =
                        \"" . $laboresPMXProducto->getObservaciones() . "\"

                    WHERE ID =
                    " . $laboresPMXProducto->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updatelaboresPMXProducto): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from LaboresPMXProducto;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    	function getsbybuscar($producto,$campo,$tipob,$valor){
	$sql = 'SELECT * from LaboresPMXProducto ';
	$where = ' where 1=1 and IDProducto = '.$producto.' ';
	if ($campo == "todos"){

		if ($tipob == "parte"){
			$where .= ' and (Cantidad LIKE "%'.$valor.'%" OR TiempoCumplimiento LIKE "%'.$valor.'%" OR Observaciones LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Cantidad = "'.$valor.'" OR TiempoCumplimiento= "'.$valor.'" OR Observaciones = "'.$valor.'")';
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
        $laboresPMXProducto = new laboresPMXProducto();
        $laboresPMXProducto->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setIdLaborPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setTiempoCumplimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXProducto->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $laboresPMXProducto;
        }
        return $lista;
	}




}

?>