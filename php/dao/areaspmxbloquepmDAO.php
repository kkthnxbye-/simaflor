<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */

 // Clase dao
class areaspmxbloquepmDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newAreasPMXBloquePM) {


        $querty = "insert into AreasPMXBloquePM
                    (IDBloque, IDTipoArea, Codigo, Nombre, Capacidad, AreaDeCultivo, AreaDeCamino, Habilitado) values (
					\"" . $newAreasPMXBloquePM->getIdBloque() . "\",
					\"" . $newAreasPMXBloquePM->getIdTipoArea() . "\",
					\"" . $newAreasPMXBloquePM->getCodigo() . "\",
					\"" . $newAreasPMXBloquePM->getNombre() . "\",
					" . $newAreasPMXBloquePM->getCapacidad() . ",
					" . $newAreasPMXBloquePM->getAreaCultivo() . ",
					" . $newAreasPMXBloquePM->getAreaCamino() . ",
					\"" . $newAreasPMXBloquePM->getHabilitado() . "\"
					)";	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from AreasPMXBloquePM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
		return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }

    function getById($id) {

        $sql = 'SELECT ID, IDBloque, IDTipoArea, Codigo, Nombre, Capacidad, AreaDeCultivo, AreaDeCamino, Habilitado from AreasPMXBloquePM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0){
            return null;
        }

        $i = 0;
        $j = 0;
		
        $AreasPMXBloquePM = new areaspmxbloquepm();
        $AreasPMXBloquePM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $AreasPMXBloquePM->setIdBloque($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $AreasPMXBloquePM->setIdTipoArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $AreasPMXBloquePM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setCapacidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setAreaCultivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setAreaCamino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->sethabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $AreasPMXBloquePM;
    }

	function getBycodigo($id) {

        $sql = 'SELECT ID, IDBloque, IDTipoArea, Codigo, Nombre, Capacidad, AreaDeCultivo, AreaDeCamino, Habilitado from AreasPMXBloquePM WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0){
            return null;
        }

        $i = 0;
        $j = 0;
		
        $AreasPMXBloquePM = new areaspmxbloquepm();
        $AreasPMXBloquePM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $AreasPMXBloquePM->setIdBloque($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $AreasPMXBloquePM->setIdTipoArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $AreasPMXBloquePM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setCapacidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setAreaCultivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->setAreaCamino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$AreasPMXBloquePM->sethabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $AreasPMXBloquePM;
    }

    function gets() {

        $sql = 'SELECT ID, IDBloque, IDTipoArea, Codigo, Nombre, Capacidad, AreaDeCultivo, AreaDeCamino, Habilitado from AreasPMXBloquePM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
			
			$AreasPMXBloquePM = new areaspmxbloquepm();
			$AreasPMXBloquePM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setIdBloque($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setIdTipoArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setCapacidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setAreaCultivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setAreaCamino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			
            $lista[$i] = $AreasPMXBloquePM;
        }
        return $lista;
    }
	
	function getsbybuscar($bloque,$campo,$tipob,$valor){
	$sql = 'SELECT AreasBloque.ID, BloquesFinca.Nombre AS Bloque, TiposArea.Nombre AS Area, AreasBloque.Codigo, AreasBloque.Nombre, AreasBloque.Capacidad, AreasBloque.AreaDeCultivo, AreasBloque.AreaDeCamino, AreasBloque.Habilitado FROM AreasPMXBloquePM AS AreasBloque	JOIN BloquesPMXFinca AS BloquesFinca ON BloquesFinca.ID = AreasBloque.IDBloque JOIN TiposAreaPM AS TiposArea ON TiposArea.ID = AreasBloque.IDTipoArea';
	
	$where = ' where 1=1 and AreasBloque.IDBloque = '.$bloque.' ';
	if ($campo == "todos"){		
		if ($tipob == "parte"){
			$where .= ' and (AreasBloque.Codigo LIKE "%'.$valor.'%" OR AreasBloque.Nombre LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (AreasBloque.Codigo = "'.$valor.'" OR AreasBloque.Nombre= "'.$valor.'")';
		}
	}else{
		if ($tipob == "parte"){	
		
			// Si es un filtrado por campo con operador 'Por Ocurrencia'
			if ($campo == "IDBloque"){
				// print '<div id="t-debugger" style="background: #CCC; width: 500px; height: 500px;">Debbugger DIV</div>';
				$where .= ' AND BloquesFinca.Nombre LIKE "%'.$valor.'%"';
			}elseif ($campo == "IDTipoArea"){
				$where .= ' AND TiposArea.Nombre LIKE "%'.$valor.'%"';
			}else{
				$where .= ' AND AreasBloque.'.$campo.' LIKE "%'.$valor.'%"';
			}
			
		}else{		
		
			// Si es un filtrado por campo con operador 'Exacto'
			if ($campo == "IDBloque"){
				$where .= ' AND BloquesFinca.Nombre = "'.$valor.'"';
			}elseif ($campo == "IDTipoArea"){
				$where .= ' AND TiposArea.Nombre = "'.$valor.'"';
			}else{
				$where .= ' AND AreasBloque.'.$campo.' = "'.$valor.'"';
			}
			
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
			
			$AreasPMXBloquePM = new areaspmxbloquepm();
			
			$AreasPMXBloquePM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setIdBloque($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setIdTipoArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setCapacidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setAreaCultivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setAreaCamino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			$AreasPMXBloquePM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			
            $lista[$i] = $AreasPMXBloquePM;
        }
        return $lista;
	}

    function delete($id) {

        $sql = 'Delete from AreasPMXBloquePM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newAreasPMXBloquePM) {

        $AreasPMXBloquePM = $newAreasPMXBloquePM;

        $querty = "UPDATE
                    AreasPMXBloquePM
                    SET
						IDBloque =
                        \"" . $AreasPMXBloquePM->getIdBloque() . "\",
						IDTipoArea =
                        \"" . $AreasPMXBloquePM->getIdTipoArea() . "\",
						Codigo =
                        \"" . $AreasPMXBloquePM->getCodigo() . "\",
                        Nombre =
                        \"" . $AreasPMXBloquePM->getNombre() . "\",
						Capacidad =
                        \"" . $AreasPMXBloquePM->getCapacidad() . "\",
						AreaDeCultivo =
                        \"" . $AreasPMXBloquePM->getAreaCultivo() . "\",
						AreaDeCamino =
                        \"" . $AreasPMXBloquePM->getAreaCamino() . "\",
						Habilitado =
                        \"" . $AreasPMXBloquePM->getHabilitado() . "\"			
                       
                    WHERE ID =
                    " . $AreasPMXBloquePM->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from AreasPMXBloquePM;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
}
?>