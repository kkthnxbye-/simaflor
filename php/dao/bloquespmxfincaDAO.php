<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class bloquespmxfincaDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newBloquesPMXFinca) {


        $querty = "insert into BloquesPMXFinca
                    (IDFinca,Codigo,Nombre,Ancho,Largo,Area,Habilitado)
                    values(
					" . $newBloquesPMXFinca->getIdFinca() . ",
					'" . $newBloquesPMXFinca->getCodigo() . "',
					'" . $newBloquesPMXFinca->getNombre() . "',
					" . $newBloquesPMXFinca->getAncho() . ",
					" . $newBloquesPMXFinca->getLargo() . ",
					" . $newBloquesPMXFinca->getArea() . ",
					" . $newBloquesPMXFinca->getHabilitado() . "
					)";



        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getByCodigo($id) {

        $sql = 'SELECT * from BloquesPMXFinca WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $BloquesPMXFinca = new bloquespmxfinca();
        $BloquesPMXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setAncho($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setLargo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $BloquesPMXFinca;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from BloquesPMXFinca';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = 'SELECT * from BloquesPMXFinca WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $BloquesPMXFinca = new bloquespmxfinca();
        $BloquesPMXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setAncho($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setLargo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $BloquesPMXFinca->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $BloquesPMXFinca;
    }

    function gets() {

        $sql = 'SELECT * from BloquesPMXFinca';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $BloquesPMXFinca = new bloquespmxfinca();
            $BloquesPMXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setAncho($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setLargo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $BloquesPMXFinca;
        }
        return $lista;
    }

    function getsbybuscar($finca, $campo, $tipob, $valor) {
        $sql = 'SELECT * from BloquesPMXFinca ';
        $where = ' where 1=1 and IDFinca = ' . $finca . ' ';
        if ($campo == "todos") {

            if ($tipob == "parte") {
                $where .= ' and (Codigo LIKE "%' . $valor . '%" OR Nombre LIKE "%' . $valor . '%"  OR Ancho LIKE "%' . $valor . '%" OR Largo LIKE "%' . $valor . '%"  OR Area LIKE "%' . $valor . '%")';
            } else {
                $where .= ' and (Codigo = "' . $valor . '" OR Nombre= "' . $valor . '" OR Ancho = "' . $valor . '" OR Largo = "' . $valor . '"  OR Area = "' . $valor . '")';
            }
        } else {
            if ($tipob == "parte") {
                $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
            } else {
                $where .= ' and ' . $campo . ' = "' . $valor . '"';
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
            $BloquesPMXFinca = new bloquespmxfinca();
            $BloquesPMXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setAncho($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setLargo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setArea($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $BloquesPMXFinca->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $BloquesPMXFinca;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from BloquesPMXFinca WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newBloquesPMXFinca) {

        $BloquesPMXFinca = $newBloquesPMXFinca;

        $querty = "UPDATE
                    BloquesPMXFinca
                    SET
						Codigo =
                        \"" . $BloquesPMXFinca->getCodigo() . "\",
                        Nombre =
                        \"" . $BloquesPMXFinca->getNombre() . "\",
						Ancho =
                        " . $BloquesPMXFinca->getAncho() . ",
						Largo =
                        " . $BloquesPMXFinca->getLargo() . ",
						Area =
                        " . $BloquesPMXFinca->getArea() . ", 
						Habilitado =
                        " . $BloquesPMXFinca->getHabilitado() . "                      
                    WHERE ID =
                    " . $BloquesPMXFinca->getId() . "";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from BloquesPMXFinca;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>