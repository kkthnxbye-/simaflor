<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class laboresPMXVariedadDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newlaboresPMXVariedad) {


        $querty = "insert into LaboresPMXVariedad
                    (IDVariedad, IDLaborPM, Cantidad, TiempoCumplimiento, IDMetrica, Observaciones)
                    values(
                    ".$newlaboresPMXVariedad->getIdVariedad().",
                    ".$newlaboresPMXVariedad-> getIdLaborPM().",
                    ".$newlaboresPMXVariedad->getCantidad().",
                    ".$newlaboresPMXVariedad->getTiempoCumplimiento().",
                    ".$newlaboresPMXVariedad->getUnidad().",
                    '".$newlaboresPMXVariedad->getObservaciones()."'
	)";
        //echo $querty;
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savelaboresPMXVariedad): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from LaboresPMXVariedad WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $laboresPMXVariedad = new laboresPMXVariedad();
        $laboresPMXVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdLaborPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setTiempoCumplimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        
        $laboresPMXVariedad->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $laboresPMXVariedad;
    }

    function gets() {

        $sql = 'SELECT * from LaboresPMXVariedad ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $laboresPMXVariedad = new laboresPMXVariedad();
        $laboresPMXVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdLaborPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setTiempoCumplimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $laboresPMXVariedad;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from LaboresPMXVariedad WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newlaboresPMXVariedad) {

        $laboresPMXVariedad = $newlaboresPMXVariedad;

        $querty = "UPDATE
                    LaboresPMXVariedad
                    SET
                        IDVariedad =
                        \"" . $laboresPMXVariedad->getIdVariedad() . "\",
                        IDLaborPM =
                        \"" . $laboresPMXVariedad->getIdLaborPM() . "\",
                        Cantidad =
                        \"" . $laboresPMXVariedad->getCantidad() . "\",
                        TiempoCumplimiento =
                        \"" . $laboresPMXVariedad->getTiempoCumplimiento() . "\",
                        IDMetrica =
                        \"" . $laboresPMXVariedad->getUnidad() . "\",
                        Observaciones =
                        \"" . $laboresPMXVariedad->getObservaciones() . "\"

                    WHERE ID =
                    " . $laboresPMXVariedad->getId() . "
                    ";
        //echo $querty;
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updatelaboresPMXVariedad): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from LaboresPMXVariedad;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from LaboresPMXVariedad ';
	$where = ' where 1=1 ';
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
        $laboresPMXVariedad = new laboresPMXVariedad();
        $laboresPMXVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdLaborPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setTiempoCumplimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        
        $laboresPMXVariedad->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $laboresPMXVariedad;
        }
        return $lista;
	}
      
      
      function getsbybuscar2($variedad,$campo,$tipob,$valor){
	$sql = "SELECT * from LaboresPMXVariedad ";
	$where = " where 1=1 AND IDVariedad = ".$variedad;
	if ($campo == "todos"){

		if ($tipob == "parte"){
			$where .= " and (Cantidad LIKE '%$valor%' OR TiempoCumplimiento LIKE '%$valor%' OR Observaciones LIKE '%$valor%')";
		}else{
			$where .= " and (Cantidad = '$valor'OR TiempoCumplimiento= '$valor' OR Observaciones = '$valor')";
		}
	}else{
		if ($tipob == "parte"){
			$where .= " and '$campo' LIKE '%$valor%'";
		}else{
			$where .= " and '$campo' = '$valor";
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
        $laboresPMXVariedad = new laboresPMXVariedad();
        $laboresPMXVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setIdLaborPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPMXVariedad->setTiempoCumplimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        $laboresPMXVariedad->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $laboresPMXVariedad;
        }
        return $lista;
	}




}

?>